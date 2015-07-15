<?php

/*
 * Cassowary Incremental Constraint Solver
 * Original Smalltalk Implementation by Alan Borning
 *
 * Java Implementation by:
 * Greg J. Badros
 * Erwin Bolwidt
 *
 * (C) 1998, 1999 Greg J. Badros and Alan Borning
 * (C) Copyright 2012 Erwin Bolwidt
 *
 * See the file LICENSE for legal details regarding this software
 */

namespace DaveRoss\CassowaryConstraintSolver;

class ClTableau extends CL {

	// _columns is a mapping from variables which occur in expressions to the
	// set of basic variables whose expressions contain them
	// i.e., it's a mapping from variables in expressions (a column) to the
	// set of rows that contain them
	protected $_columns; /* IdentityHashMap<ClAbstractVariable, Set<ClAbstractVariable>> */

	// _rows maps basic variables to the expressions for that row in the tableau
	protected $_rows; /* IdentityHashMap<ClAbstractVariable, ClLinearExpression> */

	// the collection of basic variables that have infeasible rows
	// (used when reoptimizing)
	protected $_infeasibleRows; /* IdentityHashSet<ClAbstractVariable> */

	// the set of rows where the basic variable is external
	// this was added to the Java/C++ versions to reduce time in setExternalVariables()
	protected $_externalRows; /* IdentityHashSet<ClVariable> */

	// the set of external variables which are parametric
	// this was added to the Java/C++ versions to reduce time in setExternalVariables()
	protected $_externalParametricVars; /* IdentityHashSet<ClVariable>  */

	/**
	 * ctr is protected, since this only supports an ADT for
	 * the ClSimplexSolved class
	 */
	protected function ClTableau() {
		$this->_columns                = new IdentityHashMap();
		$this->_rows                   = new IdentityHashMap();
		$this->_infeasibleRows         = new IdentityHashSet();
		$this->_externalRows           = new IdentityHashSet();
		$this->_externalParametricVars = new IdentityHashSet();
	}

	/**
	 * Variable v has been removed from an expression. If the
	 * expression is in a tableau the corresponding basic variable is
	 * subject (or if subject is nil then it's in the objective function).
	 * Update the column cross-indices.
	 *
	 * @param ClAbstractVariable $v
	 * @param ClAbstractVariable $subject
	 *
	 * @return void
	 */
	final public function noteRemovedVariable( ClAbstractVariable $v, ClAbstractVariable $subject ) {
		if ( $subject !== null ) {
			$this->_columns->get( $v )->remove( $subject );
		}
	}

	/**
	 * v has been added to the linear expression for subject
	 * update column cross indices
	 *
	 * @param ClAbstractVariable $v
	 * @param ClAbstractVariable $subject
	 */
	final public function noteAddedVariable( ClAbstractVariable $v, ClAbstractVariable $subject ) {
		if ( $subject !== null ) {
			$this->insertColVar( $v, $subject );
		}
	}

	/**
	 * Originally from Michael Noth <noth@cs>
	 * @return string
	 */
	public function getInternalInfo() {
		$retstr = "Tableau Information:\n";
		$retstr .= "Rows: " . $this->_rows->size();
		$retstr .= " (= " . ( $this->_rows->size() - 1 ) . " constraints)";
		$retstr .= "\nColumns: " . $this->_columns->size();
		$retstr .= "\nInfeasible Rows: " . $this->_infeasibleRows->size();
		$retstr .= "\nExternal basic variables: " . $this->_externalRows->size();
		$retstr .= "\nExternal parametric variables: ";
		$retstr .= $this->_externalParametricVars->size();
		$retstr .= "\n";

		return $retstr;
	}

	/**
	 * @return string
	 */
	public function __toString() {

		$bstr = "Tableau:\n";
		foreach ( $this->_rows->keySet() as $clv ) {
			$expr = $this->_rows->get( $clv );
			$bstr .= $clv->__toString();
			$bstr .= " <==> ";
			$bstr .= $expr->__toString();
			$bstr .= "\n";
		}

		$bstr .= "\nColumns:\n";
		$bstr .= $this->_columns->__toString();

		$bstr .= "\nInfeasible rows: ";
		$bstr .= $this->_infeasibleRows->__toString();

		$bstr .= "External basic variables: ";
		$bstr .= $this->_externalRows->__toString();

		$bstr .= "External parametric variables: ";
		$bstr .= $this->_externalParametricVars->__toString();

		return $bstr;
	}

	/**
	 * Convenience function to insert a variable into
	 * the set of rows stored at _columns[param_var],
	 * creating a new set if needed
	 *
	 * @param ClAbstractVariable $param_var
	 * @param ClAbstractVariable $rowvar
	 *
	 * @return void
	 */
	final private function insertColVar( ClAbstractVariable $param_var, ClAbstractVariable $rowvar ) {
		$rowset = $this->_columns->get( $param_var );
		if ( $rowset == null ) {
			$this->_columns->put( $param_var, $rowset = new HashSet() );
		}
		$rowset->add( $rowvar );
	}

	/**
	 * Add v=expr to the tableau, update column cross indices
	 * v becomes a basic variable
	 * expr is now owned by ClTableau class,
	 * and ClTableauis responsible for deleting it
	 * (also, expr better be allocated on the heap!)
	 *
	 * @param ClAbstractVariable $var
	 * @param ClLinearExpression $expr
	 *
	 * @return void
	 */
	final protected function addRow( ClAbstractVariable $var, ClLinearExpression $expr ) {

		// for each variable in expr, add var to the set of rows which
		// have that variable in their expression
		$this->_rows->put( $var, $expr );

		foreach ( $expr->terms()->keySet() as $clv ) {
			$this->insertColVar( $clv, $var );
			if ( $clv->isExternal() && $clv instanceof ClVariable ) {
				$this->_externalParametricVars->add( $clv );
			}
		}
		if ( $var->isExternal() && $var instanceof ClVariable ) {
			$this->_externalRows->add( $var );
		}
	}

	/**
	 * Remove v from the tableau -- remove the column cross indices for v
	 * and remove v from every expression in rows in which v occurs
	 *
	 * @param ClAbstractVariable $var
	 *
	 * @return void
	 */
	final protected function removeColumn( ClAbstractVariable $var ) {
		// remove the rows with the variables in varset

		$rows = $this->_columns->remove( $var );

		if ( $rows != null ) {
			foreach ( $rows as $clv ) {
				$expr = $this->_rows->get( $clv );
				$expr->terms()->remove( $var );
			}
		}

		if ( $var->isExternal() ) {
			$this->_externalRows->remove( $var );
			$this->_externalParametricVars->remove( $var );
		}
	}

	/**
	 * Remove the basic variable v from the tableau row v=expr
	 * Then update column cross indices
	 *
	 * @param ClAbstractVariable $var
	 *
	 * @return ClLinearExpression
	 * @throws ClInternalError
	 */
	protected final function removeRow( ClAbstractVariable $var ) {

		$expr = $this->_rows->get( $var );
		if ( $expr === null ) {
			throw new ClInternalError;
		}

		// For each variable in this expression, update
		// the column mapping and remove the variable from the list
		// of rows it is known to be in
		foreach ( $expr->terms()->keySet() as $clv ) {
			$varset = $this->_columns->get( $clv );
			if ( $varset != null ) {
				$varset->remove( $var );
			}
		}

		$this->_infeasibleRows->remove( $var );

		if ( $var->isExternal() ) {
			$this->_externalRows->remove( $var );
		}
		$this->_rows . remove( $var );

		return $expr;
	}

	/**
	 * Replace all occurrences of oldVar with expr, and update column cross indices
	 * oldVar should now be a basic variable
	 *
	 * @param ClAbstractVariable $oldVar
	 * @param ClLinearExpression $expr
	 */
	final protected function substituteOut( ClAbstractVariable $oldVar, ClLinearExpression $expr ) {
		$varset = $this->_columns->get( $oldVar );
		foreach ( $varset as $v ) {
			$row = $this->_rows->get( $v );
			$row->substituteOut( $oldVar, $expr, $v, $this );
			if ( $v->isRestricted() && $row->constant() < 0.0 ) {
				$this->_infeasibleRows->add( $v );
			}
		}

		if ( $oldVar instanceof ClVariable ) {
			$this->_externalRows->add( $oldVar );
			$this->_externalParametricVars->remove( $oldVar );
		}
		$this->_columns->remove( $oldVar );
	}

	/**
	 * @return IdentityHashMap
	 */
	final protected function columns() {
		return $this->_columns;
	}

	/**
	 * @return IdentityHashMap
	 */
	final protected function rows() {
		return $this->_rows;
	}

	/**
	 * return true iff the variable subject is in the columns keys
	 *
	 * @param ClAbstractVariable $subject
	 *
	 * @return bool
	 */
	final protected function columnsHasKey( ClAbstractVariable $subject ) {
		return $this->_columns->containsKey( $subject );
	}

	/**
	 * @param ClAbstractVariable $v
	 *
	 * @return ClLinearExpression
	 */
	final protected function rowExpression( ClAbstractVariable $v ) {
		return $this->_rows->get( $v );
	}

}

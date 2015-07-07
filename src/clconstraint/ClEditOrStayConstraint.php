<?php

/**
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

abstract class ClEditOrStayConstraint extends ClConstraint {

	use \DaveRoss\CassowaryConstraintSolver\OverloadedMethods;

	protected $_variable; /* ClVariable */

	// cache the expresion
	private $_expression; /* ClLinearExpression */

	/**
	 * @param ClVariable $var
	 * @param ClStrength $strength
	 * @param double     $weight
	 */
	public function __construct_clvariable_clstrength_double( ClVariable $var, ClStrength $strength, $weight ) {
		parent::__construct_clstrength_double( $strength, doubleval( $weight ) );
		$this->_variable   = $var;
		$this->_expression = new ClLinearExpression( $this->_variable, - 1.0, $this->_variable->getValue() );
	}

	/**
	 * @param ClVariable $var
	 * @param ClStrength $strength
	 */
	public function __construct_clvariable_clstrength( ClVariable $var, ClStrength $strength ) {
		$this->__construct_clvariable_clstrength_double( $var, $strength, 1.0 );
	}

	/**
	 * @param ClVariable $var
	 */
	public function __construct_clvariable( ClVariable $var ) {
		$this->__construct_clvariable_clstrength_double( $var, ClStrength::$required, 1.0 );
		$this->_variable = $var;
	}

	/**
	 * @return ClVariable
	 */
	public function variable() {
		return $this->_variable;
	}

	/**
	 * @return ClLinearExpression
	 */
	public function expression() {
		return $this->_expression;
	}

}

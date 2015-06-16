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

namespace DaveRoss\CasswaryConstraintSolver;

class ClLinearExpression extends CL {

	use \DaveRoss\CasswaryConstraintSolver\OverloadedMethods;

	private /* double */ $_constant;
	private /* IdentityHashMap<ClAbstractVariable, ClDouble> */ $_terms;

	public function __construct_clabstractvariable_double_double( $clv, $value, $constant ) {

		$this->_constant = $constant;
		$this->_terms    = new IdentityHashMap( 1 );
		if ( $clv != null ) {
			$this->_terms->put( $clv, new ClDouble( $value ) );
		}

	}

    public function __construct_double($num) {
		$this->__construct_clabstractvariable_double_double(null, 0, $num);
	}

    public function __construct_default() {
		$this->__construct_double(0);
    }

    public function  __construct_clabstractvariable_double($clv, $value) {
		$this->__construct_clabstractvariable_double_double($clv, $value, 0.0);
	}

    public function __construct_clabstractvariable($clv) {
		$this->__construct_clabstractvariable_double_double($clv, 1, 0);
	}

//    protected ClLinearExpression(double constant, Map<ClAbstractVariable, ClDouble> terms) {
//	_constant = constant;
//	_terms = new IdentityHashMap<ClAbstractVariable, ClDouble>();
//        // need to unalias the ClDouble-s that we clone (do a deep clone)
//        for (Map.Entry<ClAbstractVariable, ClDouble> e : terms.entrySet()) {
//	        _terms.put(e.getKey(), e.getValue().clone());
//        }
//    }

	/**
	 * @param double $x
	 *
	 * @return ClLinearExpression
	 */
    public function multiplyMe( $x ) {
	    $this->_constant *= doubleval( $x );

	    foreach ( $this->_terms->entrySet_iterator() as $cld) {
		    $cld->setValue( $cld->doubleValue() * $x );
	    }

        return $this;
    }


    public function __clone() {
		return new ClLinearExpression($this->_constant, $this->_terms);
	}

	/**
	 * @param double x
	 * @return ClLinearExpression
	 */
    public final function times_double($x) {
	    $y = clone($this);
		return $y->multiplyMe($x);
	}

	/**
	 * @param ClLinearExpression $expr
	 * @throws NonlinearExpressionException
	 * @return ClLinearExpression
	 */
    public final function times_cllinearexpression(ClLinearExpression $expr) {
		if ($this->isConstant()) {
			return $expr->times_double($this->_constant);
		} else if (!$expr->isConstant()) {
			throw new NonlinearExpressionException();
		}
		return $this->times_double($expr->_constant);
	}

	/**
	 * @param ClLinearExpression $expr
	 * @return ClLinearExpression
	 */
    public final function plus_cllinearexpression(ClLinearExpression $expr) {
	    $x = clone($this);
		return $x->addExpression($expr, 1.0);
	}

	/**
	 * @param ClVariable $var
	 * @throws NonlinearExpressionException
	 * @return ClLinearExpression
	 */
    public final function plus_clvariable(ClVariable $var) {
	    $x = clone($this);
		return $x->addVariable($var, 1.0);
    }

	/**
	 * @param ClLinearExpression $expr
	 * @return ClLinearExpression
	 */
    public final function minus_cllinearexpression (ClLinearExpression $expr) {
		$x = clone($this);
		return $x->addExpression($expr, -1.0);
	}

	/**
	 * @param ClVariable $var
	 * @return ClLinearExpression
	 * @throws NonlinearExpressionException
	 */
    public final function minus_clvariable (ClVariable $var) {
	    $x = clone($this);
		return $x->addVariable($var, -1.0);
    }

	/**
	 * @param double $x
	 * @throws NonlinearExpressionException
	 * @return ClLinearExpression
	 */
    public final function divide_double( $x) {
		if (CL::approx(doubleval($x), 0.0)) {
			throw new NonlinearExpressionException();
		}
		return $this->times_double(1.0 / doubleval($x));
	}

	/**
	 * @param ClLinearExpression $expr
	 *
	 * @return ClLinearExpression
	 * @throws NonlinearExpressionException
	 */
	public final function divide_cllinearexpression( ClLinearExpression $expr ) {
		if ( ! $expr->isConstant() ) {
			throw new NonlinearExpressionException();
		}

		/**
		 * CL defines a Divide() method which throws off the method overloading feature
		 * so divide_double() is invoked directly here
		 */
		return $this->divide_double( doubleval( $expr->_constant ) );
	}

	/**
	 * @param ClLinearExpression $expr
	 * @return ClLinearExpression
	 * @throws NonlinearExpressionException
	 */
    public final function divFrom(ClLinearExpression $expr) {
		if (!$this->isConstant() || CL::approx($this->_constant, 0.0)) {
			throw new NonlinearExpressionException();
		}

	    /**
	     * CL defines a Divide() method which throws off the method overloading feature
	     * so divide_double() is invoked directly here
	     */
		return $expr->divide_double($this->_constant);
	}

	/**
	 * @param ClLinearExpression $expr
	 * @return ClLinearExpression
	 */
    public final function subtractFrom($expr) {
		return $expr->minus_cllinearexpression($this);
	}

	/**
	 * Add n*expr to this expression from another expression expr.
	 * Notify the solver if a variable is added or deleted from this
	 * expression.
	 *
	 * @param ClLinearExpression                          $expr
	 * @param                          double             $n
	 * @param                          ClAbstractVariable $subject
	 * @param ClTableau                                   $solver
	 *
	 * @return ClLinearExpression
	 */
    public final function addExpression_cllinearexpression_double_clabstract_variable_cltableau(ClLinearExpression $expr, $n, ClAbstractVariable $subject, ClTableau $solver) {
		$this->incrementConstant(doubleval($n) * $expr->constant());

		foreach($expr->_terms->entrySet() as $e) {
			addVariable($e->getKey(), $e->getValue()->doubleValue() * doubleval($n), $subject, $solver);
		}

        return $this;
    }

	/**
	 * Add n*expr to this expression from another expression expr.
	 * @param ClLinearExpression $expr
	 * @param double $n
	 * @return ClLinearExpression
	 */
    public final function addExpression_cllinearexpression_double(ClLinearExpression $expr, double $n) {
		$this->incrementConstant(doubleval($n) * $expr->constant());


		foreach($expr->_terms->entrySet() as $e) {
			$this->addVariable($e->getKey(), $e->getValue()->doubleValue() * doubleval($n));
		}
        return this;
    }

	/**
	 * @param ClLinearExpression $expr
	 * @return ClLinearExpression
	 */
    public final function addExpression(ClLinearExpression $expr) {
		return $this->addExpression($expr, 1.0);
	}

	/**
    *  Add a term c*v to this expression. If the expression already
    *  contains a term involving v, add c to the existing coefficient.
    *  If the new coefficient is approximately 0, delete v.
	 * @param ClAbstractVariable $v
	 * @param double $c
	 * @return ClLinearExpression
	 */
    public final function addVariable_clabstractvariable_double(ClAbstractVariable $v, $c) {

	$coeff = $this->_terms->get($v);
        if ($coeff != null) {
	        $new_coefficient = $coeff->doubleValue() + doubleval($c);
            if (CL.approx($new_coefficient, 0.0)) {
	            $this->_terms->remove($v);
            } else {
	            $coeff->setValue($new_coefficient);
            }
        } else {
	        if (!CL.approx(doubleval($c), 0.0)) {
		        $this->_terms->put($v, new ClDouble(doubleval($c)));
	        }
        }
        return $this;
    }

	/**
	 * @param ClAbstractVariable $v
	 * @return ClLinearExpression
	 */
    public final function addVariable_clabstractvariable(ClAbstractVariable $v) {
		return $this->addVariable($v, 1.0);
	}

	/**
	 * @param ClAbstractVariable $v
	 * @param double $c
	 * @return ClLinearExpression
	 */
    public final function setVariable(ClAbstractVariable $v, $c) {

		$coeff = $this->_terms->get($v);
        if ($coeff != null) {
	        $this->coeff->setValue( doubleval($c) );
        }
        else {
	        $this->_terms->put( $v, new ClDouble( doubleval($c) ) );
        }
        return $this;
    }

/**
    *  Add a term c*v to this expression. If the expression already
    *  contains a term involving v, add c to the existing coefficient.
    *  If the new coefficient is approximately 0, delete v. Notify the
    *  solver if v appears or disappears from this expression.
 * @param ClAbstractVariable $v
 * @param double $c
 * @param ClAbstractVariable $subject
 * @param ClTableau solver
 * @return ClLinearExpression
 */
    public final function addVariable_clabstractvariable_double_clabstractvariable_cltableau (ClAbstractVariable $v, $c, ClAbstractVariable $subject, ClTableau $solver) {
	// body largely duplicated above

	$coeff = $this->_terms->get($v);
        if ($coeff != null) {
	        $new_coefficient = $coeff->doubleValue() + doubleval(c);
            if (CL.approx($new_coefficient, 0.0)) {
	           $solver->noteRemovedVariable($v, $subject);
	            $this->_terms->remove($v);
            } else {
	            $coeff->setValue($new_coefficient);
            }
        } else {
	        if (!CL.approx(doubleval($c), 0.0)) {
		        $this->_terms->put($v, new ClDouble(doubleval(c)));
		        $solver->noteAddedVariable($v, $subject);
	        }
        }
        return $this;
    }

	/**
	 * Return a pivotable variable in this expression. (It is an error
	 * if this expression is constant -- signal ExCLInternalError in
	 * that case). Return null if no pivotable variables
	 * @return ClAbstractVariable
	 * @throws CLInternalError
	 */
    public final function anyPivotableVariable() {
		if ($this->isConstant()) {
			throw new CLInternalError("anyPivotableVariable called on a constant");
		}

		foreach($this->_terms->keySet() as $clv) {
			if ($clv->isPivotable()) {
				return $clv;
			}
		}

        // No pivotable variables, so just return null, and let the caller
        // error if needed
        return null;
    }

	/**
	 * Replace var with a symbolic expression expr that is equal to it.
	 *  If a variable has been added to this expression that wasn't there
	 *  before, or if a variable has been dropped from this expression
	 *  because it now has a coefficient of 0, inform the solver.
	 *  PRECONDITIONS:
	 *  var occurs with a non-zero coefficient in this expression.
	 *
	 * @param ClAbstractVariable  $var
	 * @param  ClLinearExpression $expr
	 * @param  ClAbstractVariable $subject
	 * @param ClTableau           $solver
	 *
	 * @return void
	 */
    public final function substituteOut( ClAbstractVariable $var, ClLinearExpression $expr, ClAbstractVariable $subject, ClTableau $solver ) {

	$multiplier = $this->_terms->remove( $var )->doubleValue();
	$this->incrementConstant( $multiplier * $expr->constant() );

	foreach ( $expr->terms()->entrySet() as $e) {
		$clv         = $e->getKey();
		$coeff       = $e->getValue()->doubleValue();
		$d_old_coeff = $this->_terms->get( $clv );
		if ( $d_old_coeff != null ) {
			$old_coeff = $d_old_coeff->doubleValue();
			$newCoeff  = $old_coeff + $multiplier * $coeff;
			if ( CL::approx( $newCoeff, 0.0 ) ) {
				$solver->noteRemovedVariable( $clv, $subject );
				$this->_terms->remove( $clv );
			} else {
				$d_old_coeff->setValue( $newCoeff );
			}
		} else {
			// did not have that variable already
			$this->_terms->put( $clv, new ClDouble( $multiplier * $coeff ) );
			$solver->noteAddedVariable( $clv, $subject );
		}
	}
}

    /**
     *  This linear expression currently represents the equation
     *  oldSubject=self. Destructively modify it so that it represents
     *  the equation newSubject=self.
     *
     *  Precondition: newSubject currently has a nonzero coefficient in
     *  this expression.
     *
     *  NOTES
     *  Suppose this expression is c + a*newSubject + a1*v1 + ... + an*vn.
     *
     *  Then the current equation is
     *  oldSubject = c + a*newSubject + a1*v1 + ... + an*vn.
     *  The new equation will be
     *  newSubject = -c/a + oldSubject/a - (a1/a)*v1 - ... - (an/a)*vn.
     *  Note that the term involving newSubject has been dropped.
     *
     * @param ClAbstractVariable $old_subject
     * @param ClAbstractVariable $new_subject
     *
     * @return void
     */
    public final function changeSubject( ClAbstractVariable $old_subject, ClAbstractVariable $new_subject ) {

		$cld = $this->_terms->get( $old_subject );
		if ( $cld != null ) {
			$cld->setValue( $this->newSubject( $new_subject ) );
		} else {
			$this->_terms->put( $old_subject, new ClDouble( $this->newSubject( $new_subject ) ) );
		}

	}

	/**
	 *  This linear expression currently represents the equation self=0. Destructively modify it so
	 *  that subject=self represents an equivalent equation.
	 *
	 *  Precondition: subject must be one of the variables in this expression.
	 *  NOTES
	 *  Suppose this expression is
	 *  c + a*subject + a1*v1 + ... + an*vn
	 *  representing
	 *  c + a*subject + a1*v1 + ... + an*vn = 0
	 *  The modified expression will be
	 *  subject = -c/a - (a1/a)*v1 - ... - (an/a)*vn
	 *  representing
	 *  subject = -c/a - (a1/a)*v1 - ... - (an/a)*vn
	 *
	 *  Note that the term involving subject has been dropped.
	 *  Returns the reciprocal, so changeSubject can use it, too
	 *
	 * @param ClAbstractVariable $subject
	 *
	 * @return double
	 *
	 */
    public final function newSubject( ClAbstractVariable $subject ) {

		$coeff      = $this->_terms->remove( $subject );
		$reciprocal = 1.0 / $coeff->doubleValue();
		$this->multiplyMe( - $reciprocal );

		return doubleval( $reciprocal );

	}

	/**
    * Return the coefficient corresponding to variable var, i.e.,
    * the 'ci' corresponding to the 'vi' that var is:
    * v1*c1 + v2*c2 + .. + vn*cn + c
	 * @param ClAbstractVariable $var
	 * @return double
	 */
    public final function coefficientFor(ClAbstractVariable $var) {
		$coeff = $this->_terms->get($var);
        if ($coeff != null) {
	        return $coeff->doubleValue();
        }
        else {
	        return 0.0;
        }
    }

	/**
	 * @return double
	 */
    public final function constant() {
        return $this->_constant;
    }

	/**
	 * @param double $c
	 * @return void
	 */
    public final function set_constant($c) {
		$this->_constant = doubleval($c);
	}

    public final function terms() {
        return $this->_terms;
    }

	/**
	 * @param double $c
	 * @return void
	 */
    public final function incrementConstant( $c) {
		$this->_constant += doubleval($c);
	}

    public final function isConstant() {
        return $this->_terms->size() == 0;
    }

	/**
	 * @return String
	 */
    public final function __toString() {
		$bstr = '';
        $e = $this->_terms->keySet();

        if (!CL::approx($this->_constant, 0.0) || $this->_terms->size() == 0) {
	        $bstr.=$this->_constant;
        } else {
	        if ($this->_terms->size() == 0) {
		        return $bstr;
	        }

	        $clv = $e[0];
            $coeff = $this->_terms->get($clv);
            $bstr.=$coeff->toString() . "*" . $clv->toString();
        }

		for ($i = 1; $i < count($e); $i++) {
	        $clv = $e[$i];
            $coeff = $this->_terms->get($clv);
            $bstr.=" + " . $coeff->toString() . "*" . $clv->toString();
        }
        return $bstr;
    }

	/**
	 * @param ClLinearExpression $e1
	 * @param ClLinearExpression $e2
	 *
	 * @return ClLinearExpression
	 */
    public final static function Plus(ClLinearExpression $e1, ClLinearExpression $e2) {
		return $e1->plus_cllinearexpression($e2);
	}

	/**
	 * @param ClLinearExpression $e1
	 * @param ClLinearExpression $e2
	 * @return ClLinearExpression
	 */
    public final static function Minus(ClLinearExpression $e1, ClLinearExpression $e2) {
		return $e1->minus_cllinearexpression($e2);
	}

	/**
	 	 * @param ClLinearExpression $e1
	 * @param ClLinearExpression $e2
	 * @return ClLinearExpression
	 * @throws NonlinearExpressionException
	 */
    public final static function Times(ClLinearExpression $e1, ClLinearExpression $e2) {
		return $e1->times_cllinearexpression($e2);
	}

	/**
	 * @param ClLinearExpression $e1
	 * @param ClLinearExpression $e2
	 *
	 * @return ClLinearExpression
	 * @throws NonlinearExpressionException
	 */
    public final static function Divide(ClLinearExpression $e1, ClLinearExpression $e2) {
		return $e1->divide_cllinearexpression($e2);
	}

	/**
	 * @param ClLinearExpression $e1
	 * @param ClLinearExpression $e2
	 * @return boolean
	 */
    public final static function FEquals( ClLinearExpression $e1, ClLinearExpression $e2 ) {
		return $e1 == $e2;
	}

}

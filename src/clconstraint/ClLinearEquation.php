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

class ClLinearEquation extends ClLinearConstraint {

	use \DaveRoss\CassowaryConstraintSolver\OverloadedMethods;

	/**
	 * @param ClLinearExpression $cle
	 * @param ClStrength         $strength
	 * @param double             $weight
	 */
	public function __construct_cllinearexpression_clstrength_double( ClLinearExpression $cle, ClStrength $strength, $weight ) {
		parent::__construct_cllinearexpression_clstrength_double( $cle, $strength, doubleval( $weight ) );
	}

	/**
	 * @param ClLinearExpression $cle
	 * @param ClStrength         $strength
	 */
	public function __construct_cllinearexpression_clstrength( ClLinearExpression $cle, ClStrength $strength ) {
		parent::__construct_cllinearexpression_clstrength( $cle, $strength );
	}

	/**
	 * @param ClLinearExpression $cle
	 */
	public function __construct_cllinearexpression( ClLinearExpression $cle ) {
		parent::__construct_cllinearexpression( $cle );
	}

	/**
	 * @param ClAbstractVariable $clv
	 * @param ClLinearExpression $cle
	 * @param ClStrength         $strength
	 * @param                    $weight
	 */
	public function __construct_clabstractvariable_cllinearexpression_clstrength_double( ClAbstractVariable $clv, ClLinearExpression $cle, ClStrength $strength, $weight ) {
		parent::__construct_cllinearexpression_clstrength_double( $cle, $strength, doubleval( $weight ) );
		$this->_expression->addVariable( $clv, - 1.0 );
	}

	/**
	 * @param ClAbstractVariable $clv
	 * @param ClLinearExpression $cle
	 * @param ClStrength         $strength
	 */
	public function __construct_clabstractvariable_cllinearexpression_clstrength( ClAbstractVariable $clv, ClLinearExpression $cle, ClStrength $strength ) {
		$this->__construct_clabstractvariable_cllinearexpression_clstrength_double( $clv, $cle, $strength, 1.0 );
	}

	/**
	 * @param ClAbstractVariable $clv
	 * @param ClLinearExpression $cle
	 */
	public function __construct_clabstractvariable_cllinearexpression( ClAbstractVariable $clv, ClLinearExpression $cle ) {
		$this->__construct_clabstractvariable_cllinearexpression_clstrength_double( $clv, $cle, ClStrength::$required, 1.0 );
	}

	/**
	 * @param ClAbstractVariable $clv
	 * @param double             $val
	 * @param ClStrength         $strength
	 * @param double             $weight
	 */
	public function __construct_clabstractvariable_double_clstrength_double( ClAbstractVariable $clv, $val, ClStrength $strength, $weight ) {
		parent::__construct_cllinearexpression_clstrength_double( new ClLinearExpression( $val ), $strength, doubleval( $weight ) );
		$this->_expression->addVariable( $clv, - 1.0 );
	}

	/**
	 * @param ClAbstractVariable $clv
	 * @param double             $val
	 * @param ClStrength         $strength
	 */
	public function __construct_clabstractvariable_double_clstrength( ClAbstractVariable $clv, $val, ClStrength $strength ) {
		$this->__construct_clabstractvariable_double_clstrength_double( $clv, $val, $strength, 1.0 );
	}

	/**
	 * @param ClAbstractVariable $clv
	 * @param double             $val
	 */
	public function __construct_clabstractvariable_double( ClAbstractVariable $clv, $val ) {
		$this->__construct_clabstractvariable_double_clstrength_double( $clv, $val, ClStrength::$required, 1.0 );
	}

	/**
	 * @param ClLinearExpression $cle
	 * @param ClAbstractVariable $clv
	 * @param ClStrength         $strength
	 * @param double             $weight
	 */
	public function __construct_cllinearexpression_clabstractvariable_clstrength_double( ClLinearExpression $cle, ClAbstractVariable $clv, ClStrength $strength, $weight ) {
		parent::__construct_cllinearexpression_clstrength_double( clone( $cle ), $strength, doubleval( $weight ) );
		$this->_expression->addVariable( $clv, - 1.0 );
	}

	/**
	 * @param ClLinearExpression $cle
	 * @param ClAbstractVariable $clv
	 * @param ClStrength         $strength
	 */
	public function __construct_cllinearexpression_clabstractvariable_clstrength( ClLinearExpression $cle, ClAbstractVariable $clv, ClStrength $strength ) {
		$this->__construct_cllinearexpression_clabstractvariable_clstrength_double( $cle, $clv, $strength, 1.0 );
	}

	/**
	 * @param ClLinearExpression $cle
	 * @param ClAbstractVariable $clv
	 */
	public function __construct_cllinearexpression_clabstractvariable( ClLinearExpression $cle, ClAbstractVariable $clv ) {
		$this->__construct_cllinearexpression_clabstractvariable_clstrength_double( $cle, $clv, ClStrength::$required, 1.0 );
	}

	/**
	 * @param ClLinearExpression $cle1
	 * @param ClLinearExpression $cle2
	 * @param ClStrength         $strength
	 * @param double             $weight
	 */
	public function __construct_cllinearexpression_cllinearexpression_clstrength_double( ClLinearExpression $cle1, ClLinearExpression $cle2, ClStrength $strength, $weight ) {
		parent::__construct_cllinearexpression_clstrength_double( clone( cle1 ), $strength, doubleval( $weight ) );
		$this->_expression->addExpression( $cle2, - 1.0 );
	}

	/**
	 * @param ClLinearExpression $cle1
	 * @param ClLinearExpression $cle2
	 * @param ClStrength         $strength
	 */
	public function __construct_cllinearexpression_cllinearexpression_clstrength( ClLinearExpression $cle1, ClLinearExpression $cle2, ClStrength $strength ) {
		$this->__construct_cllinearexpression_cllinearexpression_clstrength_double( $cle1, $cle2, $strength, 1.0 );
	}

	public function __construct_cllinearexpression_cllinearexpression( ClLinearExpression $cle1, ClLinearExpression $cle2 ) {
		$this->__construct_cllinearexpression_cllinearexpression_clstrength_double( $cle1, $cle2, ClStrength::$required, 1.0 );
	}

	/**
	 * @return string
	 */
	public function __toString() {
		return parent::__toString() . " = 0 )";
	}
}

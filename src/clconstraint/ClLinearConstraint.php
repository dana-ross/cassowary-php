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

class ClLinearConstraint extends ClConstraint {

	use \DaveRoss\CassowaryConstraintSolver\OverloadedMethods;

	protected $_expression; /* ClLinearExpression */

	/**
	 * @param ClLinearExpression $cle
	 * @param ClStrength         $strength
	 * @param double             $weight
	 */
	public function __construct_cllinearexpression_clstrength_double( ClLinearExpression $cle, ClStrength $strength, $weight ) {
		parent::__construct_clstrength_double( $strength, doubleval( $weight ) );
		$this->_expression = $cle;
	}

	public function __construct_cllinearexpression_clstrength( ClLinearExpression $cle, ClStrength $strength ) {
		parent::__construct_clstrength_double( $strength, 1.0 );
		$this->_expression = $cle;
	}

	public function __construct_cllinearexpression( ClLinearExpression $cle ) {
		parent::__construct_clstrength_double( ClStrength::$required, 1.0 );
		$this->_expression = $cle;
	}

	/**
	 * @return ClLinearExpression
	 */
	public function expression() {
		return $this->_expression;
	}

	/**
	 * @param ClLinearExpression $expr
	 *
	 * @return void
	 */
	protected function setExpression( ClLinearExpression $expr ) {
		$this->_expression = $expr;
	}

}

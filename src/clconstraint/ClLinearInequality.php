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

class ClLinearInequality extends ClLinearConstraint {

	use \DaveRoss\CassowaryConstraintSolver\OverloadedMethods;

	/**
	 * @param ClLinearExpression $cle
	 * @param ClStrength         $strength
	 * @param float              $weight
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
	 * @param ClVariable $clv1
	 * @param integer    $op_enum CL::LEQ, CL::GEQ
	 * @param ClVariable $clv2
	 * @param ClStrength $strength
	 * @param double     $weight
	 *
	 * @throws DaveRoss\CassowaryConstraintSolver\CLInternalError
	 */
	public function __construct_clvariable_integer_clvariable_clstrength_double( ClVariable $clv1, $op_enum, ClVariable $clv2, ClStrength $strength, $weight ) {
		parent::__construct_cllinearexpression_clstrength_double( new ClLinearExpression( $clv2 ), $strength, doubleval( $weight ) );
		if ( $op_enum == CL::GEQ ) {
			$this->_expression->multiplyMe( - 1.0 );
			$this->_expression->addVariable_clabstractvariable( $clv1 );
		} else if ( $op_enum == CL::LEQ ) {
			$this->_expression->addVariable_clabstractvariable_double( $clv1, - 1.0 );
		} else {
			// the operator was invalid
			throw new CLInternalError( "Invalid operator in ClLinearInequality constructor" );
		}
	}

	/**
	 * @param ClVariable $clv1
	 * @param integer    $op_enum
	 * @param ClVariable $clv2
	 * @param ClStrength $strength
	 *
	 * @throws DaveRoss\CassowaryConstraintSolver\CLInternalError
	 */
	public function __construct_clvariable_integer_clvariable_clstrength( ClVariable $clv1, $op_enum, ClVariable $clv2, ClStrength $strength ) {
		$this->__construct_clvariable_integer_clvariable_clstrength_double( $clv1, $op_enum, $clv2, $strength, 1.0 );
	}

	/**
	 * @param ClVariable $clv1
	 * @param integer    $op_enum
	 * @param ClVariable $clv2
	 *
	 * @throws DaveRoss\CassowaryConstraintSolver\CLInternalError
	 */
	public function __construct_clvariable_integer_clvariable( ClVariable $clv1, $op_enum, ClVariable $clv2 ) {
		$this->__construct_clvariable_integer_clvariable_clstrength_double( $clv1, $op_enum, $clv2, ClStrength::$required, 1.0 );
	}

	/**
	 * @param ClVariable $clv
	 * @param integer    $op_enum
	 * @param  double    $val
	 * @param ClStrength $strength
	 * @param  double    $weight
	 *
	 * @throws DaveRoss\CassowaryConstraintSolver\CLInternalError
	 */
	public function __construct_clvariable_integer_double_clstrength_double( ClVariable $clv, $op_enum, $val, ClStrength $strength, $weight ) {
		parent::__construct_cllinearexpression_clstrength_double( new ClLinearExpression( $val ), $strength, doubleval( $weight ) );

		if ( $op_enum == CL::GEQ ) {
			$this->_expression->multiplyMe( - 1.0 );
			$this->_expression->addVariable_clabstractvariable( $clv );
		} else if ( $op_enum == CL::LEQ ) {
			$this->_expression->addVariable_clabstractvariable_double( $clv, - 1.0 );
		} else {
			// the operator was invalid
			throw new CLInternalError( "Invalid operator in ClLinearInequality constructor" );
		}
	}

	/**
	 * @param ClVariable     $clv
	 * @param  integer       $op_enum
	 * @param         double $val
	 * @param ClStrength     $strength
	 *
	 * @throws DaveRoss\CassowaryConstraintSolver\CLInternalError
	 */
	public function __construct_clvariable_integer_double_clstrength( ClVariable $clv, $op_enum, $val, ClStrength $strength ) {
		$this->__construct_clvariable_integer_double_clstrength_double( $clv, $op_enum, doubleval( $val ), $strength, 1.0 );
	}

	/**
	 * @param ClVariable       $clv
	 * @param        integer   $op_enum
	 * @param           double $val
	 *
	 * @throws DaveRoss\CassowaryConstraintSolver\CLInternalError
	 */
	public function __construct_clvariable_integer_double( ClVariable $clv, $op_enum, $val ) {
		$this->__construct_clvariable_integer_double_clstrength_double( $clv, $op_enum, doubleval( $val ), ClStrength::$required, 1.0 );
	}

	/**
	 * @param ClLinearExpression      $cle1
	 * @param   integer               $op_enum
	 * @param ClLinearExpression      $cle2
	 * @param ClStrength              $strength
	 * @param                  double $weight
	 *
	 * @throws DaveRoss\CassowaryConstraintSolver\CLInternalError
	 */
	public function __construct_cllinearexpression_integer_cllinearexpression_clstrength_double( ClLinearExpression $cle1, $op_enum, ClLinearExpression $cle2, ClStrength $strength, $weight ) {

		parent::__construct_cllinearexpression_clstrength_double( clone( $cle2 ), $strength, doubleval( $weight ) );
		if ( $op_enum == CL::GEQ ) {
			$this->_expression->multiplyMe( - 1.0 );
			$this->_expression->addExpression_cllinearexpression( $cle1 );
		} else if ( $op_enum == CL::LEQ ) {
			$this->_expression->addExpression_cllinearexpression_double( $cle1, - 1.0 );
		} else {
			// the operator was invalid
			throw new CLInternalError( "Invalid operator in ClLinearInequality constructor" );
		}
	}

	/**
	 * @param ClLinearExpression $cle1
	 * @param   integer          $op_enum
	 * @param ClLinearExpression $cle2
	 * @param ClStrength         $strength
	 *
	 * @throws DaveRoss\CassowaryConstraintSolver\CLInternalError
	 */
	public function __construct_cllinearexpression_integer_cllinearexpression_clstrength( ClLinearExpression $cle1, $op_enum, ClLinearExpression $cle2, ClStrength $strength ) {
		$this->__construct_cllinearexpression_integer_cllinearexpression_clstrength_double( $cle1, $op_enum, $cle2, $strength, 1.0 );
	}

	/**
	 * @param ClLinearExpression $cle1
	 * @param   integer          $op_enum
	 * @param ClLinearExpression $cle2
	 *
	 * @throws DaveRoss\CassowaryConstraintSolver\CLInternalError
	 */
	public function __construct_cllinearexpression_integer_cllinearexpression( ClLinearExpression $cle1, $op_enum, ClLinearExpression $cle2 ) {
		$this->__construct_cllinearexpression_integer_cllinearexpression_clstrength_double( $cle1, $op_enum, $cle2, ClStrength::$required, 1.0 );
	}

	/**
	 * @param ClAbstractVariable $clv
	 * @param   integer          $op_enum
	 * @param ClLinearExpression $cle
	 * @param ClStrength         $strength
	 * @param          double    $weight
	 *
	 * @throws DaveRoss\CassowaryConstraintSolver\CLInternalError
	 */
	public function __construct_clabstractvariable_integer_cllinearexpresion_clstrength_double( ClAbstractVariable $clv, $op_enum, ClLinearExpression $cle, ClStrength $strength, $weight ) {
		parent::__construct_cllinearexpression_clstrength_double( clone( $cle ), $strength, doubleval( $weight ) );
		if ( $op_enum == CL::GEQ ) {
			$this->_expression->multiplyMe( - 1.0 );
			$this->_expression->addVariable_clabstractvariable( $clv );
		} else if ( $op_enum == CL::LEQ ) {
			$this->_expression->addVariable_clabstractvariable_double( $clv, - 1.0 );
		} else {
			// the operator was invalid
			throw new CLInternalError( "Invalid operator in ClLinearInequality constructor" );
		}
	}

	/**
	 * @param ClAbstractVariable $clv
	 * @param        integer     $op_enum
	 * @param ClLinearExpression $cle
	 * @param ClStrength         $strength
	 *
	 * @throws DaveRoss\CassowaryConstraintSolver\CLInternalError
	 */
	public function __construct_clabstractvariable_integer_cllinearexpression_clstrength( ClAbstractVariable $clv, $op_enum, ClLinearExpression $cle, ClStrength $strength ) {
		$this->__construct_clabstractvariable_integer_cllinearexpresion_clstrength_double( $clv, $op_enum, $cle, $strength, 1.0 );
	}

	/**
	 * @param ClAbstractVariable $clv
	 * @param   integer          $op_enum
	 * @param ClLinearExpression $cle
	 *
	 * @throws DaveRoss\CassowaryConstraintSolver\CLInternalError
	 */
	public function __construct_clabstractvariable_integer_cllinearexpression( ClAbstractVariable $clv, $op_enum, ClLinearExpression $cle ) {
		$this->__construct_clabstractvariable_integer_cllinearexpresion_clstrength_double( $clv, $op_enum, $cle, ClStrength::$required, 1.0 );
	}

	/**
	 * @param ClLinearExpression $cle
	 * @param     integer        $op_enum
	 * @param ClAbstractVariable $clv
	 * @param ClStrength         $strength
	 * @param            double  $weight
	 *
	 * @throws DaveRoss\CassowaryConstraintSolver\CLInternalError
	 */
	public function __construct_cllinearexpression_integer_clabstractvariable_clstrength_double( ClLinearExpression $cle, $op_enum, ClAbstractVariable $clv, ClStrength $strength, $weight ) {
		parent::__construct_cllinearexpression_clstrength_double( clone( $cle ), $strength, doubleval( $weight ) );
		if ( $op_enum == CL::LEQ ) {
			$this->_expression->multiplyMe( - 1.0 );
			$this->_expression->addVariable_clabstractvariable( $clv );
		} else if ( $op_enum == CL::GEQ ) {
			$this->_expression->addVariable_clabstractvariable_double( $clv, - 1.0 );
		} else {
			// the operator was invalid
			throw new CLInternalError( "Invalid operator in ClLinearInequality constructor" );
		}
	}

	/**
	 * @param ClLinearExpression $cle
	 * @param     integer        $op_enum
	 * @param ClAbstractVariable $clv
	 * @param ClStrength         $strength
	 *
	 * @throws DaveRoss\CassowaryConstraintSolver\CLInternalError
	 */
	public function __construct_cllinearexpression_integer_clabstractvariable_clstrength( ClLinearExpression $cle, $op_enum, ClAbstractVariable $clv, ClStrength $strength ) {
		$this->__construct_cllinearexpression_integer_clabstractvariable_clstrength_double( $cle, $op_enum, $clv, $strength, 1.0 );
	}

	/**
	 * @param ClLinearExpression $cle
	 * @param integer            $op_enum
	 * @param ClAbstractVariable $clv
	 */
	public function __construct_cllinearexpression_integer_clabstractvariable( ClLinearExpression $cle, $op_enum, ClAbstractVariable $clv ) {
		$this->__construct_cllinearexpression_integer_clabstractvariable_clstrength_double( $cle, $op_enum, $clv, ClStrength::$required, 1.0 );
	}

	/**
	 * @return bool
	 */
	final public function isInequality() {
		return true;
	}

	/**
	 * @return string
	 */
	final public function __toString() {
		return parent::__toString() . " >= 0 )";
	}
}

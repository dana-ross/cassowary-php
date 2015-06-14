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

/**
 * The enumerations from ClLinearInequality, and `global' functions that we want easy to access
 */
namespace DaveRoss\CasswaryConstraintSolver;

class CL {
	protected static /* boolean */
		$fDebugOn = false;
	public static /* boolean */
		$fTraceOn = false; // true;
	protected static /* boolean */
		$fTraceAdded = false;
	protected static /* boolean */
		$fGC = false;

	const GEQ = 1;
	const LEQ = 2;

	/**
	 * @param String $s
	 *
	 * @return void
	 */
	protected static function debugprint( $s ) {
		echo $s . "\n";
	}

	/**
	 * @param String $s
	 *
	 * @return void
	 */
	protected static function traceprint( $s ) {
		echo $s . "\n";
	}

	/**
	 * @param String $s
	 *
	 * @return void
	 */
	protected static function fnenterprint( $s ) {
		echo "* " . $s;
	}

	/**
	 * @param String $s
	 *
	 * @return void
	 */
	protected static function fnexitprint( $s ) {
		echo "- " . $s;
	}

	/**
	 * @param ClLinearExpression $e1
	 * @param ClLinearExpression $e2
	 *
	 * @return ClLinearExpression
	 */
	public static function Plus_cllinearexpression_cllinearexpression( ClLinearExpression $e1, ClLinearExpression $e2 ) {
		return $e1->plus( $e2 );
	}

	/**
	 * @param ClLinearExpression $e1
	 * @param double             $e2
	 *
	 * @return ClLinearExpression
	 */
	public static function Plus_cllinearexpression_double( ClLinearExpression $e1, $e2 ) {
		return $e1->plus( new ClLinearExpression( doubleval( $e2 ) ) );
	}

	/**
	 * @param double             $e1
	 * @param ClLinearExpression $e2
	 *
	 * @return ClLinearExpression
	 */
	public static function Plus_double_cllinearexpression( $e1, ClLinearExpression $e2 ) {
		return ( new ClLinearExpression( doubleval( $e1 ) ) )->plus( $e2 );
	}

	/**
	 * @param ClVariable         $e1
	 * @param ClLinearExpression $e2
	 *
	 * @return ClLinearExpression
	 */
	public static function Plus_clvariable_cllinearexpression( ClVariable $e1, ClLinearExpression $e2 ) {
		return ( new ClLinearExpression( $e1 ) )->plus( $e2 );
	}

	/**
	 * @param ClLinearExpression $e1
	 * @param ClVariable         $e2
	 *
	 * @return ClLinearExpression
	 */
	public static function Plus_cllinearexpression_clvariable( ClLinearExpression $e1, ClVariable $e2 ) {
		return $e1->plus( new ClLinearExpression( $e2 ) );
	}

	/**
	 * @param ClVariable $e1
	 * @param double     $e2
	 *
	 * @return ClLinearExpression
	 */
	public static function Plus_clvariable_double( ClVariable $e1, $e2 ) {
		return ( new ClLinearExpression( $e1 ) )->plus( new ClLinearExpression( doubleval( $e2 ) ) );
	}

	/**
	 * @param double     $e1
	 * @param ClVariable $e2
	 *
	 * @return ClLinearExpression
	 */
	public static function Plus_double_clvariable( $e1, ClVariable $e2 ) {
		return ( new ClLinearExpression( doubleval( $e1 ) ) )->plus( new ClLinearExpression( $e2 ) );
	}

	/**
	 * @param ClLinearExpression $e1
	 * @param ClLinearExpression $e2
	 *
	 * @return ClLinearExpression
	 */
	public static function Minus_cllinearexpression_cllinearexpression( ClLinearExpression $e1, ClLinearExpression $e2 ) {
		return $e1->minus( $e2 );
	}

	/**
	 * @param double             $e1
	 * @param ClLinearExpression $e2
	 *
	 * @return ClLinearExpression
	 */
	public static function Minus_double_cllinearexpression( $e1, ClLinearExpression $e2 ) {
		return ( new ClLinearExpression( doubleval( $e1 ) ) )->minus( $e2 );
	}

	/**
	 * @param ClLinearExpression $e1
	 * @param double             $e2
	 *
	 * @return ClLinearExpression
	 */
	public static function Minus_cllinearexpression_double( ClLinearExpression $e1, $e2 ) {
		return $e1->minus( new ClLinearExpression( doubleval( $e2 ) ) );
	}

	/**
	 * @param ClLinearExpression $e1
	 * @param ClLinearExpression $e2
	 *
	 * @return ClLinearExpression
	 * @throws NonlinearExpressionException
	 */
	public static function Times_cllinearexpression_cllinearexpression( ClLinearExpression $e1, ClLinearExpression $e2 ) {
		return $e1->times( $e2 );
	}

	/**
	 * @param ClLinearExpression $e1
	 * @param ClVariable         $e2
	 *
	 * @retrun ClLinearExpression
	 * @throws NonlinearExpressionException
	 */
	public static function Times_cllinearexpression_clvariable( ClLinearExpression $e1, ClVariable $e2 ) {
		return $e1->times( new ClLinearExpression( $e2 ) );
	}

	/**
	 * @param ClVariable         $e1
	 * @param ClLinearExpression $e2
	 *
	 * @return ClLinearExpression
	 * @throws NonlinearExpressionException
	 */
	public static function Times_clvariable_cllinearexpression( ClVariable $e1, ClLinearExpression $e2 ) {
		return ( new ClLinearExpression( $e1 ) )->times( $e2 );
	}

	/**
	 * @param ClLinearExpression $e1
	 * @param double             $e2
	 *
	 * @return ClLinearExpression
	 * @throws NonlinearExpressionException
	 */
	public static function Times_cllinearexpression_double( ClLinearExpression $e1, $e2 ) {
		return $e1->times( new ClLinearExpression( doubleval( $e2 ) ) );
	}

	/**
	 * @param double             $e1
	 * @param ClLinearExpression $e2
	 *
	 * @return ClLinearExpression
	 * @throws NonlinearExpressionException
	 */
	public static function Times_double_cllinearexpression( $e1, ClLinearExpression $e2 ) {
		return ( new ClLinearExpression( doubleval( $e1 ) ) )->times( $e2 );
	}

	/**
	 * @param double     $n
	 * @param ClVariable $clv
	 *
	 * @return ClLinearExpression
	 * @throws NonlinearExpressionException
	 */
	public static function Times_double_clvariable( $n, ClVariable $clv ) {
		return ( new ClLinearExpression( $clv, doubleval( $n ) ) );
	}

	/**
	 * @param ClVariable $clv
	 * @param double     $n
	 *
	 * @return ClLinearExpression
	 * @throws throws NonlinearExpressionException
	 */
	public static function Times_clvariable_double( ClVariable $clv, $n ) {
		return ( new ClLinearExpression( $clv, doubleval( $n ) ) );
	}

	/**
	 * @param ClLinearExpression $e1
	 * @param ClLinearExpression $e2
	 *
	 * @return ClLinearExpression
	 * @throws throws NonlinearExpressionException
	 */
	public static function Divide( ClLinearExpression $e1, ClLinearExpression $e2 ) {
		return $e1->divide( $e2 );
	}

	/**
	 * @param double $a
	 * @param double $b
	 *
	 * @return boolean
	 */
	public static function approx_double_double( $a, $b ) {

		$a = doubleval( $a );
		$b = doubleval( $b );

		$epsilon = doubleval( 1.0e-8 );
		if ( $a == 0.0 ) {
			return ( abs( $b ) < $epsilon );
		} else if ( $b == 0.0 ) {
			return ( abs( $a ) < $epsilon );
		} else {
			return ( abs( $a - $b ) < abs( $a ) * $epsilon );
		}
	}

	/**
	 * @param ClVariable $clv
	 * @param double     $b
	 *
	 * @return boolean
	 */
	public static function approx_clvariable_double( ClVariable $clv, $b ) {
		return approx( $clv->getValue(), doubleval( $b ) );
	}

	/**
	 * @param double     $a
	 * @param ClVariable $clv
	 *
	 * @return boolean
	 */
	static function approx_double_clvariable( $a, ClVariable $clv ) {
		return approx( doubleval( $a ), $clv->getValue() );
	}

}

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

class ClSymbolicWeight {

	use \DaveRoss\CassowaryConstraintSolver\OverloadedMethods;

	public static $clsZero; /* ClSymbolicWeight */

	private $_values;

	/**
	 * @param int $cLevels
	 */
	public function __construct_integer( $cLevels ) {
		$this->_values = new \SplFixedArray( $cLevels );
	}

	/**
	 * @param double $w1
	 * @param double $w2
	 * @param double $w3
	 */
	public function __construct_double_double_double( $w1, $w2, $w3 ) {
		$this->_values = \SplFixedArray::fromArray( array( $w1, $w2, $w3 ) );
	}

	/**
	 * @param array $weights
	 */
	public function __construct_array( array $weights ) {
		$this->_values = \SplFixedArray::fromArray( $weights );
	}

	/**
	 * @return ClSymbolicWeight
	 */
	public function __clone() {
		return new ClSymbolicWeight( $this->_values->toArray() );
	}

	/**
	 * @param double $n
	 *
	 * @return ClSymbolicWeight
	 */
	public function times( $n ) {
		$clsw = new ClSymbolicWeight( count( $this->_values ) );
		foreach ( $this->_values as $index => $value ) {
			$clsw->_values[ $index ] = $value * doubleval( $n );
		}

		return $clsw;
	}

	/**
	 * @param double $n
	 *
	 * @return ClSymbolicWeight
	 */
	public function divideBy( $n ) {
		$clsw = new ClSymbolicWeight( count( $this->_values ) );
		foreach ( $this->_values as $index => $value ) {
			$clsw->_values[ $index ] = $value / doubleval( $n );
		}

		return $clsw;
	}

	/**
	 * @param ClSymbolicWeight $cl
	 *
	 * @return ClSymbolicWeight
	 */
	public function add( ClSymbolicWeight $cl ) {
		$clsw = new ClSymbolicWeight( count( $this->_values ) );
		foreach ( $this->_values as $index => $value ) {
			$clsw->_values[ $index ] = $value + $cl->_values[ $index ];
		}

		return $clsw;
	}

	/**
	 * @param ClSymbolicWeight $cl
	 *
	 * @return ClSymbolicWeight
	 */
	public function subtract( ClSymbolicWeight $cl ) {

		$clsw = new ClSymbolicWeight( count( $this->_values ) );
		foreach ( $this->_values as $index => $value ) {
			$clsw->_values[ $index ] = $value - $cl->_values[ $index ];
		}

		return $clsw;
	}

	/**
	 * @param ClSymbolicWeight $cl
	 *
	 * @return boolean
	 */
	public function lessThan( ClSymbolicWeight $cl ) {
		for ( $i = 0; $i < count( $this->_values ); $i ++ ) {
			if ( $this->_values[ $i ] < $cl->_values[ $i ] ) {
				return true;
			} else if ( $this->_values[ $i ] > $cl->_values[ $i ] ) {
				return false;
			}
		}

		return false; // they are equal
	}

	/**
	 * @param ClSymbolicWeight $cl
	 *
	 * @return boolean
	 */
	public function lessThanOrEqual( ClSymbolicWeight $cl ) {
		for ( $i = 0; $i < count( $this->_values ); $i ++ ) {
			if ( $this->_values[ $i ] < $cl->_values[ $i ] ) {
				return true;
			} else if ( $this->_values[ $i ] > $cl->_values[ $i ] ) {
				return false;
			}
		}

		return true; // they are equal
	}

	/**
	 * @param ClSymbolicWeight $cl
	 *
	 * @return boolean
	 */
	public function equal( ClSymbolicWeight $cl ) {
		for ( $i = 0; $i < count( $this->_values ); $i ++ ) {
			if ( $this->_values[ $i ] != $cl->_values[ $i ] ) {
				return false;
			}
		}

		return true; // they are equal
	}

	/**
	 * @param ClSymbolicWeight $cl
	 *
	 * @return boolean
	 */
	public function greaterThan( ClSymbolicWeight $cl ) {
		return ! $this->lessThanOrEqual( $cl );
	}

	/**
	 * @param ClSymbolicWeight $cl
	 *
	 * @return boolean
	 */
	public function greaterThanOrEqual( ClSymbolicWeight $cl ) {
		return ! $this->lessThan( $cl );
	}

	/**
	 * @return boolean
	 */
	public function isNegative() {
		return $this->lessThan( self::$clsZero );
	}

	/**
	 * @return double
	 */
	public function asDouble() {
		$sum        = 0.0;
		$factor     = 1.0;
		$multiplier = 1000.0;
		for ( $i = count( $this->_values ) - 1; $i >= 0; $i -- ) {
			$sum += $this->_values[ $i ] * $factor;
			$factor *= $multiplier;
		}

		return $sum;
	}

	/**
	 * @return String
	 */
	public function __toString() {
		$bstr = "[";
		for ( $i = 0; $i < count( $this->_values ) - 1; $i ++ ) {
			$bstr .= $this->_values[ $i ];
			$bstr .= ",";
		}
		$bstr .= $this->_values[ count( $this->_values ) - 1 ];
		$bstr .= "]";

		return $bstr;
	}

	/**
	 * @return integer
	 */
	public function cLevels() {
		return $this->_values->getSize();
	}

}

CLSymbolicWeight::$clsZero = new ClSymbolicWeight( 0.0, 0.0, 0.0 );

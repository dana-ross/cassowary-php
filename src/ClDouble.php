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

class ClDouble {

	use \DaveRoss\CassowaryConstraintSolver\OverloadedMethods;

	public $value; // double

	public function __construct_double( $val ) {
		$this->value = doubleval( $val );
	}

	public function __construct_default() {
		$this->value = 0.0;
	}

	/**
	 * @return ClDouble
	 */
	final public function __clone() {
		return new ClDouble( $this->value );
	}

	/**
	 * @return float
	 */
	final public function doubleValue() {
		return doubleval( $this->value );
	}

	/**
	 * @return int
	 */
	final public function intValue() {
		return intval( $this->value );
	}

	/**
	 * @return int PHP doesn't have a long datatype. ints are 64-bit however
	 */
	final public function longValue() {
		return $this->intValue();
	}

	/**
	 * @return float
	 */
	final public function floatValue() {
		return floatval( $this->value );
	}

//@Override
//final public byte byteValue(){
//return ( byte ) value;
//}
//
//@Override
//final public short shortValue(){
//return ( short ) value;
//}

	/**
	 * @param double $val
	 *
	 * @return void
	 */
	final public function setValue( $val ) {
		$this->value = doubleval( $val );
	}


	final public function __toString() {
		return sprintf( '%F', $this->value );
	}


	final public function equals( StdClass $o ) {
		return isset( $o->value ) ? $this->value == doubleval( $o->value ) : false;
	}

//	/**
//	 * @return int
//	 */
//final public function hashCode() {
////System . err . println( "ClDouble.hashCode() called!" );
//return (int) java . lang . Double . doubleToLongBits( value );
//}

}

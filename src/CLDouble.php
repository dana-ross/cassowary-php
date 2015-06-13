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

class ClDouble extends CLNumber {

	use \DaveRoss\CasswaryConstraintSolver\OverloadedConstructor;

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
	public final function __clone() {
		return new ClDouble( $this->value );
	}

	/**
	 * @return float
	 */
	public final function doubleValue() {
		return doubleval( $this->value );
	}

	/**
	 * @return int
	 */
	public final function intValue() {
		return intval( $this->value );
	}

	/**
	 * @return int PHP doesn't have a long datatype. ints are 64-bit however
	 */
	public final function longValue() {
		return $this->intValue();
	}

	/**
	 * @return float
	 */
	public final function floatValue() {
		return floatval( $this->value );
	}

//@Override
//public final byte byteValue(){
//return ( byte ) value;
//}
//
//@Override
//public final short shortValue(){
//return ( short ) value;
//}

	/**
	 * @param double $val
	 *
	 * @return void
	 */
	public final function setValue( $val ) {
		$this->value = doubleval( $val );
	}


	public final function __toString() {
		return sprintf( '%F', $this->value );
	}


	public final function equals( StdClass $o ) {
		return isset( $o->value ) ? $this->value == doubleval( $o->value ) : false;
	}


//	/**
//	 * @return int
//	 */
//public final function hashCode() {
////System . err . println( "ClDouble.hashCode() called!" );
//return (int) java . lang . Double . doubleToLongBits( value );
//}

}

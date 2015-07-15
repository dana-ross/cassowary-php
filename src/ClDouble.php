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
     * Return a clone of this value
     * Implements the __clone magic method
	 * @return ClDouble
	 */
	final public function __clone() {
		return new ClDouble( $this->value );
	}

	/**
     * Return this object's value as a true (scalar) double
	 * @return float
	 */
	final public function doubleValue() {
		return doubleval( $this->value );
	}

	/**
     * Return this object's value as an integer
	 * @return int
	 */
	final public function intValue() {
		return intval( $this->value );
	}

	/**
     * Return this object's value as a "long" integer
	 * @return int PHP doesn't have a long datatype. ints are 64-bit however
	 */
	final public function longValue() {
		return $this->intValue();
	}

	/**
     * REturn this object's value a floating-point number
	 * @return float
	 */
	final public function floatValue() {
		return floatval( $this->value );
	}

	/**
	 * @return integer
	 */
	final public function shortValue() {
		return intval( $this->value );
	}

	/**
     * Set this object's value
	 * @param double $val
	 *
	 * @return void
	 */
	final public function setValue( $val ) {
		$this->value = doubleval( $val );
	}

    /**
     * Return a string representation of this object
     * @return string
     */
	final public function __toString() {
		return sprintf( '%F', $this->value );
	}

    /**
     * Check if this object's value and another object's value are equal
     * Value is automatically false if $o isn't an object or doesn't contain
     * an accessible member named "value"
     *
     * @param object $o
     * @return bool
     */
	final public function equals( $o ) {
		return isset( $o->value ) ? $this->value == doubleval( $o->value ) : false;
	}
	
}

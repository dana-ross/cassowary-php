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

class ClVariable extends ClAbstractVariable {

	use \DaveRoss\CasswaryConstraintSolver\OverloadedMethods;

	private /* double */
		$_value;

	private /* Object */
		$_attachedObject;

	public function __construct_string_double( $name, $value ) {
		$this->_name  = $name;
		$this->_value = $value;
	}

	public function __construct_string( $name ) {
		$this->_name  = $name;
		$this->_value = 0.0;
	}

	/**
	 * @param double $value
	 *
	 * @return static
	 */
	public function __construct_double( $value ) {
		$this->_value = doubleval( $value );
	}

	/**
	 * @return static
	 */
	public function __construct_default() {
		$this->_value = 0.0;
	}

	public function __construct_int_string_double( $number, $prefix, $value ) {
		$this->_name  = $prefix . $number;
		$this->_value = $value;
	}

	public function __construct_long_string( $number, $prefix ) {
		$this->_name  = $prefix . $number;
		$this->_value = 0.0;
	}

	/**
	 * @return bool
	 */
	public function isDummy() {
		return false;
	}

	/**
	 * @return bool
	 */
	public function isExternal() {
		return true;
	}

	/**
	 * @return bool
	 */
	public function isPivotable() {
		return false;
	}

	/**
	 * @return bool
	 */
	public function isRestricted() {
		return false;
	}


	public function __toString() {
		return "[" . $this->name() . ":" . $this->_value . "]";
	}

	/**
	 * @return double
	 */
	public final function getValue() {
		return doubleval( $this->_value );
	}

	/**
	 * change the value held -- should *not* use this if the variable is
	 * in a solver -- instead use addEditVar() and suggestValue() interface
	 * @return void
	 */
	public final function setValue( $value ) {
		$this->_value = doubleval( $value );
	}

	/**
	 *  permit overriding in subclasses in case something needs to be
	 * done when the value is changed by the solver
	 * may be called when the value hasn't actually changed -- just
	 * means the solver is setting the external variable
	 *
	 * @return void
	 */
	public function change_value( $value ) {
		$this->_value = doubleval( $value );
	}

	/**
	 * @param stdClass $o
	 *
	 * @return void
	 */
	public function setAttachedObject( \stdClass $o ) {
		$this->_attachedObject = $o;
	}

	/**
	 * @return stdClass
	 */
	public function getAttachedObject() {
		return $this->_attachedObject;
	}

}

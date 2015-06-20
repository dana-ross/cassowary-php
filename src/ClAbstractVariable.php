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

abstract class ClAbstractVariable {

	use \DaveRoss\CassowaryConstraintSolver\OverloadedMethods;

	protected $_name;

	protected static $iVariableNumber = 0;

	public function __construct_string( $name ) {
		$this->_name = $name;
		self::$iVariableNumber ++;
	}

	public function __construct_default() {
		$this->_name = "v" . self::$iVariableNumber;
		self::$iVariableNumber ++;
	}

	public function __construct_integer_string( $varnumber, $prefix ) {
		$this->_name = $prefix . $varnumber;
		self::$iVariableNumber ++;
	}

	/**
	 * @return string
	 */
	public function name() {
		return (string) $this->_name;
	}

	/**
	 * @param string $name
	 */
	public function setName( $name ) {
		$this->_name = (string) $name;
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
	abstract public function isExternal();

	/**
	 * @return bool
	 */
	abstract public function isPivotable();

	/**
	 * @return bool
	 */
	abstract public function isRestricted();

	/**
	 * @return string
	 */
	abstract public function  __toString();

	/**
	 * @return int
	 */
	public static function numCreated() {
		return self::$iVariableNumber;
	}

}

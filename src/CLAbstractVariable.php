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

abstract class ClAbstractVariable {

	use \DaveRoss\CasswaryConstraintSolver\OverloadedMethods;

	protected $_name;

	protected static $iVariableNumber = 0;

	public function __construct_string( $name ) {
		$this->_name = $name;
		$this->iVariableNumber ++;
	}

	public function __construct_default() {
		$this->_name = "v" + $this->iVariableNumber;
		$this->iVariableNumber ++;
	}

	public function __construct_long_string( $varnumber, $prefix ) {
		$this->_name = $prefix + $varnumber;
		$this->iVariableNumber ++;
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
	public abstract function isExternal();

	/**
	 * @return bool
	 */
	public abstract function isPivotable();

	/**
	 * @return bool
	 */
	public abstract function isRestricted();

	/**
	 * @return string
	 */
	public abstract function  __toString();

	/**
	 * @return int
	 */
	public static function numCreated() {
		return self::$iVariableNumber;
	}

}

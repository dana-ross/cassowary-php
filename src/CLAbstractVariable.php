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

	use \DaveRoss\CasswaryConstraintSolver\OverloadedConstructor;

	protected $_name;

	protected static $iVariableNumber = 0;

	public static function __construct_string( $name ) {
		$instance        = new static();
		$instance->_name = $name;
		$instance->iVariableNumber ++;

		return $instance;
	}

	public static function __construct_default() {
		$instance        = new static();
		$instance->_name = "v" + $instance->iVariableNumber;
		$instance->iVariableNumber ++;

		return $instance;
	}

	public static function __construct_long_string( $varnumber, $prefix ) {
		$instance        = new static();
		$instance->_name = $prefix + $varnumber;
		$instance->iVariableNumber ++;

		return $instance;
	}

	/**
	 * @return string
	 */
	public
	function name() {
		return (string) $this->_name;
	}

	/**
	 * @param string $name
	 */
	public
	function setName(
		$name
	) {
		$this->_name = (string) $name;
	}

	/**
	 * @return bool
	 */
	public
	function isDummy() {
		return false;
	}

	/**
	 * @return bool
	 */
	public

	abstract function isExternal();

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

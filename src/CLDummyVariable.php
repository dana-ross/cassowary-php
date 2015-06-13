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

class ClDummyVariable extends ClAbstractVariable {

	use \DaveRoss\CasswaryConstraintSolver\OverloadedConstructor;
	use \DaveRoss\CasswaryConstraintSolver\CastTarget;

	/**
	 * @param string $name
	 *
	 * @return ClDummyVariable
	 * @todo is this necessary or will constructor overloading just work here?
	 */
	public static function __construct_string( $name ) {
		return self::__cast_to_self( parent::__construct_string( $name ) );
	}

	public static function __construct_default() {
	}

	/**
	 * @param long   $number
	 * @param string $prefix
	 *
	 * @return ClDummyVariable
	 * @todo is this necessary or will constructor overloading just work here?
	 */
	public static function __construct_long_string( $number, $prefix ) {
		return self::__cast_to_self( parent::__construct_long_string( $number, $prefix ) );
	}

	/**
	 * @return string
	 */
	public function __toString() {
		return "[" . $this->name() . ":dummy]";
	}

	/**
	 * @return bool
	 */
	public function isDummy() {
		return true;
	}

	/**
	 * @return bool
	 */
	public function isExternal() {
		return false;
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
		return true;
	}

}

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

class ClSlackVariable extends ClAbstractVariable {

	use \DaveRoss\CassowaryConstraintSolver\OverloadedMethods;

	public function __construct_string( $name ) {
		parent::__construct_string( $name );
	}

	public function __construct_default() {
		parent::__construct_default();
	}

	public function __construct_integer_string( $number, $prefix ) {
		parent::__construct_integer_string( $number, $prefix );
	}


	public function __toString() {
		return "[" . $this->name() . ":slack]";
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
		return true;
	}

	/**
	 * @return bool
	 */
	public function isRestricted() {
		return true;
	}

}

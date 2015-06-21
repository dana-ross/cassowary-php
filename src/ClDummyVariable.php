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

class ClDummyVariable extends ClAbstractVariable {

	/**
     * Return a string representation of this variable
	 * @return string
	 */
	public function __toString() {
		return "[" . $this->name() . ":dummy]";
	}

	/**
     * Check if this is a "dummy" variable
	 * @return bool
	 */
	public function isDummy() {
		return true;
	}

	/**
     * Check if this is an "external" variable
	 * @return bool
	 */
	public function isExternal() {
		return false;
	}

	/**
     * Check if this variable is pivotable
	 * @return bool
	 */
	public function isPivotable() {
		return false;
	}

	/**
     * Check if this variable is restricted
	 * @return bool
	 */
	public function isRestricted() {
		return true;
	}

}

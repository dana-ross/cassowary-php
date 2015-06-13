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

class ClObjectiveVariable extends ClAbstractVariable {

	use \DaveRoss\CasswaryConstraintSolver\CastTarget;

	public function __toString() {
		return "[" . $this->name() . ":obj]";
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
		return false;
	}

}

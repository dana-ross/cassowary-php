<?php

/**
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

class ClStayConstraint extends ClEditOrStayConstraint {

	use \DaveRoss\CassowaryConstraintSolver\OverloadedMethods;

	/**
	 * @param ClVariable $var
	 * @param ClStrength $strength
	 * @param double     $weight
	 */
	public function __construct_clvariable_clstrength_double( ClVariable $var, ClStrength $strength, $weight ) {
		parent::__construct_clvariable_clstrength_double( $var, $strength, doubleval( $weight ) );
	}

	/**
	 * @param ClVariable $var
	 * @param ClStrength $strength
	 */
	public function __construct_clvariable_clstrength( ClVariable $var, ClStrength $strength ) {
		parent::__construct_clvariable_clstrength_double( $var, $strength, 1.0 );
	}

	/**
	 * @param ClVariable $var
	 */
	public function __construct_clvariable( ClVariable $var ) {
		parent::__construct_clvariable_clstrength_double( $var, ClStrength::$weak, 1.0 );
	}

	/**
	 * @return bool
	 */
	public function isStayConstraint() {
		return true;
	}

	/**
	 * @return string
	 */
	public function __toString() {
		return "stay " . parent::__toString();
	}

}

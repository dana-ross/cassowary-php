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

class ClEditConstraint extends ClEditOrStayConstraint {

	use \DaveRoss\CassowaryConstraintSolver\OverloadedMethods;

	/**
	 * @param ClVariable $clv
	 * @param ClStrength $strength
	 * @param double     $weight
	 */
	public function __construct_clvariable_clstrength_double( ClVariable $clv, ClStrength $strength, $weight ) {
		parent::__construct_clvariable_clstrength_double( $clv, $strength, doubleval( $weight ) );
	}

	/**
	 * @param ClVariable $clv
	 * @param ClStrength $strength
	 */
	public function __construct_clvariable_clstrength( ClVariable $clv, ClStrength $strength ) {
		parent::__construct_clvariable_clstrength( $clv, $strength );
	}

	/**
	 * @param ClVariable $clv
	 */
	public function __construct_clvariable( ClVariable $clv ) {
		parent::__construct_clvariable( $clv );
	}

	/**
	 * @return bool
	 */
	public function isEditConstraint() {
		return true;
	}

	/**
	 * @return string
	 */
	public function __toString() {
		return "edit" . parent::__toString();
	}

}

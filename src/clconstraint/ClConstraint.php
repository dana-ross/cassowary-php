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

abstract class ClConstraint {

	use \DaveRoss\CassowaryConstraintSolver\OverloadedMethods;

	private $_strength; /* ClStrength */
	private $_weight; /* double */

	private $_attachedObject; /* Object */

	private $_times_added; /* int */

	/**
	 * @param ClStrength $strength
	 * @param double     $weight
	 */
	public function __construct_clstrength_double( ClStrength $strength, $weight ) {
		$this->_strength    = $strength;
		$this->_weight      = doubleval( $weight );
		$this->_times_added = 0;
	}

	/**
	 * @param ClStrength $strength
	 */
	public function __construct_clstrength( ClStrength $strength ) {
		$this->__construct_clstrength_double( $strength, 1.0 );
	}

	/**
	 *
	 */
	public function __construct_default() {
		$this->__construct_clstrength_double( ClStrength::$required, 1.0 );
	}

	/**
	 * @return ClLinearExpression
	 */
	abstract public function expression();

	/**
	 * @return bool
	 */
	public function isEditConstraint() {
		return false;
	}

	/**
	 * @return bool
	 */
	public function isInequality() {
		return false;
	}

	/**
	 * @return bool
	 */
	public function isRequired() {
		return $this->_strength->isRequired();
	}

	/**
	 * @return bool
	 */
	public function isStayConstraint() {
		return false;
	}

	/**
	 * @return ClStrength
	 */
	public function strength() {
		return $this->_strength;
	}

	/**
	 * @return double
	 */
	public function weight() {
		return doubleval( $this->_weight );
	}


	public function __toString() {
		return $this->_strength->__toString() . " {" . $this->weight() . "} (" . $this->expression();
	}

	/**
	 * @param object $o
	 *
	 * @return void
	 */
	public function setAttachedObject( $o ) {
		$this->_attachedObject = $o;
	}

	/**
	 * @return object
	 */
	public function getAttachedObject() {
		return $this->_attachedObject;
	}

	/**
	 * @param ClStrength $strength
	 *
	 * @return void
	 * @throws DaveRoss\CassowaryConstraintSolver\TooDifficultException
	 */
	public function changeStrength( ClStrength $strength ) {
		if ( $this->_times_added == 0 ) {
			$this->setStrength( $strength );
		} else {
			throw new TooDifficultException();
		}
	}

	/**
	 * @param ClSimplexSolver $solver
	 *
	 * @return void
	 */
	public function addedTo( ClSimplexSolver $solver = null ) {
		$this->_times_added += 1;
	}

	/**
	 * @param ClSimplexSolver $solver
	 *
	 * @return void
	 */
	public function removedFrom( /* ClSimplexSolver $solver = null */ ) {
		$this->_times_added -= 1;
	}

	/**
	 * @param ClStrength $strength
	 *
	 * @return void
	 */
	private function setStrength( ClStrength $strength ) {
		$this->_strength = $strength;
	}

}

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

/**
 * A privately-used class that just wraps a constraint, its positive and negative error variables, and its prior edit constant. It
 * is used as values in _editVarMap, and replaces the parallel vectors of error variables and previous edit constants from the
 * smalltalk version of the code.
 */
class ClEditInfo {

	private /* ClConstraint */
		$cn;
	private /* ClSlackVariable */
		$clvEditPlus;
	private /* ClSlackVariable */
		$clvEditMinus;
	private /* double */
		$prevEditConstant;
	private /* int */
		$i;

	/**
	 * @param ClConstraint    $cn_
	 * @param ClSlackVariable $eplus_
	 * @param ClSlackVariable $eminus_
	 * @param double          $prevEditConstant_
	 * @param int             $i_
	 */
	function __construct( ClConstraint $cn_, ClSlackVariable $eplus_, ClSlackVariable $eminus_, $prevEditConstant_, $i_ ) {
		$this->cn               = $cn_;
		$this->clvEditPlus      = $eplus_;
		$this->clvEditMinus     = $eminus_;
		$this->prevEditConstant = doubleval( $prevEditConstant_ );
		$this->i                = intval( $i_ );
	}

	/**
	 * @return int
	 */
	public function Index() {
		return intval( $this->i );
	}

	/**
	 * @return ClConstraint
	 */
	public function Constraint() {
		return $this->cn;
	}

	/**
	 * @return ClSlackVariable
	 */
	public function ClvEditPlus() {
		return $this->clvEditPlus;
	}

	/**
	 * @return ClSlackVariable
	 */
	public function ClvEditMinus() {
		return $this->clvEditMinus;
	}

	/**
	 * @return float
	 */
	public function PrevEditConstant() {
		return doubleval( $this->prevEditConstant );
	}

	/**
	 * @param double $prevEditConstant_
	 */
	public function SetPrevEditConstant( $prevEditConstant_ ) {
		$this->prevEditConstant = doubleval( prevEditConstant_ );
	}

}

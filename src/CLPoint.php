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

class ClPoint {

	use \DaveRoss\CasswaryConstraintSolver\OverloadedConstructor;

	private /* ClVariable */
		$x;

	private /* ClVariable */
		$y;

	public static function __construct_double_double( $x, $y ) {
		$instance    = new static();
		$instance->x = new ClVariable( $x );
		$instance->y = new ClVariable( $y );

		return $instance;
	}

	public static function __construct_double_double_int( $x, $y, $a ) {
		$instance    = new static();
		$instance->x = new ClVariable( "x" . $a, $x );
		$instance->y = new ClVariable( "y" . $a, $y );

		return $instance;
	}

	public static function __construct_object_object( ClVariable $clv_x, ClVariable $clv_y ) {
		$instance    = new static();
		$instance->x = $clv_x;
		$instance->y = $clv_y;

		return $instance;
	}

	/**
	 * @return ClVariable
	 */
	public function getX() {
		return $this->x;
	}

	/**
	 * @return ClVariable
	 */
	public function getY() {
		return $this->y;
	}

	/**
	 * use only before adding into the solver
	 * @return void
	 */
	public function setXY( $x, $y ) {

		if ( $x instanceof CLVariable ) {
			$this->x = $x;
		} else {
			$this->x->setValue( doubleval( $x ) );
		}

		if ( $y instanceof CLVariable ) {
			$this->y = $y;
		} else {
			$this->y->setValue( doubleval( $y ) );
		}
	}

	/**
	 * @return double
	 */
	public function getXValue() {
		return $this->getX()->getValue();
	}

	/**
	 * @return double
	 */
	public function getYValue() {
		return $this->getY()->getValue();
	}


	public function __toString() {
		return "(" . $this->x->__toString() . ", " . $this->y->__toString() . ")";
	}

}

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
 * Timer, adapted from John P. Russo's C++ Timer class.
 */
class Timer {

	protected $timerIsRunning;
	protected $elapsedMs;
	protected $startReading;

	function __construct() {
		$this->timerIsRunning = false; // Start not yet called.
		$this->elapsedMs      = 0; // No time on timer object yet.
	}

	/**
	 * @return void
	 */
	public function Start() {
		// Stopwatch is now running
		$this->timerIsRunning = true;
		// Look at internal clock and remember reading
		$this->startReading = self::currentTimeMillis();
	}

	protected static function currentTimeMillis() {
		return round( microtime( true ) * 1000 );
	}

	/**
	 * @return void
	 */
	public function Stop() {
		$this->timerIsRunning = false; // Stop timer object.
		$this->elapsedMs += self::currentTimeMillis() - $this->startReading;
	}

	/**
	 * Clears a Timer of previous elapsed times, so that a new event
	 * can be timed.
	 *
	 * @return void
	 */
	public function Reset() {
		$this->timerIsRunning = false; // Start not yet called.
		$this->elapsedMs      = 0; // No time on timer object yet.
	}

	/**
	 * The data member, "TimerIsRunning" is used to keep track of
	 * whether a timer is active, i.e. whether an event is being
	 * timed. While we want those using the timer class to know when a
	 * timer is active, we do NOT want them to directly access the
	 * TimerIsRunning variable. We solve this problem, by making
	 * TimerIsRunning private and providing the public "access function"
	 * below.
	 *
	 * @return bool
	 */
	public function IsRunning() {
		return $this->timerIsRunning;
	}

	/**
	 * This function allows a client to determine the amount of time that has
	 * elapsed on a timer object. Note that there are two possibilities:
	 *
	 * 1) A timer object has been started and stopped. We can detect this
	 * case, because the variable "TimerIsRunning" is false.
	 *
	 * 2) A timer object is "running", i.e. is still in the process of timing
	 * an event. It is not expected that this case will occur as frequently
	 * as case 1).
	 *
	 * In either case, this function converts ticks to seconds. Note that
	 * since the function TicksPerSecond() returns a value of type double,
	 * an implicit type conversion takes place before doing the division
	 * required in either case.
	 *
	 * @return double
	 */
	public function ElapsedTime() {

		if ( ! $this->timerIsRunning ) {
			// Normal case
			return (double) $this->elapsedMs / 1000;
		} else {
			return (double) ( $this->elapsedMs + self::currentTimeMillis() - $this->startReading ) / 1000;
		}


	}
}
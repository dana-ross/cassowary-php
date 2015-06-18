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

class ClException extends \RuntimeException {

	function __construct( $message = null ) {
		parent::__construct( self::message_or_default( $message ) );
	}

	public static function message_or_default( $message = null ) {
		return ! empty( $message ) ? $message : "An error has occurred in CL";
	}

}

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

class ClSlackVariable extends ClAbstractVariable {

	use \DaveRoss\CasswaryConstraintSolver\OverloadedConstructor;
	use \DaveRoss\CasswaryConstraintSolver\CastTarget;

	public static function __construct_string($name) {
		return self::__cast_to_self( parent::__construct_string( $name ) );
	}

    public static function __construct_default() {
	}

    public ClSlackVariable(long number, String prefix) {
	super(number, prefix);
}

    @Override
    public String toString() {
        return "[" + name() + ":slack]";
    }

    @Override
    public boolean isExternal() {
        return false;
    }

    @Override
    public boolean isPivotable() {
        return true;
    }

    @Override
    public boolean isRestricted() {
        return true;
    }

}

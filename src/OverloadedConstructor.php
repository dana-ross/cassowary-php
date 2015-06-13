<?php

namespace DaveRoss\CasswaryConstraintSolver;

trait OverloadedConstructor {

	function __construct() {

		$trace = debug_backtrace();
		if ( ! isset( $trace[1]['class'] ) || __CLASS__ !== $trace[1]['class'] ) {
			throw new \RuntimeException( 'Overloaded constructor. Please use the __new() method to instantiate.' );
		}

	}

	public static function __new() {

		if ( 0 === func_num_args() ) {
			return call_user_func( array( __CLASS__, '__construct_default' ) );
		} else if ( method_exists( __CLASS__, self::_constructor_name( func_get_args() ) ) ) {
			return call_user_func_array( array(
				__CLASS__,
				self::_constructor_name( func_get_args() )
			), func_get_args() );
		} else {
			throw new \RuntimeException( 'No applicable constructor for ' . self::_constructor_name( func_get_args() ) . ' found in ' . __CLASS__ );
		}
	}

	public static function _constructor_name( $args ) {
		/**
		 * 'gettype' returns:
		 *
		 *  - "boolean"
		 *  - "integer"
		 *  - "double" (for historical reasons "double" is returned in case of a float, and not simply "float")
		 *  - "string"
		 *  - "array"
		 *  - "object"
		 *  - "resource"
		 *  - "NULL"
		 *  - "unknown type"
		 */
		return '__construct_' . implode( '_', array_map( 'strtolower', array_map( 'gettype', $args ) ) );
	}

}
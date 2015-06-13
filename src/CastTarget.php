<?php

namespace DaveRoss\CasswaryConstraintSolver;

trait CastTarget {

	public static function __cast_to_self( $sourceObject ) {

		if ( ! is_object( $sourceObject ) ) {
			throw new \BadMethodCallException( '$souceObject must be an object' );
		}

		$destination = new self();

		$sourceReflection      = new \ReflectionObject( $sourceObject );
		$destinationReflection = new \ReflectionObject( $destination );
		$sourceProperties      = new $sourceReflection->getProperties(\ReflectionProperty::IS_PUBLIC | \ReflectionProperty::IS_PRIVATE);

		foreach ( $sourceProperties as $sourceProperty ) {

			$sourceProperty->setAccessible( true );
			$name  = $sourceProperty->getName();
			$value = $sourceObject->getValue( $sourceObject );
			if ( $destinationReflection->hasProperty( $name ) ) {
				$propDest = $destinationReflection->getProperty( $name );
				$propDest->setAccessible( true );
				$propDest->setValue( $destination, $value );
			} else {
				$destination->$name = $value;
			}

		}

		return $destination;

	}

}
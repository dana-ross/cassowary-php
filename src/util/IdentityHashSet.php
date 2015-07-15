<?php

namespace DaveRoss\CassowaryConstraintSolver;

/**
 * Class IdentityHashSet
 * @package DaveRoss\CassowaryConstraintSolver
 * In Java, a Set is like a Map except it can only contain unique values
 */
class IdentityHashSet {

	private $map; /* IdentityHashMap */

	public function __construct() {
		$this->map = new IdentityHashMap();
	}

	/**
     * Add an object
	 * @param object $element
	 * @return boolean true if added, false if the element already exists
	 */
	public function add( $element ) {
		if ( $this->map->containsKey( $element ) ) {
			return false;
		} else {
			$this->map->put( $element, null );

			return true;
		}
	}

	/**
     * Add all elements from an array
	 * @param array $elements
	 *
	 * @return boolean
	 */
	public function addAll( array $elements ) {
		$anyChanges = false;
		foreach ( $elements as $element ) {
			if ( ! $this->map->containsKey( $element ) ) {
				$anyChanges = true;
				$this->map->put( $element, null );
			}
		}

		return $anyChanges;
	}

	/**
     * Remove all elements
	 * @return void
	 */
	public function clear() {
		$this->map->clear();
	}

	/**
     * Check if an element has already been added
	 * @param \stdClass $element
	 *
	 * @return boolean
	 */
	public function contains( $element ) {
		return $this->map->containsKey( $element );
	}

	/**
     * Check if all elements in an array have already been added
	 * @return boolean
	 */
	public function containsAll( array $elements ) {
		foreach ( $elements as $element ) {
			if ( ! $this->map->containsKey( $element ) ) {
				return false;
			}
		}

		return true;
	}

	/**
     * Check if this Set is empty
	 * @return bool
	 */
	public function isEmpty() {
		return $this->map->isEmpty();
	}

	/**
     * Return an array of all elements in the Set
	 * @return array
	 */
	public function iterator() {
		return $this->map->keySet_iterator();
	}

	/**
     * Remove an element from the Set
	 * @param object $element
	 *
	 * @return boolean
	 */
	public function remove( $element ) {
		if ( $this->map->containsKey( $element ) ) {
			$this->map->remove( $element );

			return true;
		} else {
			return false;
		}
	}

	/**
     * Remove all elements in an array from the Set
	 * @param array $elements
	 *
	 * @return bool
	 */
	public function removeAll( array $elements ) {
		foreach ( $elements as $element ) {
			$this->map->remove( $element );
		}

		return true;
	}

	/**
     * Replace the current Set with a new one. Elements in the current Set AND the array passed
     * will still be in the new Set.
	 * @param array $elements
	 *
	 * @return bool
	 */
	public function retainAll( array $elements ) {
		$newMap = new IdentityHashMap();

		foreach ( $elements as $element ) {
			if ( $this->map->containsKey( $element ) ) {
				$newMap->put( $element, null );
			}
		}

		$anyChanges = $newMap->size() != $this->map->size();

		$this->map = $newMap;

		return $anyChanges;
	}

	/**
     * Get the number of items in this Set
	 * @return mixed
	 */
	public function size() {
		return $this->map->size();
	}

	public function toArray() {
		throw new UnsupportedOperationException( "Unsupported operation on IdentityHashSet." );
	}

//	public <T> T[] toArray(T[] dummy) {
//		throw new UnsupportedOperationException("Unsupported operation on IdentityHashSet.");
//	}

    /**
     * Return a string representation of the Set
     * Implements the __toString magic method
     * @return string
     */
	public function __toString() {
		$buf = "{";

		$i = $this->map->keySet_iterator();
		$buf .= implode( ', ', $i->toArray() );

		$buf .= "}";

		return $buf;
	}

}
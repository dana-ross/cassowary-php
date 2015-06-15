<?php

namespace DaveRoss\CasswaryConstraintSolver;

/**
 * Class IdentityHashMap
 * The Java implementation of Cassowary relies on java.util.IdentityHashMap, an odd
 * implementation of the Map interface that deviates from the spec in that it considers
 * two keys equal iff $a === $b, instead of comparing their values with the .equals() method.
 * SPL's SplObjectStorage may be a good match for this instead of relying on a custom implementation.
 */
class IdentityHashMap extends SplObjectStorage {

	/**
	 * @param \stdClass $key
	 *
	 * @return bool
	 */
	public function containsKey( \stdClass $key ) {
		return $this->offsetExists( $key );
	}

	/**
	 * @param \stdClass $key
	 * @param  mixed    $object
	 */
	public function put( \stdClass $key, $object ) {
		$this->attach( $key, $object );
	}

	/**
	 * @return void
	 */
	public function clear() {
		foreach ( $this as $key ) {
			$this->detach( $key );
		}
	}

	/**
	 * @return bool
	 */
	public function isEmpty() {
		return ( 0 === $this->count() );
	}

	/**
	 * @return array|SplFixedArray
	 */
	public function keySet_iterator() {
		$keys = array();
		foreach ( $this as $key => $value ) {
			$keys[] = $key;
		}

		return \SplFixedArray::fromArray( $keys );
	}

	public function entrySet_iterator() {
		$entries = array();
		foreach ( $this as $key => $value ) {
			$entries[] = $value;
		}

		return \SplFixedArray::fromArray( $entries );
	}

	/**
	 * @param \stdClass $key
	 */
	public function remove( \stdClass $key ) {
		$this->detach( $key );
	}

	/**
	 * @return mixed
	 */
	public function size() {
		return $this->count();
	}
}
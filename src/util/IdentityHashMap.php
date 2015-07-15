<?php

namespace DaveRoss\CassowaryConstraintSolver;

/**
 * Class IdentityHashMap
 * The Java implementation of Cassowary relies on java.util.IdentityHashMap, an odd
 * implementation of the Map interface that deviates from the spec in that it considers
 * two keys equal iff $a === $b, instead of comparing their values with the .equals() method.
 * SPL's SplObjectStorage may be a good match for this instead of relying on a custom implementation.
 */
class IdentityHashMap extends \SplObjectStorage {

	/**
     * Check if a particular key has been added to this IdentityHashMap
	 * @param object $key
	 *
	 * @return bool
	 */
	public function containsKey( $key ) {
		return $this->offsetExists( $key );
	}

	/**
     * Add a key/value pair to the IdentityHashMap
	 * @param object $key
	 * @param  mixed    $object
	 */
	public function put( $key, $object ) {
		$this->attach( $key, $object );
	}

	/**
     * Remove all entries in this IdentityHashMap without invalidating & replacinh
     * its internal data structures
	 * @return void
	 */
	public function clear() {
		foreach ( $this as $key ) {
			$this->detach( $key );
		}
	}

	/**
     * Check if this IdentityHashMap is empty
	 * @return bool
	 */
	public function isEmpty() {
		return ( 0 === $this->count() );
	}

	/**
     * Return an array of all keys in this IdentityHashMap
	 * @return \SplFixedArray
	 */
	public function keySet_iterator() {
		$keys = array();
		foreach ( $this as $key ) {
			$keys[] = $key;
		}

		return \SplFixedArray::fromArray( $keys );
	}

    /**
     * Return an array of all values in this IdentityHashMap
     * @return \SplFixedArray
     */
	public function entrySet_iterator() {
		$entries = array();
		foreach ( $this as $key ) {
			$entries[] = $this[ $key ];
		}

		return \SplFixedArray::fromArray( $entries );
	}

	/**
     * Remove a key from the IdentityHashMap and its associated value
	 * @param object $key
	 */
	public function remove( $key ) {
		$this->detach( $key );
	}

	/**
     * Returns a count of how many entries there are in this IdentityHashMap
	 * @return integer
	 */
	public function size() {
		return $this->count();
	}

	/**
	 * Get the value associated with a key
	 * java.util.IdentityHashMap has this method built-in
	 *
	 * @param object $key
	 *
	 * @return mixed|null
	 */
	public function get( $key ) {
		return $this->containsKey( $key ) ? $this[ $key ] : null;
	}

}
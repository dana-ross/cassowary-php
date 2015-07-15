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
	 *
	 * @param object $key
	 *
	 * @return bool
	 */
	public function containsKey( $key ) {
		return $this->offsetExists( $key );
	}

	/**
	 * Add a key/value pair to the IdentityHashMap
	 *
	 * @param object $key
	 * @param  mixed $object
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
	 *
	 * @param object $key
	 *
	 * @return mixed the previous value associated with key, or null if there was no mapping for key. (A null return can also indicate that the map previously associated null with key.)
	 */
	public function remove( $key ) {
		$old_value = $this[ $key ];
		$this->detach( $key );

		return $old_value;
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

	/**
	 * @return string
	 */
	public function __toString() {
		// Returns a string representation of this map. The string representation consists of a list of key-value
		//mappings in the order returned by the map's entrySet view's iterator, enclosed in braces ("{}"). Adjacent
		//mappings are separated by the characters ", " (comma and space). Each key-value mapping is rendered as the
		//key followed by an equals sign ("=") followed by the associated value. Keys and values are converted to
		// strings as by String.valueOf(Object).
		$output = '{';
		$keys   = $this->keySet_iterator();
		foreach ( $keys as $key_index => $key ) {
			if ( 0 < $key_index ) {
				$output .= ', ';
			}
			$output .= $key . '=' . $this[ $key ];
		}
		$output .= '}';

		return $output;
	}

}
<?php

namespace DaveRoss\CasswaryConstraintSolver;

class UnsupportedOperationException extends \Exception {};

class IdentityHashSet {

		private /* IdentityHashMap */ $map;

		function __construct() {
			$this->map = new IdentityHashMap();
		}

		/**
		 * @return boolean
		 */
		public function add(stdClass $element) {
			if ($this->map->containsKey($element)) {
				return false;
			} else {
				$this->map->put($element, null);
				return true;
			}
		}

		/**
		 * @param array $elements
		 * @return boolean
		 */
		public function addAll(array $elements) {
			$anyChanges = false;
	        foreach ($elements as $element) {
		        if (!$this->map->containsKey($element)) {
			        $anyChanges = true;
			        $this->map->put($element, null);
		        }
	        }
	        return $anyChanges;
        }

    /**
     * @return void
     */
    public function clear() {
		$this->map->clear();
    }

    /**
     * @param \stdClass $element
     * @return boolean
     */
	public function contains( \stdClass $element) {
			return $this->map->containsKey($element);
	}

	/**
	 * @return boolean
	 */
    public function containsAll(array $elements) {
		foreach ($elements as $element) {
			if (!$this->map->containsKey($element)) {
				return false;
			}
		}
		return true;
	}

	/**
	 * @return bool
	 */
	public function isEmpty() {
		return $this->map->isEmpty();
	}

	/**
	 * @return array
	 */
	public function iterator() {
		return $this->map->keySet_iterator();
	}

	/**
	 * @param \stdClass $element
	 *
	 * @return boolean
	 */
	public function remove( \stdClass $element ) {
		if ( $this->map->containsKey( $element ) ) {
			$this->map->remove( $element );

			return true;
		} else {
			return false;
		}
	}

	/**
	 * @param array $elements
	 *
	 * @return bool
	 */
	public function removeAll(array $elements) {
		foreach($elements as $element) {
            $this->map->remove($element);
		}
        return true;
    }

	/**
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

		$anyChanges = $newMap->size() != $map->size();

		$this->map = $newMap;

		return $anyChanges;
	}

	/**
	 * @return mixed
	 */
	public function size() {
		return $this->map->size();
	}

	public function toArray() {
		throw new UnsupportedOperationException("Unsupported operation on IdentityHashSet.");
	}

//	public <T> T[] toArray(T[] dummy) {
//		throw new UnsupportedOperationException("Unsupported operation on IdentityHashSet.");
//	}


	public function __toString() {
				$buf = "{";

				Iterator<Entry<E, Object>> i = map.entrySet().iterator();
				boolean hasNext = i.hasNext();
				while (hasNext) {
				Entry<E, Object> e = i.next();
				E key = e.getKey();
				buf.append(key);
				hasNext = i.hasNext();
				if (hasNext)
				buf.append(", ");
				}

				buf.append("}");
				return $buf;
	}

}
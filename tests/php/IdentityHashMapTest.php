<?php

class IdentityHashMapTest extends PHPUnit_Framework_TestCase {

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\IdentityHashMap::containsKey
	 */
	public function test_containsKey() {
		$hash_map         = new \DaveRoss\CassowaryConstraintSolver\IdentityHashMap();
		$key              = new \DaveRoss\CassowaryConstraintSolver\ClDouble( 1.0 );
		$hash_map[ $key ] = 2.0;
		$this->assertInternalType( 'boolean', $hash_map->containsKey( $key ) );
		$this->assertEquals( true, $hash_map->containsKey( $key ) );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\IdentityHashMap::put
	 */
	public function test_put() {
		$hash_map = new \DaveRoss\CassowaryConstraintSolver\IdentityHashMap();
		$key      = new \DaveRoss\CassowaryConstraintSolver\ClDouble( 1.0 );
		$hash_map->put( $key, 2.0 );
		$this->assertInternalType( 'boolean', $hash_map->containsKey( $key ) );
		$this->assertEquals( 2.0, $hash_map[ $key ] );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\IdentityHashMap::clear
	 */
	public function test_clear() {
		$hash_map = new \DaveRoss\CassowaryConstraintSolver\IdentityHashMap();
		$key      = new \DaveRoss\CassowaryConstraintSolver\ClDouble( 1.0 );
		$hash_map->put( $key, 2.0 );
		$hash_map->clear();
		$this->assertInternalType( 'boolean', $hash_map->containsKey( $key ) );
		$this->assertEquals( false, $hash_map->containsKey( $key ) );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\IdentityHashMap::isEmpty
	 */
	public function test_isEmpty() {
		$hash_map = new \DaveRoss\CassowaryConstraintSolver\IdentityHashMap();
		$this->assertInternalType( 'boolean', $hash_map->isEmpty() );
		$this->assertEquals( true, $hash_map->isEmpty() );
		$key = new \DaveRoss\CassowaryConstraintSolver\ClDouble( 1.0 );
		$hash_map->put( $key, 2.0 );
		$this->assertInternalType( 'boolean', $hash_map->isEmpty() );
		$this->assertEquals( false, $hash_map->isEmpty() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\IdentityHashMap::keySet_iterator
	 */
	public function test_keySet_iterator() {
		$hash_map = new \DaveRoss\CassowaryConstraintSolver\IdentityHashMap();
		$key      = new \DaveRoss\CassowaryConstraintSolver\ClDouble( 1.0 );
		$hash_map->put( $key, 2.0 );
		$this->assertInstanceOf( 'SplFixedArray', $hash_map->keySet_iterator() );
		$this->assertEquals( SplFixedArray::fromArray( array( new \DaveRoss\CassowaryConstraintSolver\ClDouble( 1.0 ) ) ), $hash_map->keySet_iterator() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\IdentityHashMap::entrySet_iterator
	 */
	public function test_entrySet_iterator() {
		$hash_map = new \DaveRoss\CassowaryConstraintSolver\IdentityHashMap();
		$key      = new \DaveRoss\CassowaryConstraintSolver\ClDouble( 1.0 );
		$hash_map->put( $key, 2.0 );
		$this->assertInstanceOf( 'SplFixedArray', $hash_map->entrySet_iterator() );
		$this->assertEquals( SplFixedArray::fromArray( array( 2.0 ) ), $hash_map->entrySet_iterator() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\IdentityHashMap::remove
	 */
	public function test_remove() {
		$hash_map = new \DaveRoss\CassowaryConstraintSolver\IdentityHashMap();
		$key      = new \DaveRoss\CassowaryConstraintSolver\ClDouble( 1.0 );
		$hash_map->put( $key, 2.0 );
		$this->assertInternalType( 'boolean', $hash_map->containsKey( $key ) );
		$this->assertEquals( true, $hash_map->containsKey( $key ) );
		$hash_map->remove( $key );
		$this->assertInternalType( 'boolean', $hash_map->containsKey( $key ) );
		$this->assertEquals( false, $hash_map->containsKey( $key ) );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\IdentityHashMap::size
	 */
	public function test_size() {
		$hash_map = new \DaveRoss\CassowaryConstraintSolver\IdentityHashMap();
		$key      = new \DaveRoss\CassowaryConstraintSolver\ClDouble( 1.0 );
		$this->assertInternalType( 'integer', $hash_map->size() );
		$this->assertEquals( 0, $hash_map->size() );
		$hash_map->put( $key, 2.0 );
		$this->assertInternalType( 'integer', $hash_map->size() );
		$this->assertEquals( 1, $hash_map->size() );
	}

}

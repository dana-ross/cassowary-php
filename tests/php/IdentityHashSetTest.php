<?php

class IdentityHashSetTest extends PHPUnit_Framework_TestCase {

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\IdentityHashSet::__construct
	 */
	public function test_construct() {
		$set = new \DaveRoss\CassowaryConstraintSolver\IdentityHashSet();
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\IdentityHashSet::add
	 */
	public function test_add() {
		$set      = new \DaveRoss\CassowaryConstraintSolver\IdentityHashSet();
		$double_1 = new \DaveRoss\CassowaryConstraintSolver\ClDouble( 1.0 );
		$double_2 = new \DaveRoss\CassowaryConstraintSolver\ClDouble( 2.0 );

		$add_result = $set->add( $double_1 );
		$this->assertInternalType( 'boolean', $add_result );
		$this->assertEquals( true, $add_result );

		$add_result2 = $set->add( $double_2 );
		$this->assertInternalType( 'boolean', $add_result2 );
		$this->assertEquals( true, $add_result2 );

		$add_result3 = $set->add( $double_1 );
		$this->assertInternalType( 'boolean', $add_result3 );
		$this->assertEquals( false, $add_result3 );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\IdentityHashSet::addAll
	 */
	public function test_addAll() {
		$set      = new \DaveRoss\CassowaryConstraintSolver\IdentityHashSet();
		$double_1 = new \DaveRoss\CassowaryConstraintSolver\ClDouble( 1.0 );
		$double_2 = new \DaveRoss\CassowaryConstraintSolver\ClDouble( 2.0 );

		$add_result = $set->addAll( array( $double_1, $double_2 ) );
		$this->assertInternalType( 'boolean', $add_result );
		$this->assertEquals( true, $add_result );

		$add_result2 = $set->addAll( array( $double_1 ) );
		$this->assertInternalType( 'boolean', $add_result2 );
		$this->assertEquals( false, $add_result2 );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\IdentityHashSet::clear
	 */
	public function test_clear() {
		$set = new \DaveRoss\CassowaryConstraintSolver\IdentityHashSet();
		$set->add( new \DaveRoss\CassowaryConstraintSolver\ClDouble( 1.0 ) );
		$this->assertInternalType( 'integer', $set->size() );
		$this->assertEquals( 1, $set->size() );
		$set->clear();
		$this->assertEquals( 0, $set->size() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\IdentityHashSet::contains
	 */
	public function test_contains() {
		$set      = new \DaveRoss\CassowaryConstraintSolver\IdentityHashSet();
		$double_1 = new \DaveRoss\CassowaryConstraintSolver\ClDouble( 1.0 );
		$double_2 = new \DaveRoss\CassowaryConstraintSolver\ClDouble( 2.0 );
		$set->add( $double_1 );
		$this->assertInternalType( 'boolean', $set->contains( $double_1 ) );
		$this->assertEquals( true, $set->contains( $double_1 ) );
		$this->assertEquals( false, $set->contains( $double_2 ) );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\IdentityHashSet::containsAll
	 */
	public function test_containsAll() {
		$set      = new \DaveRoss\CassowaryConstraintSolver\IdentityHashSet();
		$double_1 = new \DaveRoss\CassowaryConstraintSolver\ClDouble( 1.0 );
		$double_2 = new \DaveRoss\CassowaryConstraintSolver\ClDouble( 2.0 );
		$double_3 = new \DaveRoss\CassowaryConstraintSolver\ClDouble( 3.0 );
		$set->add( $double_1 );
		$set->add( $double_2 );
		$this->assertInternalType( 'boolean', $set->containsAll( array( $double_1, $double_2 ) ) );
		$this->assertEquals( true, $set->containsAll( array( $double_1, $double_2 ) ) );
		$this->assertEquals( false, $set->containsAll( array( $double_1, $double_3 ) ) );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\IdentityHashSet::isEmpty
	 */
	public function test_isEmpty() {
		$set = new \DaveRoss\CassowaryConstraintSolver\IdentityHashSet();
		$this->assertInternalType( 'boolean', $set->isEmpty() );
		$this->assertEquals( true, $set->isEmpty() );
		$set->add( new \DaveRoss\CassowaryConstraintSolver\ClDouble( 1.0 ) );
		$this->assertEquals( false, $set->isEmpty() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\IdentityHashSet::iterator
	 */
	public function test_iterator() {
		$set      = new \DaveRoss\CassowaryConstraintSolver\IdentityHashSet();
		$double_1 = new \DaveRoss\CassowaryConstraintSolver\ClDouble( 1.0 );
		$set->add( $double_1 );
		$this->assertInstanceOf( 'SplFixedArray', $set->iterator() );
		$this->assertEquals( SplFixedArray::fromArray( array( $double_1 ) ), $set->iterator() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\IdentityHashSet::remove
	 */
	public function test_remove() {
		$set      = new \DaveRoss\CassowaryConstraintSolver\IdentityHashSet();
		$double_1 = new \DaveRoss\CassowaryConstraintSolver\ClDouble( 1.0 );
		$double_2 = new \DaveRoss\CassowaryConstraintSolver\ClDouble( 2.0 );
		$set->add( $double_1 );
		$remove_result = $set->remove( $double_1 );
		$this->assertInternalType( 'boolean', $remove_result );
		$this->assertEquals( true, $remove_result );
		$remove_result = $set->remove( $double_2 );
		$this->assertEquals( false, $remove_result );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\IdentityHashSet::removeAll
	 */
	public function test_removeAll() {
		$set      = new \DaveRoss\CassowaryConstraintSolver\IdentityHashSet();
		$double_1 = new \DaveRoss\CassowaryConstraintSolver\ClDouble( 1.0 );
		$double_2 = new \DaveRoss\CassowaryConstraintSolver\ClDouble( 2.0 );
		$set->add( $double_1 );
		$set->add( $double_2 );
		$this->assertEquals( 2, $set->size() );
		$set->removeAll( array( $double_1 ) );
		$this->assertEquals( 1, $set->size() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\IdentityHashSet::retainAll
	 */
	public function test_retainAll() {
		$set      = new \DaveRoss\CassowaryConstraintSolver\IdentityHashSet();
		$double_1 = new \DaveRoss\CassowaryConstraintSolver\ClDouble( 1.0 );
		$double_2 = new \DaveRoss\CassowaryConstraintSolver\ClDouble( 2.0 );
		$set->add( $double_1 );
		$set->add( $double_2 );
		$this->assertEquals( 2, $set->size() );
		$set->retainAll( array( $double_1 ) );
		$this->assertEquals( 1, $set->size() );
		$this->assertEquals( true, $set->contains( $double_1 ) );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\IdentityHashSet::size
	 */
	public function test_size() {
		$set = new \DaveRoss\CassowaryConstraintSolver\IdentityHashSet();
		$this->assertInternalType( 'integer', $set->size() );
		$this->assertEquals( 0, $set->size() );
		$set->add( new \DaveRoss\CassowaryConstraintSolver\ClDouble( 1.0 ) );
		$this->assertEquals( 1, $set->size() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\IdentityHashSet::toArray
	 */
	public function test_toArray() {
		$set = new \DaveRoss\CassowaryConstraintSolver\IdentityHashSet();
		$this->setExpectedException( 'DaveRoss\CassowaryConstraintSolver\UnsupportedOperationException' );
		$set->toArray();
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\IdentityHashSet::__toString
	 */
	public function test_toString() {
		$set = new \DaveRoss\CassowaryConstraintSolver\IdentityHashSet();

		$set->add( new \DaveRoss\CassowaryConstraintSolver\ClDouble( 1.0 ) );
		$set->add( new \DaveRoss\CassowaryConstraintSolver\ClDouble( 2.0 ) );

		$this->assertInternalType( 'string', $set->__toString() );
		$this->assertEquals( '{1.000000, 2.000000}', $set->__toString() );
	}
}
<?php

class ClSymbolicWeightTest extends PHPUnit_Framework_TestCase {

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight::__construct_integer
	 */
	public function test_construct_integer() {
		$weight = new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 5 );
		$this->assertEquals( 5, $weight->cLevels() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight::__construct_double_double_double
	 */
	public function test_construct_double_double_double() {
		$weight = new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 1.0, 2.0, 3.0 );
		$this->assertEquals( 3, $weight->cLevels() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight::__construct_array
	 */
	public function test_construct_array() {
		$weight = new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( array( 1.0, 2.0, 3.0 ) );
		$this->assertEquals( 3, $weight->cLevels() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight::__clone
	 */
	public function test_clone() {
		$weight  = new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 1.0, 2.0, 3.0 );
		$weight2 = clone( $weight );
		$this->assertEquals( 3, $weight2->cLevels() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight::times
	 */
	public function test_times() {
		$weight = new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 1.0, 2.0, 3.0 );
		$this->assertInstanceOf( '\DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight', $weight->times( 2.0 ) );
		$this->assertEquals( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 2.0, 4.0, 6.0 ), $weight->times( 2.0 ) );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight::divideBy
	 */
	public function test_divideBy() {
		$weight = new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 2.0, 4.0, 6.0 );
		$this->assertInstanceOf( '\DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight', $weight->divideBy( 2.0 ) );
		$this->assertEquals( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 1.0, 2.0, 3.0 ), $weight->divideBy( 2.0 ) );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight::add
	 */
	public function test_add() {
		$weight = new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 1.0, 2.0, 3.0 );
		$this->assertInstanceOf( '\DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight', $weight->add( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 3.0, 2.0, 1.0 ) ) );
		$this->assertEquals( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 4.0, 4.0, 4.0 ), $weight->add( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 3.0, 2.0, 1.0 ) ) );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight::subtract
	 */
	public function test_subtract() {
		$weight = new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 10.0, 9.0, 8.0 );
		$this->assertInstanceOf( '\DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight', $weight->subtract( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 3.0, 2.0, 1.0 ) ) );
		$this->assertEquals( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 7.0, 7.0, 7.0 ), $weight->subtract( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 3.0, 2.0, 1.0 ) ) );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight::lessThan
	 */
	public function test_LessThan() {
		$weight = new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 10.0, 9.0, 8.0 );

		// Greater than
		$this->assertInternalType( 'boolean', $weight->lessThan( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 3.0, 2.0, 1.0 ) ) );
		$this->assertEquals( false, $weight->lessThan( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 3.0, 2.0, 1.0 ) ) );

		// Less than
		$this->assertInternalType( 'boolean', $weight->lessThan( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 15.0, 16.0, 17.0 ) ) );
		$this->assertEquals( true, $weight->lessThan( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 15.0, 16.0, 17.0 ) ) );

		// Identical values
		$this->assertInternalType( 'boolean', $weight->lessThan( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 10.0, 9.0, 8.0 ) ) );
		$this->assertEquals( false, $weight->lessThan( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 10.0, 9.0, 8.0 ) ) );

		// Greater than (only one value different)
		$this->assertInternalType( 'boolean', $weight->lessThan( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 10.0, 8.0, 8.0 ) ) );
		$this->assertEquals( false, $weight->lessThan( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 10.0, 8.0, 8.0 ) ) );

		// Less than (only one value different)
		$this->assertInternalType( 'boolean', $weight->lessThan( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 10.0, 10.0, 8.0 ) ) );
		$this->assertEquals( true, $weight->lessThan( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 10.0, 10.0, 8.0 ) ) );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight::lessThanOrEqual
	 */
	public function test_lessThanOrEqual() {
		$weight = new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 10.0, 9.0, 8.0 );

		// Greater than
		$this->assertInternalType( 'boolean', $weight->lessThanOrEqual( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 3.0, 2.0, 1.0 ) ) );
		$this->assertEquals( false, $weight->lessThanOrEqual( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 3.0, 2.0, 1.0 ) ) );

		// Less than
		$this->assertInternalType( 'boolean', $weight->lessThanOrEqual( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 15.0, 16.0, 17.0 ) ) );
		$this->assertEquals( true, $weight->lessThanOrEqual( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 15.0, 16.0, 17.0 ) ) );

		// Identical values
		$this->assertInternalType( 'boolean', $weight->lessThanOrEqual( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 10.0, 9.0, 8.0 ) ) );
		$this->assertEquals( true, $weight->lessThanOrEqual( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 10.0, 9.0, 8.0 ) ) );

		// Greater than (only one value different)
		$this->assertInternalType( 'boolean', $weight->lessThanOrEqual( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 10.0, 8.0, 8.0 ) ) );
		$this->assertEquals( false, $weight->lessThanOrEqual( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 10.0, 8.0, 8.0 ) ) );

		// Less than (only one value different)
		$this->assertInternalType( 'boolean', $weight->lessThanOrEqual( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 10.0, 10.0, 8.0 ) ) );
		$this->assertEquals( true, $weight->lessThanOrEqual( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 10.0, 10.0, 8.0 ) ) );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight::equal
	 */
	public function test_equal() {
		$weight = new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 10.0, 9.0, 8.0 );

		$this->assertInternalType( 'boolean', $weight->equal( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 10.0, 9.0, 8.0 ) ) );
		$this->assertEquals( true, $weight->equal( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 10.0, 9.0, 8.0 ) ) );

		$this->assertInternalType( 'boolean', $weight->equal( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 11.0, 9.0, 8.0 ) ) );
		$this->assertEquals( false, $weight->equal( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 11.0, 9.0, 8.0 ) ) );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight::greaterThan
	 */
	public function test_greaterThan() {
		$weight = new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 10.0, 9.0, 8.0 );

		// Greater than
		$this->assertInternalType( 'boolean', $weight->greaterThan( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 3.0, 2.0, 1.0 ) ) );
		$this->assertEquals( true, $weight->greaterThan( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 3.0, 2.0, 1.0 ) ) );

		// Less than
		$this->assertInternalType( 'boolean', $weight->greaterThan( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 15.0, 16.0, 17.0 ) ) );
		$this->assertEquals( false, $weight->greaterThan( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 15.0, 16.0, 17.0 ) ) );

		// Identical values
		$this->assertInternalType( 'boolean', $weight->greaterThan( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 10.0, 9.0, 8.0 ) ) );
		$this->assertEquals( false, $weight->greaterThan( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 10.0, 9.0, 8.0 ) ) );

		// Greater than (only one value different)
		$this->assertInternalType( 'boolean', $weight->greaterThan( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 10.0, 8.0, 8.0 ) ) );
		$this->assertEquals( true, $weight->greaterThan( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 10.0, 8.0, 8.0 ) ) );

		// Less than (only one value different)
		$this->assertInternalType( 'boolean', $weight->greaterThan( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 10.0, 10.0, 8.0 ) ) );
		$this->assertEquals( false, $weight->greaterThan( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 10.0, 10.0, 8.0 ) ) );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight::greaterThanOrEqual
	 */
	public function test_greaterThanOrEqual() {
		$weight = new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 10.0, 9.0, 8.0 );

		// Greater than
		$this->assertInternalType( 'boolean', $weight->greaterThanOrEqual( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 3.0, 2.0, 1.0 ) ) );
		$this->assertEquals( true, $weight->greaterThanOrEqual( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 3.0, 2.0, 1.0 ) ) );

		// Less than
		$this->assertInternalType( 'boolean', $weight->greaterThanOrEqual( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 15.0, 16.0, 17.0 ) ) );
		$this->assertEquals( false, $weight->greaterThanOrEqual( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 15.0, 16.0, 17.0 ) ) );

		// Identical values
		$this->assertInternalType( 'boolean', $weight->greaterThanOrEqual( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 10.0, 9.0, 8.0 ) ) );
		$this->assertEquals( true, $weight->greaterThanOrEqual( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 10.0, 9.0, 8.0 ) ) );

		// Greater than (only one value different)
		$this->assertInternalType( 'boolean', $weight->greaterThanOrEqual( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 10.0, 8.0, 8.0 ) ) );
		$this->assertEquals( true, $weight->greaterThanOrEqual( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 10.0, 8.0, 8.0 ) ) );

		// Less than (only one value different)
		$this->assertInternalType( 'boolean', $weight->greaterThanOrEqual( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 10.0, 10.0, 8.0 ) ) );
		$this->assertEquals( false, $weight->greaterThanOrEqual( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 10.0, 10.0, 8.0 ) ) );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight::isNegative
	 */
	public function test_isNegative() {
		$weight = new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 10.0, 9.0, 8.0 );

		$this->assertInternalType( 'boolean', $weight->isNegative() );
		$this->assertEquals( false, $weight->isNegative() );

		$negative_weight = new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( -10.0, -9.0, -8.0 );

		$this->assertInternalType( 'boolean', $negative_weight->isNegative() );
		$this->assertEquals( true, $negative_weight->isNegative() );

		$mixed_weight = new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( -0.1, 1.0, 1.0 );

		$this->assertInternalType( 'boolean', $mixed_weight->isNegative() );
		$this->assertEquals( true, $mixed_weight->isNegative() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight::asDouble
	 */
	public function test_asDouble() {
		$weight = new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 10.0, 9.0, 8.0 );
		$this->assertInternalType('double', $weight->asDouble());
		$this->assertEquals(10009008.0, $weight->asDouble());
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight::__toString
	 */
	public function test_toString() {
		$weight = new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 10.0, 9.0, 8.0 );
		$this->assertInternalType('string', $weight->__toString());
		$this->assertEquals('[10,9,8]', $weight->__toString());

		$weight2 = new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 10.1, 9.1, 8.1 );
		$this->assertInternalType('string', $weight2->__toString());
		$this->assertEquals('[10.1,9.1,8.1]', $weight2->__toString());

	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight::cLevels
	 */
	public function test_clevels() {
		$weight = new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 5 );
		$this->assertInternalType( 'integer', $weight->cLevels() );
		$this->assertEquals( 5, $weight->cLevels() );
	}

}

<?php

class ClLinearExpressionTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClLinearExpression::__construct_clabstractvariable_double_double
	 */
	public function test_construct_clabstractvariable_double_double() {
		$example = new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression(
			new \DaveRoss\CassowaryConstraintSolver\ClDummyVariable(),
			1.0,
			2.0
		);
		$this->assertInternalType( 'double', $example->constant() );
		$this->assertEquals( 2.0, $example->constant() );
		foreach ( $example->terms() as $index => $key ) {
			// Should only be one item in this array
			$this->assertEquals( 0, $index );
			$this->assertInternalType( 'double', $example->terms()[ $key ]->doubleValue() );
			$this->assertEquals( 1.0, $example->terms()[ $key ]->doubleValue() );
		}
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClLinearExpression::__construct_double
	 */
	public function test_construct_double() {
		$example = new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression( 1.0 );
		$this->assertInternalType( 'double', $example->constant() );
		$this->assertEquals( 1.0, $example->constant() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClLinearExpression::__construct_default
	 */
	public function test_construct_default() {
		$example = new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression();
		$this->assertInternalType( 'double', $example->constant() );
		$this->assertEquals( 0.0, $example->constant() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClLinearExpression::__construct_clabstractvariable_double
	 */
	public function test_construct_clabstractvariable_double() {
		$example = new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression(
			new \DaveRoss\CassowaryConstraintSolver\ClDummyVariable(),
			1.0
		);
		$this->assertInternalType( 'double', $example->constant() );
		$this->assertEquals( 0.0, $example->constant() );
		foreach ( $example->terms() as $index => $key ) {
			// Should only be one item in this array
			$this->assertEquals( 0, $index );
			$this->assertInternalType( 'double', $example->terms()[ $key ]->doubleValue() );
			$this->assertEquals( 1.0, $example->terms()[ $key ]->doubleValue() );
		}
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClLinearExpression::__construct_clabstractvariable
	 */
	public function __construct_clabstractvariable() {
		$example = new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression(
			new \DaveRoss\CassowaryConstraintSolver\ClDummyVariable()
		);
		$this->assertInternalType( 'double', $example->constant() );
		$this->assertEquals( 0.0, $example->constant() );
		foreach ( $example->terms() as $index => $key ) {
			// Should only be one item in this array
			$this->assertEquals( 0, $index );
			$this->assertInternalType( 'double', $example->terms()[ $key ]->doubleValue() );
			$this->assertEquals( 0.0, $example->terms()[ $key ]->doubleValue() );
		}
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClLinearExpression::__construct_clabstractvariable
	 */
	public function test_construct_clabstractvariable() {
		$example = new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression(
			new \DaveRoss\CassowaryConstraintSolver\ClDummyVariable()
		);
		$this->assertInternalType( 'double', $example->constant() );
		$this->assertEquals( 0.0, $example->constant() );
		foreach ( $example->terms() as $index => $key ) {
			// Should only be one item in this array
			$this->assertEquals( 0, $index );
			$this->assertInternalType( 'double', $example->terms()[ $key ]->doubleValue() );
			$this->assertEquals( 1.0, $example->terms()[ $key ]->doubleValue() );
		}
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClLinearExpression::__construct_double_identityhashmap
	 */
	public function test_construct_double_identityhashmap() {

		// IdentityHashMap contains a double
		$map = new \DaveRoss\CassowaryConstraintSolver\IdentityHashMap();
		$map->put(
			new \DaveRoss\CassowaryConstraintSolver\ClDouble(1.0),
			2
		);
		$example = new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression(
			5.0,
			$map
		);
		$this->assertInternalType( 'double', $example->constant() );
		$this->assertEquals( 5.0, $example->constant() );
		foreach ( $example->terms() as $index => $key ) {
			// Should only be one item in this array
			$this->assertEquals( 0, $index );
			$this->assertInternalType( 'double', $example->terms()[ $key ]->doubleValue() );
			$this->assertEquals( 2.0, $example->terms()[ $key ]->doubleValue() );
		}

		// IdentityHashMap contains a ClDouble
		$map2 = new \DaveRoss\CassowaryConstraintSolver\IdentityHashMap();
		$map2->put(
			new \DaveRoss\CassowaryConstraintSolver\ClDouble(1.0),
			new \DaveRoss\CassowaryConstraintSolver\ClDouble(2.0)
		);
		$example2 = new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression(
			5.0,
			$map2
		);
		$this->assertInternalType( 'double', $example2->constant() );
		$this->assertEquals( 5.0, $example2->constant() );
		foreach ( $example2->terms() as $index => $key ) {
			// Should only be one item in this array
			$this->assertEquals( 0, $index );
			$this->assertInternalType( 'double', $example2->terms()[ $key ]->doubleValue() );
			$this->assertEquals( 2.0, $example2->terms()[ $key ]->doubleValue() );
		}
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClLinearExpression::multiplyMe
	 */
	public function test_multiplyMe() {
		$example = new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression(
			new \DaveRoss\CassowaryConstraintSolver\ClDummyVariable(),
			1.0,
			2.0
		);
		$this->assertInstanceOf( '\DaveRoss\CassowaryConstraintSolver\ClLinearExpression', $example->multiplyMe( 2.0 ) );
		foreach ( $example->terms() as $index => $key ) {
			// Should only be one item in this array
			$this->assertEquals( 0, $index );
			$this->assertInternalType( 'double', $example->terms()[ $key ]->doubleValue() );
			// 2.0 = value * 2.0
			$this->assertEquals( 2.0, $example->terms()[ $key ]->doubleValue() );
		}
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClLinearExpression::__clone
	 */
	public function test_clone() {
		$key     = new \DaveRoss\CassowaryConstraintSolver\ClDummyVariable();
		$example = new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression(
			$key,
			1.0,
			2.0
		);
		$clone   = clone( $example );
		$this->assertInstanceOf( '\DaveRoss\CassowaryConstraintSolver\ClLinearExpression', $clone );
		$this->assertEquals( 1, count( $example->terms()->size() ) );
		$this->assertInternalType( 'double', $example->terms()[ $key ]->doubleValue() );
		$this->assertEquals( 1.0, $example->terms()[ $key ]->doubleValue() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClLinearExpression::times_double
	 */
	public function test_times_double() {
		$key                = new \DaveRoss\CassowaryConstraintSolver\ClDummyVariable();
		$example            = new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression(
			$key,
			1.0,
			2.0
		);
		$multiplied_example = $example->times( 2.0 );
		$this->assertInstanceOf( '\DaveRoss\CassowaryConstraintSolver\ClLinearExpression', $multiplied_example );

		// $multiplied_example should be a clone
		$this->assertNotSame( $example, $multiplied_example );
		$this->assertNotEquals( $example, $multiplied_example );

		$this->assertEquals( 1, count( $example->terms()->size() ) );
		$this->assertInternalType( 'double', $example->terms()[ $key ]->doubleValue() );
		$this->assertEquals( 2.0, $example->terms()[ $key ]->doubleValue() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClLinearExpression::times_cllinearexpression
	 */
	public function test_times_cllinearexpression() {

		// $this is constant
		$key = new \DaveRoss\CassowaryConstraintSolver\ClDummyVariable();
		$example_constant            = new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression(5.0);
		$result1 = $example_constant->times(
			new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression(
				$key,
				1.0,
				2.0
			)
		);
		$this->assertInstanceOf( '\DaveRoss\CassowaryConstraintSolver\ClLinearExpression', $result1 );
		$this->assertEquals( 1, count( $result1->terms()->size() ) );
		$this->assertInternalType( 'double', $result1->terms()[ $key ]->doubleValue() );
		$this->assertEquals( 5.0, $result1->terms()[ $key ]->doubleValue() );

		// neither is constant
		$this->setExpectedException('DaveRoss\CassowaryConstraintSolver\NonlinearExpressionException');
		$example_not_constant = $example_constant->times(
			new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression(
				$key,
				1.0,
				2.0
			)
		);
		$result2 = $example_not_constant->times(
			new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression(
				$key,
				1.0,
				2.0
			)
		);

		// $expr is constant
		$result3 = $example_not_constant->times($example_constant);
		$this->assertInstanceOf( '\DaveRoss\CassowaryConstraintSolver\ClLinearExpression', $result3 );
		$this->assertEquals( 1, count( $result3->terms()->size() ) );
		$this->assertInternalType( 'double', $result3->terms()[ $key ]->doubleValue() );
		$this->assertEquals( 5.0, $result3->terms()[ $key ]->doubleValue() );

	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClLinearExpression::plus_cllinearexpression
	 */
	public function test_plus_cllinearexpression() {
		$example = new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression( 5.0 );
		$result  = $example->plus( new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression( 6.0 ) );
		$this->assertInternalType( 'double', $result->constant() );
		$this->assertEquals( 11.0, $result->constant() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClLinearExpression::plus_clvariable
	 */
	public function test_plus_clvariable() {
		$key = new \DaveRoss\CassowaryConstraintSolver\ClVariable( 'example', 99.0 );

		$example = new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression(
			$key,
			5.0,
			1.0
		);

		$result = $example->plus( $key ); // Why did they call this "plus"? All it does is increment!
		$terms  = $result->terms();
		foreach ( $terms as $index => $key ) {
			$this->assertEquals( 0, $index );
			$this->assertInternalType( 'double', $terms[ $key ]->doubleValue() );
			$this->assertEquals( 6.0, $terms[ $key ]->doubleValue() );
		}
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClLinearExpression::minus_cllinearexpression
	 */
	public function test_minus_cllinearexpression() {
		$example = new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression( 7.0 );
		$result  = $example->minus_cllinearexpression( new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression( 5.0 ) );
		$this->assertInternalType( 'double', $result->constant() );
		$this->assertEquals( 2.0, $result->constant() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClLinearExpression::minus_clvariable
	 */
	public function test_minus_clvariable() {
		$key = new \DaveRoss\CassowaryConstraintSolver\ClVariable( 'example', 99.0 );

		$example = new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression(
			$key,
			5.0,
			1.0
		);

		$result = $example->minus_clvariable( $key );
		$terms  = $result->terms();
		foreach ( $terms as $index => $key ) {
			$this->assertEquals( 0, $index );
			$this->assertInternalType( 'double', $terms[ $key ]->doubleValue() );
			$this->assertEquals( 4.0, $terms[ $key ]->doubleValue() );
		}
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClLinearExpression::divide_double
	 */
	public function test_divide_double() {

		$example_constant1 = new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression( 6.0 );
		$result = $example_constant1->divide_double(2.0);
		$this->assertInternalType( 'double', $result->constant() );
		$this->assertEquals( 3.0, $result->constant() );

		// Divide by zero
		$example_constant2 = new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression( 6.0 );
		$this->setExpectedException( '\DaveRoss\CassowaryConstraintSolver\NonlinearExpressionException' );
		$example_constant2->divide_double( 0 );

	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClLinearExpression::divide_cllinearexpression
	 */
	public function test_divide_cllinearexpression() {

		$example_constant1 = new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression( 6.0 );
		$result            = $example_constant1->divide_cllinearexpression( new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression( 2.0 ) );
		$this->assertInternalType( 'double', $result->constant() );
		$this->assertEquals( 3.0, $result->constant() );

		// Divide by a variable value
		$example_constant2 = new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression( new \DaveRoss\CassowaryConstraintSolver\ClVariable( 1.0 ) );
		$this->setExpectedException( '\DaveRoss\CassowaryConstraintSolver\NonlinearExpressionException' );
		$example_constant2->divide_cllinearexpression( $example_constant2 );

	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClLinearExpression::divFrom
	 */
	public function test_divFrom() {

		$example_constant1 = new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression( 3.0 );
		$result            = $example_constant1->divFrom( new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression( 6.0 ) );
		$this->assertInternalType( 'double', $result->constant() );
		$this->assertEquals( 2.0, $result->constant() );

		// Here's zero. Divide something by it.
		$example_constant2 = new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression(
			new \DaveRoss\CassowaryConstraintSolver\ClVariable( 1.0 ),
			2.0
		);
		$example_zero      = new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression( 0.0 );
		$this->setExpectedException( '\DaveRoss\CassowaryConstraintSolver\NonlinearExpressionException' );
		$example_constant2->divFrom( $example_zero );

	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClLinearExpression::subtractFrom
	 */
	public function test_subtractFrom() {

		$example_constant1 = new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression( 5.0 );
		$example_constant2 = new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression( 2.0 );
		$result = $example_constant2->subtractFrom($example_constant1);
		$this->assertInternalType( 'double', $result->constant() );
		$this->assertEquals( 3.0, $result->constant() );

	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClLinearExpression::incrementConstant
	 */
	public function test_incrementConstant() {
		$example_constant = new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression( 5.0 );
		$example_constant->incrementConstant( 2.0 );
		$this->assertInternalType( 'boolean', $example_constant->isConstant() );
		$this->assertEquals( 7.0, $example_constant->constant() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClLinearExpression::isConstant
	 */
	public function test_isConstant() {

		$example_constant            = new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression(5.0);
		$this->assertInternalType('boolean', $example_constant->isConstant());
		$this->assertEquals(true, $example_constant->isConstant());

		$example_not_constant            = new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression(
			new \DaveRoss\CassowaryConstraintSolver\ClDummyVariable(),
			1.0,
			2.0
		);
		$this->assertInternalType('boolean', $example_not_constant->isConstant());
		$this->assertEquals(false, $example_not_constant->isConstant());

	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClLinearExpression::FEquals
	 */
	public function test_FEquals() {

		$key      = new \DaveRoss\CassowaryConstraintSolver\ClDummyVariable();
		$example1 = new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression(
			$key,
			1.0,
			2.0
		);

		$this->assertInternalType( 'boolean', \DaveRoss\CassowaryConstraintSolver\ClLinearExpression::FEquals(
			$example1,
			$example1
		) );

		$this->assertEquals( true, \DaveRoss\CassowaryConstraintSolver\ClLinearExpression::FEquals(
			$example1,
			$example1
		) );

		$example2 = new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression(
			$key,
			1.0,
			2.0
		);

		// Same values, but different $_terms objects

		$this->assertInternalType( 'boolean', \DaveRoss\CassowaryConstraintSolver\ClLinearExpression::FEquals(
			$example1,
			$example2
		) );

		$this->assertEquals( false, \DaveRoss\CassowaryConstraintSolver\ClLinearExpression::FEquals(
			$example1,
			$example2
		) );

	}
}

<?php

class ClLinearEquationTest extends PHPUnit_Framework_TestCase {

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClLinearEquation::__construct_clstrength_double
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClConstraint::strength
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClConstraint::weight
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClLinearConstraint::expression
	 */
	public function test_construct_cllinearexpression_clstrength_double() {

		$expression = new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression( 5.0 );
		$constraint = new \DaveRoss\CassowaryConstraintSolver\ClLinearEquation(
			$expression,
			\DaveRoss\CassowaryConstraintSolver\ClStrength::$medium,
			5.0
		);
		$this->assertInstanceOf( '\DaveRoss\CassowaryConstraintSolver\ClStrength', $constraint->strength() );
		$this->assertSame( \DaveRoss\CassowaryConstraintSolver\ClStrength::$medium, $constraint->strength() );
		$this->assertInternalType( 'double', $constraint->weight() );
		$this->assertEquals( 5.0, $constraint->weight() );
		$this->assertInstanceOf( '\DaveRoss\CassowaryConstraintSolver\ClLinearExpression', $constraint->expression() );
		$this->assertSame( $expression, $constraint->expression() );

	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClLinearEquation::__construct_cllinearexpression_clstrength
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClConstraint::strength
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClConstraint::weight
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClLinearConstraint::expression
	 */
	public function test_construct_cllinearexpression_clstrength() {

		$expression = new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression( 5.0 );
		$constraint = new \DaveRoss\CassowaryConstraintSolver\ClLinearEquation( $expression, \DaveRoss\CassowaryConstraintSolver\ClStrength::$medium );
		$this->assertInstanceOf( '\DaveRoss\CassowaryConstraintSolver\ClStrength', $constraint->strength() );
		$this->assertSame( \DaveRoss\CassowaryConstraintSolver\ClStrength::$medium, $constraint->strength() );
		$this->assertInternalType( 'double', $constraint->weight() );
		$this->assertEquals( 1.0, $constraint->weight() );
		$this->assertInstanceOf( '\DaveRoss\CassowaryConstraintSolver\ClLinearExpression', $constraint->expression() );
		$this->assertSame( $expression, $constraint->expression() );

	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClLinearEquation::__construct_cllinearexpression
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClLinearConstraint::expression
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClConstraint::strength
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClConstraint::weight
	 */
	public function test_construct_cllinearexpression() {

		$expression = new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression( 5.0 );
		$constraint = new \DaveRoss\CassowaryConstraintSolver\ClLinearEquation( $expression );
		$this->assertInstanceOf( '\DaveRoss\CassowaryConstraintSolver\ClStrength', $constraint->strength() );
		$this->assertSame( \DaveRoss\CassowaryConstraintSolver\ClStrength::$required, $constraint->strength() );
		$this->assertInternalType( 'double', $constraint->weight() );
		$this->assertEquals( 1.0, $constraint->weight() );
		$this->assertInstanceOf( '\DaveRoss\CassowaryConstraintSolver\ClLinearExpression', $constraint->expression() );
		$this->assertSame( $expression, $constraint->expression() );

	}

	public function test_construct_clabstractvariable_cllinearexpression_clstrength_double() {

		$constraint = new \DaveRoss\CassowaryConstraintSolver\ClLinearEquation(
			new \DaveRoss\CassowaryConstraintSolver\ClObjectiveVariable( 'example' ),
			new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression( 3.0 ),
			\DaveRoss\CassowaryConstraintSolver\ClStrength::$medium,
			4.0
		);

		$terms = $constraint->expression()->terms();
		$this->assertEquals( 1, $terms->keySet_iterator()->getSize() );
		$variable = $terms->keySet_iterator()->current();
		$this->assertEquals( 'example', $variable->name() );
		$value = $terms[ $variable ];
		$this->assertEquals( - 1.0, $value->doubleValue() );

	}

	public function test_construct_clabstractvariable_cllinearexpression() {

		$constraint = new \DaveRoss\CassowaryConstraintSolver\ClLinearEquation(
			new \DaveRoss\CassowaryConstraintSolver\ClObjectiveVariable( 'example' ),
			new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression( 3.0 )
		);

		$terms = $constraint->expression()->terms();
		$this->assertEquals( 1, $terms->keySet_iterator()->getSize() );
		$variable = $terms->keySet_iterator()->current();
		$this->assertEquals( 'example', $variable->name() );
		$value = $terms[ $variable ];
		$this->assertEquals( - 1.0, $value->doubleValue() );

	}

	public function test_construct_clabstractvariable_double_clstrength_double() {

		$constraint = new \DaveRoss\CassowaryConstraintSolver\ClLinearEquation(
			new \DaveRoss\CassowaryConstraintSolver\ClObjectiveVariable( 'example' ),
			2.0,
			\DaveRoss\CassowaryConstraintSolver\ClStrength::$weak,
			4.0
		);

		$this->assertEquals(4.0, $constraint->weight());
		$this->assertSame(\DaveRoss\CassowaryConstraintSolver\ClStrength::$weak, $constraint->strength());

		$expression = $constraint->expression();
		$this->assertEquals(2.0, $expression->constant());

		$terms = $constraint->expression()->terms();
		$this->assertEquals( 1, $terms->keySet_iterator()->getSize() );
		$variable = $terms->keySet_iterator()->current();
		$this->assertEquals( 'example', $variable->name() );
		$value = $terms[ $variable ];
		$this->assertEquals( - 1.0, $value->doubleValue() );

	}

	public function test_construct_clabstractvariable_double_clstrength() {

		$constraint = new \DaveRoss\CassowaryConstraintSolver\ClLinearEquation(
			new \DaveRoss\CassowaryConstraintSolver\ClObjectiveVariable( 'example' ),
			2.0,
			\DaveRoss\CassowaryConstraintSolver\ClStrength::$weak
		);

		$this->assertEquals(1.0, $constraint->weight());
		$this->assertSame(\DaveRoss\CassowaryConstraintSolver\ClStrength::$weak, $constraint->strength());

		$expression = $constraint->expression();
		$this->assertEquals(2.0, $expression->constant());

		$terms = $constraint->expression()->terms();
		$this->assertEquals( 1, $terms->keySet_iterator()->getSize() );
		$variable = $terms->keySet_iterator()->current();
		$this->assertEquals( 'example', $variable->name() );
		$value = $terms[ $variable ];
		$this->assertEquals( - 1.0, $value->doubleValue() );

	}

	public function test_construct_clabstractvariable_double() {

		$constraint = new \DaveRoss\CassowaryConstraintSolver\ClLinearEquation(
			new \DaveRoss\CassowaryConstraintSolver\ClObjectiveVariable( 'example' ),
			2.0
		);

		$this->assertEquals(1.0, $constraint->weight());
		$this->assertSame(\DaveRoss\CassowaryConstraintSolver\ClStrength::$required, $constraint->strength());

		$expression = $constraint->expression();
		$this->assertEquals(2.0, $expression->constant());

		$terms = $constraint->expression()->terms();
		$this->assertEquals( 1, $terms->keySet_iterator()->getSize() );
		$variable = $terms->keySet_iterator()->current();
		$this->assertEquals( 'example', $variable->name() );
		$value = $terms[ $variable ];
		$this->assertEquals( - 1.0, $value->doubleValue() );

	}

	public function test_construct_cllinearexpression_clabstractvariable_clstrength_double() {

		$constraint = new \DaveRoss\CassowaryConstraintSolver\ClLinearEquation(
			new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression( 5.0 ),
			new \DaveRoss\CassowaryConstraintSolver\ClObjectiveVariable( 'example' ),
			\DaveRoss\CassowaryConstraintSolver\ClStrength::$medium,
			2.0
		);

		$this->assertEquals(2.0, $constraint->weight());
		$this->assertSame(\DaveRoss\CassowaryConstraintSolver\ClStrength::$medium, $constraint->strength());

		$expression = $constraint->expression();
		$this->assertEquals(5.0, $expression->constant());

		$terms = $constraint->expression()->terms();
		$this->assertEquals( 1, $terms->keySet_iterator()->getSize() );
		$variable = $terms->keySet_iterator()->current();
		$this->assertEquals( 'example', $variable->name() );
		$value = $terms[ $variable ];
		$this->assertEquals( - 1.0, $value->doubleValue() );

	}

	public function test_construct_cllinearexpression_clabstractvariable_clstrength() {

		$constraint = new \DaveRoss\CassowaryConstraintSolver\ClLinearEquation(
			new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression( 5.0 ),
			new \DaveRoss\CassowaryConstraintSolver\ClObjectiveVariable( 'example' ),
			\DaveRoss\CassowaryConstraintSolver\ClStrength::$medium
		);

		$this->assertEquals(1.0, $constraint->weight());
		$this->assertSame(\DaveRoss\CassowaryConstraintSolver\ClStrength::$medium, $constraint->strength());

		$expression = $constraint->expression();
		$this->assertEquals(5.0, $expression->constant());

		$terms = $constraint->expression()->terms();
		$this->assertEquals( 1, $terms->keySet_iterator()->getSize() );
		$variable = $terms->keySet_iterator()->current();
		$this->assertEquals( 'example', $variable->name() );
		$value = $terms[ $variable ];
		$this->assertEquals( - 1.0, $value->doubleValue() );

	}

	public function test_construct_cllinearexpression_clabstractvariable() {

		$constraint = new \DaveRoss\CassowaryConstraintSolver\ClLinearEquation(
			new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression( 5.0 ),
			new \DaveRoss\CassowaryConstraintSolver\ClObjectiveVariable( 'example' )
		);

		$this->assertEquals(1.0, $constraint->weight());
		$this->assertSame(\DaveRoss\CassowaryConstraintSolver\ClStrength::$required, $constraint->strength());

		$expression = $constraint->expression();
		$this->assertEquals(5.0, $expression->constant());

		$terms = $constraint->expression()->terms();
		$this->assertEquals( 1, $terms->keySet_iterator()->getSize() );
		$variable = $terms->keySet_iterator()->current();
		$this->assertEquals( 'example', $variable->name() );
		$value = $terms[ $variable ];
		$this->assertEquals( - 1.0, $value->doubleValue() );

	}


	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClLinearEquation::__toString
	 */
	public function test_toString() {

		$expression = new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression( 5.0 );
		$constraint = new \DaveRoss\CassowaryConstraintSolver\ClLinearEquation( $expression );
		$this->assertInternalType( 'string', $constraint->__toString() );
		$this->assertEquals( '<Required> {1} (5 = 0 )', $constraint->__toString() );

	}


}
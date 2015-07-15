<?php

class ClLinearConstraintTest extends PHPUnit_Framework_TestCase {

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClLinearConstraint::__construct_cllinearexpression_clstrength_double
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClConstraint::strength
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClConstraint::weight
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClLinearConstraint::expression
	 */
	public function test_construct_cllinearexpression_clstrength_double() {

		$expression = new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression( 5.0 );
		$constraint = new \DaveRoss\CassowaryConstraintSolver\ClLinearConstraint( $expression, \DaveRoss\CassowaryConstraintSolver\ClStrength::$medium, 5.0 );
		$this->assertInstanceOf( '\DaveRoss\CassowaryConstraintSolver\ClStrength', $constraint->strength() );
		$this->assertSame( \DaveRoss\CassowaryConstraintSolver\ClStrength::$medium, $constraint->strength() );
		$this->assertInternalType( 'double', $constraint->weight() );
		$this->assertEquals( 5.0, $constraint->weight() );
		$this->assertInstanceOf( '\DaveRoss\CassowaryConstraintSolver\ClLinearExpression', $constraint->expression() );
		$this->assertSame( $expression, $constraint->expression() );


	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClLinearConstraint::__construct_cllinearexpression_clstrength
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClConstraint::strength
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClConstraint::weight
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClLinearConstraint::expression
	 */
	public function test_construct_cllinearexpression_clstrength() {

		$expression = new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression( 5.0 );
		$constraint = new \DaveRoss\CassowaryConstraintSolver\ClLinearConstraint( $expression, \DaveRoss\CassowaryConstraintSolver\ClStrength::$medium );
		$this->assertInstanceOf( '\DaveRoss\CassowaryConstraintSolver\ClStrength', $constraint->strength() );
		$this->assertSame( \DaveRoss\CassowaryConstraintSolver\ClStrength::$medium, $constraint->strength() );
		$this->assertInternalType( 'double', $constraint->weight() );
		$this->assertEquals( 1.0, $constraint->weight() );
		$this->assertInstanceOf( '\DaveRoss\CassowaryConstraintSolver\ClLinearExpression', $constraint->expression() );
		$this->assertSame( $expression, $constraint->expression() );


	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClLinearConstraint::__construct_cllinearexpression
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClLinearConstraint::expression
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClConstraint::strength
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClConstraint::weight
	 */
	public function test_construct_cllinearexpression() {

		$expression = new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression( 5.0 );
		$constraint = new \DaveRoss\CassowaryConstraintSolver\ClLinearConstraint( $expression );
		$this->assertInstanceOf( '\DaveRoss\CassowaryConstraintSolver\ClStrength', $constraint->strength() );
		$this->assertSame( \DaveRoss\CassowaryConstraintSolver\ClStrength::$required, $constraint->strength() );
		$this->assertInternalType( 'double', $constraint->weight() );
		$this->assertEquals( 1.0, $constraint->weight() );
		$this->assertInstanceOf( '\DaveRoss\CassowaryConstraintSolver\ClLinearExpression', $constraint->expression() );
		$this->assertSame( $expression, $constraint->expression() );

	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClLinearConstraint::expression
	 */
	public function test_expression() {

		$expression = new \DaveRoss\CassowaryConstraintSolver\ClLinearExpression( 5.0 );
		$constraint = new \DaveRoss\CassowaryConstraintSolver\ClLinearConstraint( $expression );
		$this->assertInstanceOf( '\DaveRoss\CassowaryConstraintSolver\ClLinearExpression', $constraint->expression() );
		$this->assertSame( $expression, $constraint->expression() );

	}
}

<?php

class ClEditOrStayConstraintTest extends PHPUnit_Framework_TestCase {

	public function test_construct_clvariable_clstrength_double() {

		$var        = new \DaveRoss\CassowaryConstraintSolver\ClVariable( 'example', 5.0 );
		$constraint = new ClEditOrStayConstraintImpl( $var, \DaveRoss\CassowaryConstraintSolver\ClStrength::$medium, 2.0 );
		$this->assertSame( $var, $constraint->variable() );
		$keys = $constraint->expression()->terms()->keySet_iterator();
		$key0 = $keys[0];
		$this->assertInternalType( 'double', $key0->getValue() );
		$this->assertEquals( 5.0, $key0->getValue() );
		$this->assertInternalType( 'string', $key0->name() );
		$this->assertEquals( 'example', $key0->name() );
		$this->assertSame( \DaveRoss\CassowaryConstraintSolver\ClStrength::$medium, $constraint->strength() );
		$this->assertInternalType( 'double', $constraint->weight() );
		$this->assertEquals( 2.0, $constraint->weight() );

	}

	public function test_construct_clvariable_clstrength() {

		$var        = new \DaveRoss\CassowaryConstraintSolver\ClVariable( 'example', 5.0 );
		$constraint = new ClEditOrStayConstraintImpl( $var, \DaveRoss\CassowaryConstraintSolver\ClStrength::$medium );
		$this->assertSame( $var, $constraint->variable() );
		$keys = $constraint->expression()->terms()->keySet_iterator();
		$key0 = $keys[0];
		$this->assertInternalType( 'double', $key0->getValue() );
		$this->assertEquals( 5.0, $key0->getValue() );
		$this->assertInternalType( 'string', $key0->name() );
		$this->assertEquals( 'example', $key0->name() );
		$this->assertSame( \DaveRoss\CassowaryConstraintSolver\ClStrength::$medium, $constraint->strength() );

	}

	public function test_construct_clvariable() {

		$var        = new \DaveRoss\CassowaryConstraintSolver\ClVariable( 'example', 5.0 );
		$constraint = new ClEditOrStayConstraintImpl( $var );
		$this->assertSame( $var, $constraint->variable() );
		$keys = $constraint->expression()->terms()->keySet_iterator();
		$key0 = $keys[0];
		$this->assertInternalType( 'double', $key0->getValue() );
		$this->assertEquals( 5.0, $key0->getValue() );
		$this->assertInternalType( 'string', $key0->name() );
		$this->assertEquals( 'example', $key0->name() );
		$this->assertSame( \DaveRoss\CassowaryConstraintSolver\ClStrength::$required, $constraint->strength() );

	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClEditOrStayConstraint::variable
	 */
	public function test_variable() {

		$var        = new \DaveRoss\CassowaryConstraintSolver\ClVariable( 'example', 1.0 );
		$constraint = new ClEditOrStayConstraintImpl( $var );
		$this->assertInstanceOf( '\DaveRoss\CassowaryConstraintSolver\ClVariable', $constraint->variable() );
		$this->assertSame( $var, $constraint->variable() );

	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClEditOrStayConstraint::expression
	 */
	public function test_expression() {

		$var        = new \DaveRoss\CassowaryConstraintSolver\ClVariable( 'example', 1.0 );
		$constraint = new ClEditOrStayConstraintImpl( $var );
		$this->assertInstanceOf( '\DaveRoss\CassowaryConstraintSolver\ClLinearExpression', $constraint->expression() );

	}

}

class ClEditOrStayConstraintImpl extends \DaveRoss\CassowaryConstraintSolver\ClEditOrStayConstraint {

}
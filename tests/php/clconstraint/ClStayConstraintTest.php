<?php

class ClStayConstraintTest extends PHPUnit_Framework_TestCase {

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClStayConstraint::__construct_clvariable_clstrength_double
	 */
	public function test_construct_clvariable_clstrength_double() {

		$var        = new \DaveRoss\CassowaryConstraintSolver\ClVariable( 'example', 5.0 );
		$constraint = new \DaveRoss\CassowaryConstraintSolver\ClStayConstraint( $var, \DaveRoss\CassowaryConstraintSolver\ClStrength::$medium, 2.0 );
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

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClStayConstraint::__construct_clvariable_clstrength
	 */
	public function test_construct_clvariable_clstrength() {

		$var        = new \DaveRoss\CassowaryConstraintSolver\ClVariable( 'example', 5.0 );
		$constraint = new \DaveRoss\CassowaryConstraintSolver\ClStayConstraint( $var, \DaveRoss\CassowaryConstraintSolver\ClStrength::$medium );
		$this->assertSame( $var, $constraint->variable() );
		$keys = $constraint->expression()->terms()->keySet_iterator();
		$key0 = $keys[0];
		$this->assertInternalType( 'double', $key0->getValue() );
		$this->assertEquals( 5.0, $key0->getValue() );
		$this->assertInternalType( 'string', $key0->name() );
		$this->assertEquals( 'example', $key0->name() );
		$this->assertSame( \DaveRoss\CassowaryConstraintSolver\ClStrength::$medium, $constraint->strength() );

	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClStayConstraint::__construct_clvariable
	 */
	public function test_construct_clvariable() {

		$var        = new \DaveRoss\CassowaryConstraintSolver\ClVariable( 'example', 5.0 );
		$constraint = new \DaveRoss\CassowaryConstraintSolver\ClStayConstraint( $var );
		$this->assertSame( $var, $constraint->variable() );
		$keys = $constraint->expression()->terms()->keySet_iterator();
		$key0 = $keys[0];
		$this->assertInternalType( 'double', $key0->getValue() );
		$this->assertEquals( 5.0, $key0->getValue() );
		$this->assertInternalType( 'string', $key0->name() );
		$this->assertEquals( 'example', $key0->name() );
		$this->assertSame( \DaveRoss\CassowaryConstraintSolver\ClStrength::$weak, $constraint->strength() );

	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClStayConstraint::isStayConstraint
	 */
	public function test_isStayConstraint() {

		$constraint = new \DaveRoss\CassowaryConstraintSolver\ClStayConstraint();
		$this->assertInternalType( 'bool', $constraint->isStayConstraint() );
		$this->assertEquals( true, $constraint->isStayConstraint() );

	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClStayConstraint::__toString
	 */
	public function test_toString() {

		$constraint = new DaveRoss\CassowaryConstraintSolver\ClStayConstraint();
		$this->assertInternalType( 'string', $constraint->__toString() );
		$this->assertEquals( 'stay <Required> {1} (', $constraint->__toString() );

	}


}

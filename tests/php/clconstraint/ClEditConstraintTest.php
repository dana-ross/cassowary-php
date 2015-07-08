<?php

class ClEditConstraintTest extends PHPUnit_Framework_TestCase {

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClEditConstraint::__construct_clvariable_clstrength_double
	 */
	public function test_construct_clvariable_clstrength_double() {

		$var        = new \DaveRoss\CassowaryConstraintSolver\ClVariable( 'example', 5.0 );
		$constraint = new \DaveRoss\CassowaryConstraintSolver\ClEditConstraint( $var, \DaveRoss\CassowaryConstraintSolver\ClStrength::$medium, 2.0 );
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
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClEditConstraint::__construct_clvariable_clstrength
	 */
	public function test_construct_clvariable_clstrength() {

		$var        = new \DaveRoss\CassowaryConstraintSolver\ClVariable( 'example', 5.0 );
		$constraint = new \DaveRoss\CassowaryConstraintSolver\ClEditConstraint( $var, \DaveRoss\CassowaryConstraintSolver\ClStrength::$medium );
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
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClEditConstraint::__construct_clvariable
	 */
	public function test_construct_clvariable() {

		$var        = new \DaveRoss\CassowaryConstraintSolver\ClVariable( 'example', 5.0 );
		$constraint = new \DaveRoss\CassowaryConstraintSolver\ClEditConstraint( $var );
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
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClEditConstraint::isEditConstraint
	 */
	public function test_isEditConstraint() {

		$constraint = new DaveRoss\CassowaryConstraintSolver\ClEditConstraint();
		$this->assertInternalType( 'bool', $constraint->isEditConstraint() );
		$this->assertEquals( true, $constraint->isEditConstraint() );

	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClEditConstraint::__toString
	 */
	public function test_toString() {

		$constraint = new DaveRoss\CassowaryConstraintSolver\ClEditConstraint();
		$this->assertInternalType( 'string', $constraint->__toString() );
		$this->assertEquals( 'edit<Required> {1} (', $constraint->__toString() );

	}

}

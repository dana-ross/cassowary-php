<?php

class ClEditConstraintTest extends PHPUnit_Framework_TestCase {

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClEditConstraint::__construct_clstrength_double
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClConstraint::strength
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClConstraint::weight
	 */
	public function test_construct_clstrength_double() {

		$constraint = new DaveRoss\CassowaryConstraintSolver\ClEditConstraint( \DaveRoss\CassowaryConstraintSolver\ClStrength::$medium, 5.0 );
		$this->assertInstanceOf( '\DaveRoss\CassowaryConstraintSolver\ClStrength', $constraint->strength() );
		$this->assertSame( \DaveRoss\CassowaryConstraintSolver\ClStrength::$medium, $constraint->strength() );
		$this->assertInternalType( 'double', $constraint->weight() );
		$this->assertEquals( 5.0, $constraint->weight() );

	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClEditConstraint::__construct_clstrength
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClConstraint::strength
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClConstraint::weight
	 */
	public function test_construct_clstrength() {

		$constraint = new DaveRoss\CassowaryConstraintSolver\ClEditConstraint( \DaveRoss\CassowaryConstraintSolver\ClStrength::$medium );
		$this->assertInstanceOf( '\DaveRoss\CassowaryConstraintSolver\ClStrength', $constraint->strength() );
		$this->assertSame( \DaveRoss\CassowaryConstraintSolver\ClStrength::$medium, $constraint->strength() );
		$this->assertInternalType( 'double', $constraint->weight() );
		$this->assertEquals( 1.0, $constraint->weight() );

	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClEditConstraint::__construct_default
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClConstraint::strength
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClConstraint::weight
	 */
	public function test_construct_default() {

		$constraint = new DaveRoss\CassowaryConstraintSolver\ClEditConstraint();
		$this->assertInstanceOf( '\DaveRoss\CassowaryConstraintSolver\ClStrength', $constraint->strength() );
		$this->assertSame( \DaveRoss\CassowaryConstraintSolver\ClStrength::$required, $constraint->strength() );
		$this->assertInternalType( 'double', $constraint->weight() );
		$this->assertEquals( 1.0, $constraint->weight() );

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

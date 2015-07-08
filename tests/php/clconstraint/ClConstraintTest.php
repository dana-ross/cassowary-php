<?php

class ClConstraintTest extends PHPUnit_Framework_TestCase {

	/**
	 * @covers DaveRoss\CassowaryConstraintSolver\ClConstraint::__construct_clstrength_double
	 * @covers DaveRoss\CassowaryConstraintSolver\ClConstraint::strength
	 * @covers DaveRoss\CassowaryConstraintSolver\ClConstraint::weight
	 */
	public function test_construct_clstrength_double() {

		$constraint = new ClConstraintTestImpl( \DaveRoss\CassowaryConstraintSolver\ClStrength::$medium, 5.0 );
		$this->assertInstanceOf( '\DaveRoss\CassowaryConstraintSolver\ClStrength', $constraint->strength() );
		$this->assertSame( \DaveRoss\CassowaryConstraintSolver\ClStrength::$medium, $constraint->strength() );
		$this->assertInternalType( 'double', $constraint->weight() );
		$this->assertEquals( 5.0, $constraint->weight() );

	}

	/**
	 * @covers DaveRoss\CassowaryConstraintSolver\ClConstraint::__construct_clstrength
	 * @covers DaveRoss\CassowaryConstraintSolver\ClConstraint::strength
	 * @covers DaveRoss\CassowaryConstraintSolver\ClConstraint::weight
	 */
	public function test_construct_clstrength() {

		$constraint = new ClConstraintTestImpl( \DaveRoss\CassowaryConstraintSolver\ClStrength::$medium );
		$this->assertInstanceOf( '\DaveRoss\CassowaryConstraintSolver\ClStrength', $constraint->strength() );
		$this->assertSame( \DaveRoss\CassowaryConstraintSolver\ClStrength::$medium, $constraint->strength() );
		$this->assertInternalType( 'double', $constraint->weight() );
		$this->assertEquals( 1.0, $constraint->weight() );

	}

	/**
	 * @covers DaveRoss\CassowaryConstraintSolver\ClConstraint::__construct_default
	 * @covers DaveRoss\CassowaryConstraintSolver\ClConstraint::strength
	 * @covers DaveRoss\CassowaryConstraintSolver\ClConstraint::weight
	 */
	public function test_construct_default() {

		$constraint = new ClConstraintTestImpl();
		$this->assertInstanceOf( '\DaveRoss\CassowaryConstraintSolver\ClStrength', $constraint->strength() );
		$this->assertSame( \DaveRoss\CassowaryConstraintSolver\ClStrength::$required, $constraint->strength() );
		$this->assertInternalType( 'double', $constraint->weight() );
		$this->assertEquals( 1.0, $constraint->weight() );

	}

	/**
	 * @covers DaveRoss\CassowaryConstraintSolver\ClConstraint::isEditConstraint
	 */
	public function test_isEditConstraint() {

		$constraint = new ClConstraintTestImpl();
		$this->assertInternalType( 'bool', $constraint->isEditConstraint() );
		$this->assertEquals( false, $constraint->isEditConstraint() );

	}

	/**
	 * @covers DaveRoss\CassowaryConstraintSolver\ClConstraint::isInequality
	 */
	public function test_isInequality() {

		$constraint = new ClConstraintTestImpl();
		$this->assertInternalType( 'bool', $constraint->isInequality() );
		$this->assertEquals( false, $constraint->isInequality() );

	}

	/**
	 * @covers DaveRoss\CassowaryConstraintSolver\ClConstraint::isRequired
	 */
	public function test_isRequired() {

		$constraint = new ClConstraintTestImpl();
		$this->assertInternalType( 'bool', $constraint->isRequired() );
		$this->assertEquals( true, $constraint->isRequired() );

		$constraint2 = new ClConstraintTestImpl( \DaveRoss\CassowaryConstraintSolver\ClStrength::$weak );
		$this->assertInternalType( 'bool', $constraint2->isRequired() );
		$this->assertEquals( false, $constraint2->isRequired() );

	}

	/**
	 * @covers DaveRoss\CassowaryConstraintSolver\ClConstraint::isInequality
	 */
	public function test_isStayConstraint() {

		$constraint = new ClConstraintTestImpl();
		$this->assertInternalType( 'bool', $constraint->isStayConstraint() );
		$this->assertEquals( false, $constraint->isStayConstraint() );

	}

	/**
	 * @covers DaveRoss\CassowaryConstraintSolver\ClConstraint::__toString
	 */
	public function test_toString() {

		$constraint = new ClConstraintTestImpl();
		$this->assertInternalType( 'string', $constraint->__toString() );
		$this->assertEquals( '<Required> {1} (abc', $constraint->__toString() );

	}

	/**
	 * @covers DaveRoss\CassowaryConstraintSolver\ClConstraint::setAttachedObject
	 * @covers DaveRoss\CassowaryConstraintSolver\ClConstraint::getAttachedObject
	 */
	public function test_setAttachedObject() {

		$constraint = new ClConstraintTestImpl();
		$obj        = splFixedArray::fromArray( array( 'a', 'b', 'c' ) );
		$constraint->setAttachedObject( $obj );
		$this->assertInstanceOf( 'splFixedArray', $constraint->getAttachedObject() );
		$this->assertSame( $obj, $constraint->getAttachedObject() );

	}

	/**
	 * @covers DaveRoss\CassowaryConstraintSolver\ClConstraint::changeStrength
	 * @covers DaveRoss\CassowaryConstraintSolver\ClConstraint::addedTo
	 */
	public function test_changeStrength() {

		// Simple
		$constraint = new ClConstraintTestImpl();
		$this->assertSame( \DaveRoss\CassowaryConstraintSolver\ClStrength::$required, $constraint->strength() );
		$constraint->changeStrength( \DaveRoss\CassowaryConstraintSolver\ClStrength::$weak );
		$this->assertSame( \DaveRoss\CassowaryConstraintSolver\ClStrength::$weak, $constraint->strength() );

		// Difficult
		$constraint2 = new ClConstraintTestImpl();
		$this->assertSame( \DaveRoss\CassowaryConstraintSolver\ClStrength::$required, $constraint2->strength() );
		$constraint2->addedTo();
		$this->setExpectedException( 'DaveRoss\CassowaryConstraintSolver\TooDifficultException' );
		$constraint2->changeStrength( \DaveRoss\CassowaryConstraintSolver\ClStrength::$weak );

	}

	/**
	 * @covers DaveRoss\CassowaryConstraintSolver\ClConstraint::addedTo
	 * @todo this really tests side-effects of calling addedTo(). ClConstraint needs a getter added to see $_times_added
	 *       after parity with the Java version is confirmed
	 */
	public function test_addedTo() {

		$constraint = new ClConstraintTestImpl();
		$constraint->addedTo();
		$this->setExpectedException( 'DaveRoss\CassowaryConstraintSolver\TooDifficultException' );
		$constraint->changeStrength( \DaveRoss\CassowaryConstraintSolver\ClStrength::$weak );

	}

	/**
	 * @covers DaveRoss\CassowaryConstraintSolver\ClConstraint::removedFrom
	 * @todo this really tests side-effects of calling removedFrom(). ClConstraint needs a getter added to see $_times_added
	 *       after parity with the Java version is confirmed
	 */
	public function test_removedFrom() {

		$constraint = new ClConstraintTestImpl();
		$constraint->removedFrom();
		$this->setExpectedException( 'DaveRoss\CassowaryConstraintSolver\TooDifficultException' );
		$constraint->changeStrength( \DaveRoss\CassowaryConstraintSolver\ClStrength::$weak );

	}


}

/**
 * Class ClConstraintTestImpl
 * Concrete implementation of ClConstraint to test the abstract class in isolation
 */
class ClConstraintTestImpl extends \DaveRoss\CassowaryConstraintSolver\ClConstraint {

	public function expression() {
		return 'abc';
	}

}
<?php

class ClVariableTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClVariable::__construct_default
	 */
	function test_construct_default() {
		$clVariable = new \DaveRoss\CassowaryConstraintSolver\ClVariable();
		$this->assertInternalType( 'double', $clVariable->getValue() );
		$this->assertEquals( 0.0, $clVariable->getValue() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClVariable::__construct_string
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClVariable::__toString
	 */
	function test_name() {
		$clVariable = new \DaveRoss\CassowaryConstraintSolver\ClVariable( 'example' );
		$this->assertEquals( '[example', substr( $clVariable, 0, 8 ) );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClVariable::__construct_double
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClVariable::getValue
	 */
	function test_value() {

		$clVariable = new \DaveRoss\CassowaryConstraintSolver\ClVariable( 5.0 );
		$this->assertInternalType( 'double', $clVariable->getValue() );
		$this->assertEquals( 5.0, $clVariable->getValue() );

	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClVariable::change_value
	 */
	function test_change_value() {

		$clVariable = new \DaveRoss\CassowaryConstraintSolver\ClVariable( 5.0 );
		$clVariable->change_value( 6.0 );
		$this->assertInternalType( 'double', $clVariable->getValue() );
		$this->assertEquals( 6.0, $clVariable->getValue() );

		// Test type coercion
		$clVariable->change_value( 5 );
		$this->assertInternalType( 'double', $clVariable->getValue() );
		$this->assertEquals( 5.0, $clVariable->getValue() );

	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClVariable::set_value
	 */
	function test_set_value() {

		$clVariable = new \DaveRoss\CassowaryConstraintSolver\ClVariable( 5.0 );
		$clVariable->change_value( 6.0 );
		$this->assertInternalType( 'double', $clVariable->getValue() );
		$this->assertEquals( 6.0, $clVariable->getValue() );

	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClVariable::setAttachedObject
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClVariable::getAttachedObject
	 */
	function test_attached_object() {

		$clVariable = new \DaveRoss\CassowaryConstraintSolver\ClVariable( 5.0 );
		$obj = new stdClass();
		$clVariable->setAttachedObject($obj);
		$this->assertInternalType('object', $clVariable->getAttachedObject());
		$this->assertEquals($obj, $clVariable->getAttachedObject());

	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClVariable::isRestricted
	 */
	function test_is_restricted() {
		$clVariable = new \DaveRoss\CassowaryConstraintSolver\ClVariable( 5.0 );
		$this->assertInternalType( 'boolean', $clVariable->isRestricted() );
		$this->assertEquals( false, $clVariable->isRestricted() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClVariable::isPivotable
	 */
	function test_is_pivotable() {
		$clVariable = new \DaveRoss\CassowaryConstraintSolver\ClVariable( 5.0 );
		$this->assertInternalType( 'boolean', $clVariable->isPivotable() );
		$this->assertEquals( false, $clVariable->isPivotable() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClVariable::isExternal
	 */
	function test_is_external() {
		$clVariable = new \DaveRoss\CassowaryConstraintSolver\ClVariable( 5.0 );
		$this->assertInternalType( 'boolean', $clVariable->isExternal() );
		$this->assertEquals( true, $clVariable->isExternal() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClVariable::isDummy
	 */
	function test_is_dummy() {
		$clVariable = new \DaveRoss\CassowaryConstraintSolver\ClVariable( 5.0 );
		$this->assertInternalType( 'boolean', $clVariable->isDummy() );
		$this->assertEquals( false, $clVariable->isDummy() );
	}

}

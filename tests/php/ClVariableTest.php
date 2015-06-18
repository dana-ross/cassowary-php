<?php

class ClVariableTest extends \PHPUnit_Framework_TestCase {

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
		$clVariable->setValue(5);
		$this->assertInternalType( 'double', $clVariable->getValue() );
		$this->assertEquals( 5.0, $clVariable->getValue() );

	}

	function test_attached_object() {

		$clVariable = new \DaveRoss\CassowaryConstraintSolver\ClVariable( 5.0 );
		$obj = new stdClass();
		$clVariable->setAttachedObject($obj);
		$this->assertInternalType('object', $clVariable->getAttachedObject());
		$this->assertEquals($obj, $clVariable->getAttachedObject());

	}
}

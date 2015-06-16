<?php

class CLVariableTest extends \PHPUnit_Framework_TestCase {

	function test_name() {
		$clVariable = new \DaveRoss\CasswaryConstraintSolver\ClVariable( 'example' );
		$this->assertEquals( '[example', substr( $clVariable, 0, 8 ) );
	}

	function test_value() {

		$clVariable = new \DaveRoss\CasswaryConstraintSolver\ClVariable( 5.0 );
		$this->assertInternalType( 'double', $clVariable->getValue() );
		$this->assertEquals( 5.0, $clVariable->getValue() );

	}

	function test_change_value() {

		$clVariable = new \DaveRoss\CasswaryConstraintSolver\ClVariable( 5.0 );
		$clVariable->change_value( 6.0 );
		$this->assertInternalType( 'double', $clVariable->getValue() );
		$this->assertEquals( 6.0, $clVariable->getValue() );

		// Test type coercion
		$clVariable->setValue(5);
		$this->assertInternalType( 'double', $clVariable->getValue() );
		$this->assertEquals( 5.0, $clVariable->getValue() );

	}

	function test_attached_object() {

		$clVariable = new \DaveRoss\CasswaryConstraintSolver\ClVariable( 5.0 );
		$obj = new stdClass();
		$clVariable->setAttachedObject($obj);
		$this->assertInternalType('object', $clVariable->getAttachedObject());
		$this->assertEquals($obj, $clVariable->getAttachedObject());

	}
}

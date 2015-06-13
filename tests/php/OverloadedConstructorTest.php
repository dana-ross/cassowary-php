<?php

class TestOverloadedConstructor extends PHPUnit_Framework_TestCase {

	function test_constructor_name() {

		$this->assertEquals( '__construct_string', TestOverloadedConstructorA::_constructor_name( array( 'test' ) ) );
		$this->assertEquals( '__construct_integer', TestOverloadedConstructorA::_constructor_name( array( 1 ) ) );
		$this->assertEquals( '__construct_double', TestOverloadedConstructorA::_constructor_name( array( 1.0 ) ) );
		$this->assertEquals( '__construct_array', TestOverloadedConstructorA::_constructor_name( array(
			array(
				1,
				2,
				3
			)
		) ) );
		$this->assertEquals( '__construct_object', TestOverloadedConstructorA::_constructor_name( array( new stdClass() ) ) );

		$this->assertEquals( '__construct_string_integer', TestOverloadedConstructorA::_constructor_name( array(
			'test',
			5
		) ) );
		$this->assertEquals( '__construct_string_object', TestOverloadedConstructorA::_constructor_name( array(
			'test',
			new stdClass()
		) ) );

	}

	function test_string_constructor() {
		$instance = new TestOverloadedConstructorA( 'test' );
		$this->assertEquals( 'test', $instance->string );
	}

	function test_integer_constructor() {
		$instance = new TestOverloadedConstructorA( 5 );
		$this->assertEquals( 5, $instance->integer );
	}

	function test_double_constructor() {
		$instance = new TestOverloadedConstructorA( 5.0 );
		$this->assertEquals( 5.0, $instance->double );
	}

	function test_invalid_constructor() {
		$this->setExpectedException( 'RuntimeException' );
		new TestOverloadedConstructorA( array() );
	}

}

/**
 * Class TestOverloadedConstructorA
 * Test rig for TestOverloadedConstructor
 */
class TestOverloadedConstructorA {

	use \DaveRoss\CasswaryConstraintSolver\OverloadedConstructor;

	public $double;
	public $string;
	public $integer;

	public function __construct_string( $string ) {
		$this->string = $string;
	}

	public function __construct_integer( $integer ) {
		$this->integer = $integer;
	}

	public function __construct_double( $double ) {
		$this->double = $double;
	}

}
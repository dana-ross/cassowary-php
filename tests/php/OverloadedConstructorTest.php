<?php

class TestOverloadedMethods extends PHPUnit_Framework_TestCase {

	function test_constructor_name() {

		$this->assertEquals( '__construct_string', TestOverloadedMethodsA::_constructor_name( array( 'test' ) ) );
		$this->assertEquals( '__construct_integer', TestOverloadedMethodsA::_constructor_name( array( 1 ) ) );
		$this->assertEquals( '__construct_double', TestOverloadedMethodsA::_constructor_name( array( 1.0 ) ) );
		$this->assertEquals( '__construct_array', TestOverloadedMethodsA::_constructor_name( array(
			array(
				1,
				2,
				3
			)
		) ) );
		$this->assertEquals( '__construct_object', TestOverloadedMethodsA::_constructor_name( array( new stdClass() ) ) );

		$this->assertEquals( '__construct_string_integer', TestOverloadedMethodsA::_constructor_name( array(
			'test',
			5
		) ) );
		$this->assertEquals( '__construct_string_object', TestOverloadedMethodsA::_constructor_name( array(
			'test',
			new stdClass()
		) ) );

	}

	function test_string_constructor() {
		$instance = new TestOverloadedMethodsA( 'test' );
		$this->assertEquals( 'test', $instance->string );
	}

	function test_integer_constructor() {
		$instance = new TestOverloadedMethodsA( 5 );
		$this->assertEquals( 5, $instance->integer );
	}

	function test_double_constructor() {
		$instance = new TestOverloadedMethodsA( 5.0 );
		$this->assertEquals( 5.0, $instance->double );
	}

	function test_invalid_constructor() {
		$this->setExpectedException( 'RuntimeException' );
		new TestOverloadedMethodsA( array() );
	}

	function test_overriden_impl_fn_name() {
		$this->assertEquals('example_double_integer', TestOverloadedMethodsA::_overriden_impl_fn_name('example', array(5.5, 5)));
		$this->assertEquals('example_testoverloadedmethodsa_integer', TestOverloadedMethodsA::_overriden_impl_fn_name('example', array(new TestOverloadedMethodsA('test'), 5)));
	}

}

/**
 * Class TestOverloadedMethodsA
 * Test rig for TestOverloadedMethods
 */
class TestOverloadedMethodsA {

	use \DaveRoss\CasswaryConstraintSolver\OverloadedMethods;

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
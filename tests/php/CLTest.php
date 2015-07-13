<?php

class CLTest extends PHPUnit_Framework_TestCase {

	/**
	 * @covers DaveRoss\CassowaryConstraintSolver\CL::debugprint
	 */
	public function test_debugprint() {
		ob_start();
		CLTestImpl::debugprint( 'example' );
		$this->assertEquals( 'example' . "\n", ob_get_clean() );
	}

	/**
	 * @covers DaveRoss\CassowaryConstraintSolver\CL::traceprint
	 */
	public function test_traceprint() {
		ob_start();
		CLTestImpl::traceprint( 'example' );
		$this->assertEquals( 'example' . "\n", ob_get_clean() );
	}

	/**
	 * @covers DaveRoss\CassowaryConstraintSolver\CL::fnenterprint
	 */
	public function test_fnenterprint() {
		ob_start();
		CLTestImpl::fnenterprint( 'example' );
		$this->assertEquals( '* example', ob_get_clean() );
	}

	/**
	 * @covers DaveRoss\CassowaryConstraintSolver\CL::fnexitprint
	 */
	public function test_fnexitprint() {
		ob_start();
		CLTestImpl::fnexitprint( 'example' );
		$this->assertEquals( '- example', ob_get_clean() );
	}

	/**
	 * @covers DaveRoss\CassowaryConstraintSolver\CL::approx_double_double
	 */
	public function test_approx_double_double() {

		// $a is 0.0
		$this->assertInternalType( 'boolean', DaveRoss\CassowaryConstraintSolver\CL::approx_double_double( 0.0, 0 ) );
		$this->assertTrue( DaveRoss\CassowaryConstraintSolver\CL::approx_double_double( 0.0, 0 ) );
		$this->assertInternalType( 'boolean', DaveRoss\CassowaryConstraintSolver\CL::approx_double_double( 0.0, 0.0000000001 ) );
		$this->assertTrue( DaveRoss\CassowaryConstraintSolver\CL::approx_double_double( 0.0, 0.0000000001 ) );
		$this->assertInternalType( 'boolean', DaveRoss\CassowaryConstraintSolver\CL::approx_double_double( 0.0, 0.000000001 ) );
		$this->assertTrue( DaveRoss\CassowaryConstraintSolver\CL::approx_double_double( 0.0, 0.000000001 ) );
		$this->assertInternalType( 'boolean', DaveRoss\CassowaryConstraintSolver\CL::approx_double_double( 0.0, 0.00000001 ) );
		$this->assertFalse( DaveRoss\CassowaryConstraintSolver\CL::approx_double_double( 0.0, 0.00000001 ) );

		// $b is 0.0
		$this->assertInternalType( 'boolean', DaveRoss\CassowaryConstraintSolver\CL::approx_double_double( 0, 0.0 ) );
		$this->assertTrue( DaveRoss\CassowaryConstraintSolver\CL::approx_double_double( 0, 0.0 ) );
		$this->assertInternalType( 'boolean', DaveRoss\CassowaryConstraintSolver\CL::approx_double_double( 0.0000000001, 0.0 ) );
		$this->assertTrue( DaveRoss\CassowaryConstraintSolver\CL::approx_double_double( 0.0000000001, 0.0 ) );
		$this->assertInternalType( 'boolean', DaveRoss\CassowaryConstraintSolver\CL::approx_double_double( 0.000000001, 0.0 ) );
		$this->assertTrue( DaveRoss\CassowaryConstraintSolver\CL::approx_double_double( 0.000000001, 0.0 ) );
		$this->assertInternalType( 'boolean', DaveRoss\CassowaryConstraintSolver\CL::approx_double_double( 0.00000001, 0.0 ) );
		$this->assertFalse( DaveRoss\CassowaryConstraintSolver\CL::approx_double_double( 0.00000001, 0.0 ) );

		$this->assertInternalType( 'boolean', DaveRoss\CassowaryConstraintSolver\CL::approx_double_double( 1.0, 1 ) );
		$this->assertTrue( DaveRoss\CassowaryConstraintSolver\CL::approx_double_double( 1, 1 ) );
		$this->assertInternalType( 'boolean', DaveRoss\CassowaryConstraintSolver\CL::approx_double_double( 1.0, 1.0000000001 ) );
		$this->assertTrue( DaveRoss\CassowaryConstraintSolver\CL::approx_double_double( 1.0, 1.0000000001 ) );
		$this->assertInternalType( 'boolean', DaveRoss\CassowaryConstraintSolver\CL::approx_double_double( 1.0, 1.000000001 ) );
		$this->assertTrue( DaveRoss\CassowaryConstraintSolver\CL::approx_double_double( 1.0, 1.000000001 ) );
		$this->assertInternalType( 'boolean', DaveRoss\CassowaryConstraintSolver\CL::approx_double_double( 1.0, 1.00000001 ) );
		$this->assertTrue( DaveRoss\CassowaryConstraintSolver\CL::approx_double_double( 1.0, 1.00000001 ) );
		$this->assertInternalType( 'boolean', DaveRoss\CassowaryConstraintSolver\CL::approx_double_double( 1.0, 1.0000001 ) );
		$this->assertFalse( DaveRoss\CassowaryConstraintSolver\CL::approx_double_double( 1.0, 1.0000001 ) );

	}

	/**
	 * @covers DaveRoss\CassowaryConstraintSolver\CL::approx_clvariable_double
	 */
	public function test_approx_clvariable_double() {

		// $a is 0.0
		$this->assertInternalType( 'boolean', DaveRoss\CassowaryConstraintSolver\CL::approx_clvariable_double( new DaveRoss\CassowaryConstraintSolver\ClVariable( 0.0 ), 0 ) );
		$this->assertTrue( DaveRoss\CassowaryConstraintSolver\CL::approx_clvariable_double( new DaveRoss\CassowaryConstraintSolver\ClVariable( 0.0 ), 0 ) );
		$this->assertInternalType( 'boolean', DaveRoss\CassowaryConstraintSolver\CL::approx_clvariable_double( new DaveRoss\CassowaryConstraintSolver\ClVariable( 0.0 ), 0.0000000001 ) );
		$this->assertTrue( DaveRoss\CassowaryConstraintSolver\CL::approx_clvariable_double( new DaveRoss\CassowaryConstraintSolver\ClVariable( 0.0 ), 0.0000000001 ) );
		$this->assertInternalType( 'boolean', DaveRoss\CassowaryConstraintSolver\CL::approx_clvariable_double( new DaveRoss\CassowaryConstraintSolver\ClVariable( 0.0 ), 0.000000001 ) );
		$this->assertTrue( DaveRoss\CassowaryConstraintSolver\CL::approx_clvariable_double( new DaveRoss\CassowaryConstraintSolver\ClVariable( 0.0 ), 0.000000001 ) );
		$this->assertInternalType( 'boolean', DaveRoss\CassowaryConstraintSolver\CL::approx_clvariable_double( new DaveRoss\CassowaryConstraintSolver\ClVariable( 0.0 ), 0.00000001 ) );
		$this->assertFalse( DaveRoss\CassowaryConstraintSolver\CL::approx_clvariable_double( new DaveRoss\CassowaryConstraintSolver\ClVariable( 0.0 ), 0.00000001 ) );

		// $b is 0.0
		$this->assertInternalType( 'boolean', DaveRoss\CassowaryConstraintSolver\CL::approx_clvariable_double( new DaveRoss\CassowaryConstraintSolver\ClVariable( 0.0 ), 0.0 ) );
		$this->assertTrue( DaveRoss\CassowaryConstraintSolver\CL::approx_clvariable_double( new DaveRoss\CassowaryConstraintSolver\ClVariable( 0.0 ), 0.0 ) );
		$this->assertInternalType( 'boolean', DaveRoss\CassowaryConstraintSolver\CL::approx_clvariable_double( new DaveRoss\CassowaryConstraintSolver\ClVariable( 0.0000000001 ), 0.0 ) );
		$this->assertTrue( DaveRoss\CassowaryConstraintSolver\CL::approx_clvariable_double( new DaveRoss\CassowaryConstraintSolver\ClVariable( 0.0000000001 ), 0.0 ) );
		$this->assertInternalType( 'boolean', DaveRoss\CassowaryConstraintSolver\CL::approx_clvariable_double( new DaveRoss\CassowaryConstraintSolver\ClVariable( 0.000000001 ), 0.0 ) );
		$this->assertTrue( DaveRoss\CassowaryConstraintSolver\CL::approx_clvariable_double( new DaveRoss\CassowaryConstraintSolver\ClVariable( 0.000000001 ), 0.0 ) );
		$this->assertInternalType( 'boolean', DaveRoss\CassowaryConstraintSolver\CL::approx_clvariable_double( new DaveRoss\CassowaryConstraintSolver\ClVariable( 0.00000001 ), 0.0 ) );
		$this->assertFalse( DaveRoss\CassowaryConstraintSolver\CL::approx_clvariable_double( new DaveRoss\CassowaryConstraintSolver\ClVariable( 0.00000001 ), 0.0 ) );

		$this->assertInternalType( 'boolean', DaveRoss\CassowaryConstraintSolver\CL::approx_clvariable_double( new DaveRoss\CassowaryConstraintSolver\ClVariable( 1.0 ), 1 ) );
		$this->assertTrue( DaveRoss\CassowaryConstraintSolver\CL::approx_clvariable_double( new DaveRoss\CassowaryConstraintSolver\ClVariable( 1.0 ), 1 ) );
		$this->assertInternalType( 'boolean', DaveRoss\CassowaryConstraintSolver\CL::approx_clvariable_double( new DaveRoss\CassowaryConstraintSolver\ClVariable( 1.0 ), 1.0000000001 ) );
		$this->assertTrue( DaveRoss\CassowaryConstraintSolver\CL::approx_clvariable_double( new DaveRoss\CassowaryConstraintSolver\ClVariable( 1.0 ), 1.0000000001 ) );
		$this->assertInternalType( 'boolean', DaveRoss\CassowaryConstraintSolver\CL::approx_clvariable_double( new DaveRoss\CassowaryConstraintSolver\ClVariable( 1.0 ), 1.000000001 ) );
		$this->assertTrue( DaveRoss\CassowaryConstraintSolver\CL::approx_clvariable_double( new DaveRoss\CassowaryConstraintSolver\ClVariable( 1.0 ), 1.000000001 ) );
		$this->assertInternalType( 'boolean', DaveRoss\CassowaryConstraintSolver\CL::approx_clvariable_double( new DaveRoss\CassowaryConstraintSolver\ClVariable( 1.0 ), 1.00000001 ) );
		$this->assertTrue( DaveRoss\CassowaryConstraintSolver\CL::approx_clvariable_double( new DaveRoss\CassowaryConstraintSolver\ClVariable( 1.0 ), 1.00000001 ) );
		$this->assertInternalType( 'boolean', DaveRoss\CassowaryConstraintSolver\CL::approx_clvariable_double( new DaveRoss\CassowaryConstraintSolver\ClVariable( 1.0 ), 1.0000001 ) );
		$this->assertFalse( DaveRoss\CassowaryConstraintSolver\CL::approx_clvariable_double( new DaveRoss\CassowaryConstraintSolver\ClVariable( 1.0 ), 1.0000001 ) );

	}

	/**
	 * @covers DaveRoss\CassowaryConstraintSolver\CL::approx_double_clvariable
	 */
	public function test_approx_double_clvariable() {

		// $a is 0.0
		$this->assertInternalType( 'boolean', DaveRoss\CassowaryConstraintSolver\CL::approx_double_clvariable( 0.0, new DaveRoss\CassowaryConstraintSolver\ClVariable( 0.0 ) ) );
		$this->assertTrue( DaveRoss\CassowaryConstraintSolver\CL::approx_double_clvariable( 0.0, new DaveRoss\CassowaryConstraintSolver\ClVariable( 0.0 ) ) );
		$this->assertInternalType( 'boolean', DaveRoss\CassowaryConstraintSolver\CL::approx_double_clvariable( 0.0, new DaveRoss\CassowaryConstraintSolver\ClVariable( 0.0000000001 ) ) );
		$this->assertTrue( DaveRoss\CassowaryConstraintSolver\CL::approx_double_clvariable( 0.0, new DaveRoss\CassowaryConstraintSolver\ClVariable( 0.0000000001 ) ) );
		$this->assertInternalType( 'boolean', DaveRoss\CassowaryConstraintSolver\CL::approx_double_clvariable( 0.0, new DaveRoss\CassowaryConstraintSolver\ClVariable( 0.000000001 ) ) );
		$this->assertTrue( DaveRoss\CassowaryConstraintSolver\CL::approx_double_clvariable( 0.0, new DaveRoss\CassowaryConstraintSolver\ClVariable( 0.000000001 ) ) );
		$this->assertInternalType( 'boolean', DaveRoss\CassowaryConstraintSolver\CL::approx_double_clvariable( 0.0, new DaveRoss\CassowaryConstraintSolver\ClVariable( 0.00000001 ) ) );
		$this->assertFalse( DaveRoss\CassowaryConstraintSolver\CL::approx_double_clvariable( 0.0, new DaveRoss\CassowaryConstraintSolver\ClVariable( 0.00000001 ) ) );

		// $b is 0.0
		$this->assertInternalType( 'boolean', DaveRoss\CassowaryConstraintSolver\CL::approx_double_clvariable( 0, new DaveRoss\CassowaryConstraintSolver\ClVariable( 0.0 ) ) );
		$this->assertTrue( DaveRoss\CassowaryConstraintSolver\CL::approx_double_clvariable( 0, new DaveRoss\CassowaryConstraintSolver\ClVariable( 0.0 ) ) );
		$this->assertInternalType( 'boolean', DaveRoss\CassowaryConstraintSolver\CL::approx_double_clvariable( 0.0000000001, new DaveRoss\CassowaryConstraintSolver\ClVariable( 0.0 ) ) );
		$this->assertTrue( DaveRoss\CassowaryConstraintSolver\CL::approx_double_clvariable( 0.0000000001, new DaveRoss\CassowaryConstraintSolver\ClVariable( 0.0 ) ) );
		$this->assertInternalType( 'boolean', DaveRoss\CassowaryConstraintSolver\CL::approx_double_clvariable( 0.000000001, new DaveRoss\CassowaryConstraintSolver\ClVariable( 0.0 ) ) );
		$this->assertTrue( DaveRoss\CassowaryConstraintSolver\CL::approx_double_clvariable( 0.000000001, new DaveRoss\CassowaryConstraintSolver\ClVariable( 0.0 ) ) );
		$this->assertInternalType( 'boolean', DaveRoss\CassowaryConstraintSolver\CL::approx_double_clvariable( 0.00000001, new DaveRoss\CassowaryConstraintSolver\ClVariable( 0.0 ) ) );
		$this->assertFalse( DaveRoss\CassowaryConstraintSolver\CL::approx_double_clvariable( 0.00000001, new DaveRoss\CassowaryConstraintSolver\ClVariable( 0.0 ) ) );

		$this->assertInternalType( 'boolean', DaveRoss\CassowaryConstraintSolver\CL::approx_double_clvariable( 1.0, new DaveRoss\CassowaryConstraintSolver\ClVariable( 1.0 ) ) );
		$this->assertTrue( DaveRoss\CassowaryConstraintSolver\CL::approx_double_clvariable( 1, new DaveRoss\CassowaryConstraintSolver\ClVariable( 1.0 ) ) );
		$this->assertInternalType( 'boolean', DaveRoss\CassowaryConstraintSolver\CL::approx_double_clvariable( 1.0, new DaveRoss\CassowaryConstraintSolver\ClVariable( 1.0000000001 ) ) );
		$this->assertTrue( DaveRoss\CassowaryConstraintSolver\CL::approx_double_clvariable( 1.0, new DaveRoss\CassowaryConstraintSolver\ClVariable( 1.0000000001 ) ) );
		$this->assertInternalType( 'boolean', DaveRoss\CassowaryConstraintSolver\CL::approx_double_clvariable( 1.0, new DaveRoss\CassowaryConstraintSolver\ClVariable( 1.000000001 ) ) );
		$this->assertTrue( DaveRoss\CassowaryConstraintSolver\CL::approx_double_clvariable( 1.0, new DaveRoss\CassowaryConstraintSolver\ClVariable( 1.000000001 ) ) );
		$this->assertInternalType( 'boolean', DaveRoss\CassowaryConstraintSolver\CL::approx_double_clvariable( 1.0, new DaveRoss\CassowaryConstraintSolver\ClVariable( 1.00000001 ) ) );
		$this->assertTrue( DaveRoss\CassowaryConstraintSolver\CL::approx_double_clvariable( 1.0, new DaveRoss\CassowaryConstraintSolver\ClVariable( 1.00000001 ) ) );
		$this->assertInternalType( 'boolean', DaveRoss\CassowaryConstraintSolver\CL::approx_double_clvariable( 1.0, new DaveRoss\CassowaryConstraintSolver\ClVariable( 1.0000001 ) ) );
		$this->assertFalse( DaveRoss\CassowaryConstraintSolver\CL::approx_double_clvariable( 1.0, new DaveRoss\CassowaryConstraintSolver\ClVariable( 1.0000001 ) ) );

	}

}

class CLTestImpl extends DaveRoss\CassowaryConstraintSolver\CL {

	public static function debugprint( $s ) {
		parent::debugprint( $s );
	}

	public static function traceprint( $s ) {
		parent::traceprint( $s );
	}

	public static function fnenterprint( $s ) {
		parent::fnenterprint( $s );
	}

	public static function fnexitprint( $s ) {
		parent::fnexitprint( $s );
	}

}

<?php

class CLTest extends PHPUnit_Framework_TestCase {

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
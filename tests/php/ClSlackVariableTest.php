<?php

class ClSlackVariableTest extends PHPUnit_Framework_TestCase {

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClSlackVariable::__construct_string
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClSlackVariable::name
	 */
	public function test_construct_string() {
		$var = new \DaveRoss\CassowaryConstraintSolver\ClSlackVariable( 'example' );
		$this->assertInternalType( 'string', $var->name() );
		$this->assertEquals( 'example', $var->name() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClSlackVariable::__construct_default
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClSlackVariable::name
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClSlackVariable::numCreated
	 */
	public function test_construct_default() {
		$num_instances = \DaveRoss\CassowaryConstraintSolver\ClSlackVariable::numCreated();
		$var           = new \DaveRoss\CassowaryConstraintSolver\ClSlackVariable();
		$this->assertInternalType( 'string', $var->name() );
		$this->assertEquals( 1, $var::numCreated() - $num_instances );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClSlackVariable::__construct_integer_string
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClSlackVariable::name
	 */
	public function test_construct_integer_string() {
		$var = new \DaveRoss\CassowaryConstraintSolver\ClSlackVariable( 1, 'a' );
		$this->assertInternalType( 'string', $var->name() );
		$this->assertEquals( 'a1', $var->name() );

	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClSlackVariable::__toString
	 */
	public function test_toString() {
		$var = new \DaveRoss\CassowaryConstraintSolver\ClSlackVariable( 'example' );
		$this->assertEquals( "[example:slack]", $var->__toString() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClSlackVariable::isExternal
	 */
	public function test_isExternal() {
		$var = new \DaveRoss\CassowaryConstraintSolver\ClSlackVariable( 'example' );
		$this->assertInternalType( 'boolean', $var->isExternal() );
		$this->assertEquals( false, $var->isExternal() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClSlackVariable::isPivotable
	 */
	public function test_isPivotable() {
		$var = new \DaveRoss\CassowaryConstraintSolver\ClSlackVariable( 'example' );
		$this->assertInternalType( 'boolean', $var->isPivotable() );
		$this->assertEquals( true, $var->isPivotable() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClSlackVariable::isRestricted
	 */
	public function test_isRestricted() {
		$var = new \DaveRoss\CassowaryConstraintSolver\ClSlackVariable( 'example' );
		$this->assertInternalType( 'boolean', $var->isRestricted() );
		$this->assertEquals( true, $var->isRestricted() );

	}

}

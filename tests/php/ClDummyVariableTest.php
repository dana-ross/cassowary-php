<?php

class ClDummyVariableTest extends PHPUnit_Framework_TestCase {

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClDummyVariable::__toString
	 */
	function test_tostring() {
		$dummy = new \DaveRoss\CassowaryConstraintSolver\ClDummyVariable( 'example' );
		$this->assertInternalType( 'string', $dummy->__toString() );
		$this->assertEquals( '[example:dummy]', $dummy->__toString() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClDummyVariable::isDummy
	 */
	public function test_isDummy() {
		$dummy = new \DaveRoss\CassowaryConstraintSolver\ClDummyVariable( 'example' );
		$this->assertInternalType( 'boolean', $dummy->isDummy() );
		$this->assertEquals( true, $dummy->isDummy() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClDummyVariable::isExternal
	 */
	public function test_isExternal() {
		$dummy = new \DaveRoss\CassowaryConstraintSolver\ClDummyVariable( 'example' );
		$this->assertInternalType( 'boolean', $dummy->isExternal() );
		$this->assertEquals( false, $dummy->isExternal() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClDummyVariable::isPivotable
	 */
	public function test_isPivotable() {
		$dummy = new \DaveRoss\CassowaryConstraintSolver\ClDummyVariable( 'example' );
		$this->assertInternalType( 'boolean', $dummy->isPivotable() );
		$this->assertEquals( false, $dummy->isPivotable() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClDummyVariable::isRestricted
	 */
	public function test_isRestricted() {
		$dummy = new \DaveRoss\CassowaryConstraintSolver\ClDummyVariable( 'example' );
		$this->assertInternalType( 'boolean', $dummy->isRestricted() );
		$this->assertEquals( true, $dummy->isRestricted() );
	}


}
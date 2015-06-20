<?php

class ClObjectiveVariableTest extends PHPUnit_Framework_TestCase {

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClObjectiveVariable::__toString
	 */
	function test_tostring() {
		$objective = new \DaveRoss\CassowaryConstraintSolver\ClObjectiveVariable( 'example' );
		$this->assertInternalType( 'string', $objective->__toString() );
		$this->assertEquals( '[example:obj]', $objective->__toString() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClObjectiveVariable::isDummy
	 */
	public function test_isDummy() {
		$objective = new \DaveRoss\CassowaryConstraintSolver\ClObjectiveVariable( 'example' );
		$this->assertInternalType( 'boolean', $objective->isDummy() );
		$this->assertEquals( false, $objective->isDummy() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClObjectiveVariable::isExternal
	 */
	public function test_isExternal() {
		$objective = new \DaveRoss\CassowaryConstraintSolver\ClObjectiveVariable( 'example' );
		$this->assertInternalType( 'boolean', $objective->isExternal() );
		$this->assertEquals( false, $objective->isExternal() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClObjectiveVariable::isPivotable
	 */
	public function test_isPivotable() {
		$objective = new \DaveRoss\CassowaryConstraintSolver\ClObjectiveVariable( 'example' );
		$this->assertInternalType( 'boolean', $objective->isPivotable() );
		$this->assertEquals( false, $objective->isPivotable() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClObjectiveVariable::isRestricted
	 */
	public function test_isRestricted() {
		$objective = new \DaveRoss\CassowaryConstraintSolver\ClObjectiveVariable( 'example' );
		$this->assertInternalType( 'boolean', $objective->isRestricted() );
		$this->assertEquals( false, $objective->isRestricted() );
	}

}
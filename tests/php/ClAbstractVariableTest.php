<?php

class ClAbstractVariableTest extends PHPUnit_Framework_TestCase {

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClAbstractVariable::__construct_string
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClAbstractVariable::name
	 */
	public function test_construct_string() {
		$a = new ClAbstractVariableA( 'example' );
		$this->assertInternalType( 'string', $a->name() );
		$this->assertEquals( 'example', $a->name() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClAbstractVariable::__construct_default
	 */
	public function test_construct_default() {
		$a = new ClAbstractVariableA();
		$this->assertInternalType( 'string', $a->name() );
		$num_created = \DaveRoss\CassowaryConstraintSolver\ClAbstractVariable::numCreated();
		$this->assertEquals( "v" . ( $num_created - 1 ), $a->name() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClAbstractVariable::__construct_integer_string
	 */
	public function test_construct_integer_string() {
		$a = new ClAbstractVariableA( 1, 'a' );
		$this->assertInternalType( 'string', $a->name() );
		$this->assertEquals( 'a1', $a->name() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClAbstractVariable::setName
	 */
	public function test_set_name() {
		$a = new ClAbstractVariableA( 'example' );
		$a->setName( 'test' );
		$this->assertInternalType( 'string', $a->name() );
		$this->assertEquals( 'test', $a->name() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClAbstractVariable::isDummy
	 */
	public function test_is_dummy() {
		$a = new ClAbstractVariableA( 'example' );
		$this->assertInternalType( 'boolean', $a->isDummy() );
		$this->assertEquals( false, $a->isDummy() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClAbstractVariable::numCreated
	 */
	public function test_num_created() {
		$a           = new ClAbstractVariableA( 'example' );
		$num_created = $a->numCreated();
		$this->assertInternalType( 'integer', $num_created );
		$b = new ClAbstractVariableA( 'example' );
		$this->assertEquals( 1, $b->numCreated() - $num_created );
	}
}

/**
 * Class ClAbstractVariableA
 * Test rig for ClAbstractVariable testing
 */
class ClAbstractVariableA extends \DaveRoss\CassowaryConstraintSolver\ClAbstractVariable {

	/**
	 * @return string
	 */
	public function __toString() {
		return '';
	}

	/**
	 * @return bool
	 */
	public function isExternal() {
		return false;
	}

	/**
	 * @return bool
	 */
	public function isPivotable() {
		return false;
	}

	/**
	 * @return bool
	 */
	public function isRestricted() {
		return true;
	}

}
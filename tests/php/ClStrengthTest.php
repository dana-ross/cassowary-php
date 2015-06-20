<?php

class ClStrengthTest extends PHPUnit_Framework_TestCase {

	public function test_statics() {
		$this->assertInstanceOf( 'DaveRoss\CassowaryConstraintSolver\ClStrength', DaveRoss\CassowaryConstraintSolver\ClStrength::$required );// = new ClStrength( "<Required>", 1000, 1000, 1000 );
		$this->assertInstanceOf( 'DaveRoss\CassowaryConstraintSolver\ClStrength', DaveRoss\CassowaryConstraintSolver\ClStrength::$strong );//= new ClStrength( "strong", 1.0, 0.0, 0.0 );
		$this->assertInstanceOf( 'DaveRoss\CassowaryConstraintSolver\ClStrength', DaveRoss\CassowaryConstraintSolver\ClStrength::$medium );//= new ClStrength( "medium", 0.0, 1.0, 0.0 );
		$this->assertInstanceOf( 'DaveRoss\CassowaryConstraintSolver\ClStrength', DaveRoss\CassowaryConstraintSolver\ClStrength::$weak );//= new ClStrength( "weak", 0.0, 0.0, 1.0 );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClStrength::__construct_string_clsymbolicweight
	 */
	public function test_construct_string_clsymbolicweight() {
		$strength = new \DaveRoss\CassowaryConstraintSolver\ClStrength( 'example', new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 1.0, 2.0, 3.0 ) );
		$this->assertEquals( 'example', $strength->getName() );
		$this->assertEquals( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 1.0, 2.0, 3.0 ), $strength->getSymbolicWeight() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClStrength::__construct_string_double_double_double
	 */
	public function test_construct_string_double_double_double() {
		$strength = new \DaveRoss\CassowaryConstraintSolver\ClStrength( 'example', 1.0, 2.0, 3.0 );
		$this->assertEquals( 'example', $strength->getName() );
		$this->assertEquals( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( 1.0, 2.0, 3.0 ), $strength->getSymbolicWeight() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClStrength::isRequired
	 */
	public function test_isRequired() {
		$this->assertInternalType( 'boolean', \DaveRoss\CassowaryConstraintSolver\ClStrength::$required->isRequired() );
		$this->assertEquals( true, \DaveRoss\CassowaryConstraintSolver\ClStrength::$required->isRequired() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClStrength::__toString
	 */
	public function test_toString() {
		$this->assertEquals( '<Required>', \DaveRoss\CassowaryConstraintSolver\ClStrength::$required->__toString() );
		$this->assertEquals( 'strong:[1,0,0]', \DaveRoss\CassowaryConstraintSolver\ClStrength::$strong->__toString() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClStrength::getSymbolicWeight
	 */
	public function test_getSymbolicWeight() {
		$this->assertInstanceOf( '\DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight', \DaveRoss\CassowaryConstraintSolver\ClStrength::$strong->getSymbolicWeight() );
		$this->assertEquals( new \DaveRoss\CassowaryConstraintSolver\ClSymbolicWeight( array(
			1.0,
			0.0,
			0.0
		) ), \DaveRoss\CassowaryConstraintSolver\ClStrength::$strong->getSymbolicWeight() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClStrength::getName
	 */
	public function test_getName() {
		$strength = new \DaveRoss\CassowaryConstraintSolver\ClStrength( 'example', 1.0, 2.0, 3.0 );
		$this->assertEquals( 'example', $strength->getName() );
	}

}

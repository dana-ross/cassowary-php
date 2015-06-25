<?php

class ClPointTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClPoint::__construct_clvariable_clvariable
	 */
	function test_construct_clvariable_clvariable() {

		$point = new \DaveRoss\CassowaryConstraintSolver\ClPoint(
			new \DaveRoss\CassowaryConstraintSolver\ClVariable( 'x', 1.0 ),
			new \DaveRoss\CassowaryConstraintSolver\ClVariable( 'y', 2.0 )
		);
		$this->assertInternalType( 'double', $point->getXValue() );
		$this->assertEquals( 1.0, $point->getXValue() );
		$this->assertInternalType( 'double', $point->getYValue() );
		$this->assertEquals( 2.0, $point->getYValue() );

	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClPoint::__construct_double_double
	 */
	function test_construct_double_double() {

		$point = new \DaveRoss\CassowaryConstraintSolver\ClPoint( 1.0, 2.0 );
		$this->assertInternalType( 'double', $point->getXValue() );
		$this->assertEquals( 1.0, $point->getXValue() );
		$this->assertInternalType( 'double', $point->getYValue() );
		$this->assertEquals( 2.0, $point->getYValue() );

	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClPoint::__construct_double_double_integer
	 */
	function test_construct_double_double_integer() {
		$point = new \DaveRoss\CassowaryConstraintSolver\ClPoint( 1.0, 2.0, 5 );
		$this->assertInternalType( 'string', $point->getX()->name() );
		$this->assertEquals( 'x5', $point->getX()->name() );
		$this->assertInternalType( 'string', $point->getY()->name() );
		$this->assertEquals( 'y5', $point->getY()->name() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClPoint::getX
	 */
	function test_getx() {
		$point = new \DaveRoss\CassowaryConstraintSolver\ClPoint( 1.0, 2.0 );
		$this->assertInstanceOf( '\DaveRoss\CassowaryConstraintSolver\ClVariable', $point->getX() );
		$this->assertEquals( 1.0, $point->getX()->getValue() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClPoint::getY
	 */
	function test_gety() {
		$point = new \DaveRoss\CassowaryConstraintSolver\ClPoint( 1.0, 2.0 );
		$this->assertInstanceOf( '\DaveRoss\CassowaryConstraintSolver\ClVariable', $point->getY() );
		$this->assertEquals( 2.0, $point->getY()->getValue() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClPoint::setXY
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClPoint::getXValue
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClPoint::getYValue
	 */
	function test_setxy() {

		$point = new \DaveRoss\CassowaryConstraintSolver\ClPoint( 1.0, 2.0 );

		$point->setXY( 3.0, 4.0 );
		$this->assertInternalType( 'double', $point->getXValue() );
		$this->assertEquals( 3.0, $point->getXValue() );
		$this->assertInternalType( 'double', $point->getYValue() );
		$this->assertEquals( 4.0, $point->getYValue() );

		$point->setXY(
			new \DaveRoss\CassowaryConstraintSolver\ClVariable( 'x', 5.0 ),
			new \DaveRoss\CassowaryConstraintSolver\ClVariable( 'y', 6.0 )
		);
		$this->assertInternalType( 'double', $point->getXValue() );
		$this->assertEquals( 5.0, $point->getXValue() );
		$this->assertInternalType( 'double', $point->getYValue() );
		$this->assertEquals( 6.0, $point->getYValue() );

	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClPoint::__toString
	 */
	function test_toString() {
		$point = new \DaveRoss\CassowaryConstraintSolver\ClPoint( 1.0, 2.0 );
		$this->assertInternalType( 'string', $point->__toString() );
		$this->assertEquals( '([:1], [:2])', $point->__toString() );
	}

}

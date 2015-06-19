<?php

class TimerTest extends PHPUnit_Framework_TestCase {

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\Timer::Start
	 * @covers \DaveRoss\CassowaryConstraintSolver\Timer::IsRunning
	 */
	function test_is_running() {
		$timer = new \DaveRoss\CassowaryConstraintSolver\Timer();
		$timer->Start();
		$this->assertEquals( true, $timer->IsRunning() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\Timer::Stop
	 * @covers \DaveRoss\CassowaryConstraintSolver\Timer::ElapsedTime
	 */
	function test_elapsed_time() {
		$timer = new \DaveRoss\CassowaryConstraintSolver\Timer();
		$timer->Start();
		sleep( 2 );
		$timer->Stop();
		$this->assertEquals( 2, floor( $timer->ElapsedTime() ) );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\Timer::Reset
	 */
	function test_reset() {
		$timer = new \DaveRoss\CassowaryConstraintSolver\Timer();
		$timer->Start();
		sleep( 2 );
		$timer->Stop();
		$this->assertNotEquals( 0, $timer->ElapsedTime() );
		$timer->Reset();
		$this->assertEquals(0, $timer->ElapsedTime());

	}
}

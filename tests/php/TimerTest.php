<?php

class TimerTest extends PHPUnit_Framework_TestCase {

	function test_is_running() {
		$timer = new \DaveRoss\CasswaryConstraintSolver\Timer();
		$timer->Start();
		$this->assertEquals( true, $timer->IsRunning() );
	}

	function test_elapsed_time() {
		$timer = new \DaveRoss\CasswaryConstraintSolver\Timer();
		$timer->Start();
		sleep( 2 );
		$timer->Stop();
		$this->assertEquals( 2, floor( $timer->ElapsedTime() ) );
	}

	function test_reset() {
		$timer = new \DaveRoss\CasswaryConstraintSolver\Timer();
		$timer->Start();
		sleep( 2 );
		$timer->Stop();
		$this->assertNotEquals( 0, $timer->ElapsedTime() );
		$timer->Reset();
		$this->assertEquals(0, $timer->ElapsedTime());

	}
}

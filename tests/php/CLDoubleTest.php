<?php

class CLDoubleTest extends \PHPUnit_Framework_TestCase {

	function test_default_constructor() {

		$instance = new \DaveRoss\CasswaryConstraintSolver\ClDouble();
		$this->assertInternalType('double', $instance->value);
		$this->assertEquals(0.0, $instance->value);

	}

	function test_double_constructor() {
		$instance = new \DaveRoss\CasswaryConstraintSolver\ClDouble(5.5);
		$this->assertInternalType('double', $instance->value);
		$this->assertEquals(5.5, $instance->value);
	}

	function test_double_value() {

		$instance = new \DaveRoss\CasswaryConstraintSolver\ClDouble(5.5);
		$this->assertInternalType('double', $instance->doubleValue());
		$this->assertEquals(5.5, $instance->doubleValue());

	}

	function test_float_value() {

		$instance = new \DaveRoss\CasswaryConstraintSolver\ClDouble(5.5);
		$this->assertInternalType('double', $instance->floatValue());
		$this->assertEquals(5.5, $instance->floatValue());

	}

	function test_int_value() {

		$instance = new \DaveRoss\CasswaryConstraintSolver\ClDouble(5.5);
		$this->assertInternalType('integer', $instance->intValue());
		$this->assertEquals(5, $instance->intValue());

	}

	function test_long_value() {

		$instance = new \DaveRoss\CasswaryConstraintSolver\ClDouble(5.5);
		$this->assertInternalType('integer', $instance->longValue());
		$this->assertEquals(5, $instance->longValue());

	}

}

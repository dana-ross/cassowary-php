<?php

class TestCastTarget /*extends PHPUnit_Framework_TestCase */{

//	function test_cast() {
//		$a = new CastTargetA();
//		$b = CastTargetB::__cast_to_self( $a );
//	}

}

class CastTargetA {

	public $a;
	public $aa;

}

class CastTargetB extends CastTargetA {

	public $a;
	public $b;

	use \DaveRoss\CasswaryConstraintSolver\CastTarget;

}
<?php

class ExceptionsTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClException::__construct
	 */
	function test_clexception() {

		$fn = function () {
			throw new \DaveRoss\CassowaryConstraintSolver\ClException;
		};

		try {
			$fn();
		} catch ( Exception $e ) {
			$this->assertInstanceOf( '\DaveRoss\CassowaryConstraintSolver\CLException', $e );
			$this->assertEquals( "An error has occurred in CL", $e->getMessage() );
		}

		$fn2 = function () {
			throw new \DaveRoss\CassowaryConstraintSolver\ClException( 'example' );
		};

		try {
			$fn2();
		} catch ( Exception $e ) {
			$this->assertInstanceOf( '\DaveRoss\CassowaryConstraintSolver\CLException', $e );
			$this->assertEquals( "example", $e->getMessage() );
		}

	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ClException::message_or_default
	 */
	function test_message_or_default() {
		$this->assertEquals( 'example', \DaveRoss\CassowaryConstraintSolver\ClException::message_or_default( 'example' ) );
		$this->assertEquals( "An error has occurred in CL", \DaveRoss\CassowaryConstraintSolver\ClException::message_or_default() );
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\TooDifficultException::__construct
	 */
	function test_too_difficult_exception() {

		$fn = function () {
			throw new \DaveRoss\CassowaryConstraintSolver\TooDifficultException;
		};

		try {
			$fn();
		} catch ( Exception $e ) {
			$this->assertInstanceOf( '\DaveRoss\CassowaryConstraintSolver\TooDifficultException', $e );
			$this->assertEquals( 'The constraints are too difficult to solve', $e->getMessage() );
		}

	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\RequiredConstraintFailureException::__construct
	 */
	function test_required_constraint_failure_exception() {

		$fn = function () {
			throw new \DaveRoss\CassowaryConstraintSolver\RequiredConstraintFailureException;
		};

		try {
			$fn();
		} catch ( Exception $e ) {
			$this->assertInstanceOf( '\DaveRoss\CassowaryConstraintSolver\RequiredConstraintFailureException', $e );
			$this->assertEquals( "A required constraint cannot be satisfied", $e->getMessage() );
		}

	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\NotEnoughStaysException::__construct
	 */
	function test_not_enough_stays_exception() {

		$fn = function () {
			throw new \DaveRoss\CassowaryConstraintSolver\NotEnoughStaysException;
		};

		try {
			$fn();
		} catch ( Exception $e ) {
			$this->assertInstanceOf( '\DaveRoss\CassowaryConstraintSolver\NotEnoughStaysException', $e );
			$this->assertEquals( "There are not enough stays to give specific values to every variable", $e->getMessage() );
		}

	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\NonlinearExpressionException::__construct
	 */
	function test_nonlinear_expression_exception() {

		$fn = function () {
			throw new \DaveRoss\CassowaryConstraintSolver\NonlinearExpressionException;
		};

		try {
			$fn();
		} catch ( Exception $e ) {
			$this->assertInstanceOf( '\DaveRoss\CassowaryConstraintSolver\NonlinearExpressionException', $e );
			$this->assertEquals( "The resulting expression would be nonlinear", $e->getMessage() );
		}

	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\ConstraintNotFoundException::__construct
	 */
	function test_constraint_not_found_exception() {

		$fn = function () {
			throw new \DaveRoss\CassowaryConstraintSolver\ConstraintNotFoundException;
		};

		try {
			$fn();
		} catch ( Exception $e ) {
			$this->assertInstanceOf( '\DaveRoss\CassowaryConstraintSolver\ConstraintNotFoundException', $e );
			$this->assertEquals( "Tried to remove a constraint never added to the tableu", $e->getMessage() );
		}
	}

	/**
	 * @covers \DaveRoss\CassowaryConstraintSolver\UnsupportedOperationException::__construct
	 */
	function test_unsupported_operation_exception() {

		$fn = function () {
			throw new \DaveRoss\CassowaryConstraintSolver\UnsupportedOperationException( 'example' );
		};

		try {
			$fn();
		} catch ( Exception $e ) {
			$this->assertInstanceOf( '\DaveRoss\CassowaryConstraintSolver\UnsupportedOperationException', $e );
			$this->assertEquals( "example", $e->getMessage() );
		}
	}

}
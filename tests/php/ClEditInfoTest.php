<?php

class ClEditInfoTest extends PHPUnit_Framework_TestCase {

	/**
	 * @covers DaveRoss\CassowaryConstraintSolver\ClEditInfo::__construct
	 */
	public function test_construct() {

		$cn         = new DaveRoss\CassowaryConstraintSolver\ClEditConstraint( DaveRoss\CassowaryConstraintSolver\ClStrength::$medium );
		$edit_plus  = new DaveRoss\CassowaryConstraintSolver\ClSlackVariable( 1, 'example' );
		$edit_minus = new DaveRoss\CassowaryConstraintSolver\ClSlackVariable( - 1, 'example' );

		$impl = new ClEditInfoImpl(
			$cn,
			$edit_plus,
			$edit_minus,
			5.0,
			7
		);

		$this->assertInstanceOf( 'DaveRoss\CassowaryConstraintSolver\ClEditConstraint', $impl->cn );
		$this->assertSame( $cn, $impl->cn );

		$this->assertInstanceOf( 'DaveRoss\CassowaryConstraintSolver\ClSlackVariable', $impl->clvEditPlus );
		$this->assertSame( $edit_plus, $impl->clvEditPlus );

		$this->assertInstanceOf( 'DaveRoss\CassowaryConstraintSolver\ClSlackVariable', $impl->clvEditMinus );
		$this->assertSame( $edit_minus, $impl->clvEditMinus );

		$this->assertInternalType( 'double', $impl->prevEditConstant );
		$this->assertEquals( 5.0, $impl->prevEditConstant );

		$this->assertInternalType( 'integer', $impl->i );
		$this->assertEquals( 7, $impl->i );


	}

	/**
	 * @covers DaveRoss\CassowaryConstraintSolver\ClEditInfo::Index
	 */
	public function test_Index() {

		$impl = new ClEditInfoImpl(
			new DaveRoss\CassowaryConstraintSolver\ClEditConstraint( DaveRoss\CassowaryConstraintSolver\ClStrength::$medium ),
			new DaveRoss\CassowaryConstraintSolver\ClSlackVariable( 1, 'example' ),
			new DaveRoss\CassowaryConstraintSolver\ClSlackVariable( - 1, 'example' ),
			5.0,
			7
		);

		$this->assertInternalType( 'integer', $impl->Index() );
		$this->assertEquals( 7, $impl->Index() );

	}

	/**
	 * @covers DaveRoss\CassowaryConstraintSolver\ClEditInfo::Constraint
	 */
	public function test_Constraint() {

		$cn = new DaveRoss\CassowaryConstraintSolver\ClEditConstraint( DaveRoss\CassowaryConstraintSolver\ClStrength::$medium );

		$impl = new ClEditInfoImpl(
			$cn,
			new DaveRoss\CassowaryConstraintSolver\ClSlackVariable( 1, 'example' ),
			new DaveRoss\CassowaryConstraintSolver\ClSlackVariable( - 1, 'example' ),
			5.0,
			7
		);

		$this->assertInstanceOf( 'DaveRoss\CassowaryConstraintSolver\ClEditConstraint', $impl->Constraint() );
		$this->assertSame( $cn, $impl->Constraint() );

	}

	/**
	 * @covers DaveRoss\CassowaryConstraintSolver\ClEditInfo::ClvEditPlus
	 */
	public function test_ClvEditPlus() {

		$edit_plus = new DaveRoss\CassowaryConstraintSolver\ClSlackVariable( 1, 'example' );

		$impl = new ClEditInfoImpl(
			new DaveRoss\CassowaryConstraintSolver\ClEditConstraint( DaveRoss\CassowaryConstraintSolver\ClStrength::$medium ),
			$edit_plus,
			new DaveRoss\CassowaryConstraintSolver\ClSlackVariable( - 1, 'example' ),
			5.0,
			7
		);

		$this->assertInstanceOf( 'DaveRoss\CassowaryConstraintSolver\ClSlackVariable', $impl->ClvEditPlus() );
		$this->assertSame( $edit_plus, $impl->ClvEditPlus() );

	}

	/**
	 * @covers DaveRoss\CassowaryConstraintSolver\ClEditInfo::ClvEditMinus
	 */
	public function test_ClvEditMinus() {

		$edit_minus = new DaveRoss\CassowaryConstraintSolver\ClSlackVariable( - 1, 'example' );

		$impl = new ClEditInfoImpl(
			new DaveRoss\CassowaryConstraintSolver\ClEditConstraint( DaveRoss\CassowaryConstraintSolver\ClStrength::$medium ),
			new DaveRoss\CassowaryConstraintSolver\ClSlackVariable( 1, 'example' ),
			$edit_minus,
			5.0,
			7
		);

		$this->assertInstanceOf( 'DaveRoss\CassowaryConstraintSolver\ClSlackVariable', $impl->clvEditMinus() );
		$this->assertSame( $edit_minus, $impl->clvEditMinus() );

	}

	/**
	 * @covers DaveRoss\CassowaryConstraintSolver\ClEditInfo::PrevEditConstant
	 */
	public function test_PrevEditConstant() {

		$impl = new ClEditInfoImpl(
			new DaveRoss\CassowaryConstraintSolver\ClEditConstraint( DaveRoss\CassowaryConstraintSolver\ClStrength::$medium ),
			new DaveRoss\CassowaryConstraintSolver\ClSlackVariable( 1, 'example' ),
			new DaveRoss\CassowaryConstraintSolver\ClSlackVariable( - 1, 'example' ),
			5.0,
			7
		);

		$this->assertInternalType( 'double', $impl->prevEditConstant() );
		$this->assertEquals( 5.0, $impl->prevEditConstant() );

	}

	/**
	 * @covers DaveRoss\CassowaryConstraintSolver\ClEditInfo::SetPrevEditConstant
	 */
	public function test_SetPrevEditConstant() {

		$impl = new ClEditInfoImpl(
			new DaveRoss\CassowaryConstraintSolver\ClEditConstraint( DaveRoss\CassowaryConstraintSolver\ClStrength::$medium ),
			new DaveRoss\CassowaryConstraintSolver\ClSlackVariable( 1, 'example' ),
			new DaveRoss\CassowaryConstraintSolver\ClSlackVariable( - 1, 'example' ),
			5.0,
			7
		);

		$impl->SetPrevEditConstant( 13.0 );
		$this->assertInternalType( 'double', $impl->prevEditConstant );
		$this->assertEquals( 13.0, $impl->prevEditConstant );

	}

}

class ClEditInfoImpl extends DaveRoss\CassowaryConstraintSolver\ClEditInfo {

	public $cn; /* ClConstraint */

	public $clvEditPlus; /* ClSlackVariable */

	public $clvEditMinus; /* ClSlackVariable */

	public $prevEditConstant; /* double */

	public $i; /* int */

}
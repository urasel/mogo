<?php
App::uses('Currency', 'General.Model');

/**
 * Currency Test Case
 *
 */
class CurrencyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.general.currency'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Currency = ClassRegistry::init('General.Currency');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Currency);

		parent::tearDown();
	}

}

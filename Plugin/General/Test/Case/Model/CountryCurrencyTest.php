<?php
App::uses('CountryCurrency', 'General.Model');

/**
 * CountryCurrency Test Case
 *
 */
class CountryCurrencyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.general.country_currency',
		'plugin.general.country'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CountryCurrency = ClassRegistry::init('General.CountryCurrency');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CountryCurrency);

		parent::tearDown();
	}

}

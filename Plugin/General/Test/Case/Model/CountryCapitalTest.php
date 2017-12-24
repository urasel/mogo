<?php
App::uses('CountryCapital', 'General.Model');

/**
 * CountryCapital Test Case
 *
 */
class CountryCapitalTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.general.country_capital',
		'plugin.general.country'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CountryCapital = ClassRegistry::init('General.CountryCapital');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CountryCapital);

		parent::tearDown();
	}

}

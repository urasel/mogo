<?php
App::uses('CountryCity', 'General.Model');

/**
 * CountryCity Test Case
 *
 */
class CountryCityTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.general.country_city',
		'plugin.general.country'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CountryCity = ClassRegistry::init('General.CountryCity');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CountryCity);

		parent::tearDown();
	}

}

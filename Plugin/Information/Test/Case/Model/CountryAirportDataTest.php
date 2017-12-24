<?php
App::uses('CountryAirportData', 'Information.Model');

/**
 * CountryAirportData Test Case
 *
 */
class CountryAirportDataTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.country_airport_data',
		'plugin.information.language',
		'plugin.information.country_airport'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CountryAirportData = ClassRegistry::init('Information.CountryAirportData');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CountryAirportData);

		parent::tearDown();
	}

}

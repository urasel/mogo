<?php
App::uses('CountryAirport', 'Information.Model');

/**
 * CountryAirport Test Case
 *
 */
class CountryAirportTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.country_airport',
		'plugin.information.point',
		'plugin.information.place_type',
		'plugin.information.airport_type',
		'plugin.information.continent',
		'plugin.information.country',
		'plugin.information.country_airport_data'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CountryAirport = ClassRegistry::init('Information.CountryAirport');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CountryAirport);

		parent::tearDown();
	}

}

<?php
App::uses('CountryAirportImage', 'Information.Model');

/**
 * CountryAirportImage Test Case
 *
 */
class CountryAirportImageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.country_airport_image',
		'plugin.information.country_airport'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CountryAirportImage = ClassRegistry::init('Information.CountryAirportImage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CountryAirportImage);

		parent::tearDown();
	}

}

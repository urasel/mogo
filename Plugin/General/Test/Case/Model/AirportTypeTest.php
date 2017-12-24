<?php
App::uses('AirportType', 'General.Model');

/**
 * AirportType Test Case
 *
 */
class AirportTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.general.airport_type',
		'plugin.general.country_airport'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AirportType = ClassRegistry::init('General.AirportType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AirportType);

		parent::tearDown();
	}

}

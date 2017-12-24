<?php
App::uses('AirportData', 'Information.Model');

/**
 * AirportData Test Case
 *
 */
class AirportDataTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.airport_data',
		'plugin.information.language',
		'plugin.information.airport'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AirportData = ClassRegistry::init('Information.AirportData');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AirportData);

		parent::tearDown();
	}

}

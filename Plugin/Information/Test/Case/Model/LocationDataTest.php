<?php
App::uses('LocationData', 'Information.Model');

/**
 * LocationData Test Case
 *
 */
class LocationDataTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.location_data',
		'plugin.information.language',
		'plugin.information.location'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->LocationData = ClassRegistry::init('Information.LocationData');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->LocationData);

		parent::tearDown();
	}

}

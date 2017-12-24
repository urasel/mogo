<?php
App::uses('PlaceData', 'Location.Model');

/**
 * PlaceData Test Case
 *
 */
class PlaceDataTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.location.place_data',
		'plugin.location.language',
		'plugin.location.topic'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PlaceData = ClassRegistry::init('Location.PlaceData');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PlaceData);

		parent::tearDown();
	}

}

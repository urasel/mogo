<?php
App::uses('LocationImage', 'Information.Model');

/**
 * LocationImage Test Case
 *
 */
class LocationImageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.location_image',
		'plugin.information.point'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->LocationImage = ClassRegistry::init('Information.LocationImage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->LocationImage);

		parent::tearDown();
	}

}

<?php
App::uses('PlaceImage', 'Location.Model');

/**
 * PlaceImage Test Case
 *
 */
class PlaceImageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.location.place_image',
		'plugin.location.point'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PlaceImage = ClassRegistry::init('Location.PlaceImage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PlaceImage);

		parent::tearDown();
	}

}

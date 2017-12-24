<?php
App::uses('PlaceImage', 'Information.Model');

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
		'plugin.information.place_image',
		'plugin.information.point'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PlaceImage = ClassRegistry::init('Information.PlaceImage');
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

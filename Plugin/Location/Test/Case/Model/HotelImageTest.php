<?php
App::uses('HotelImage', 'Location.Model');

/**
 * HotelImage Test Case
 *
 */
class HotelImageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.location.hotel_image',
		'plugin.location.hotel'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->HotelImage = ClassRegistry::init('Location.HotelImage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->HotelImage);

		parent::tearDown();
	}

}

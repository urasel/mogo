<?php
App::uses('HotelRoom', 'Location.Model');

/**
 * HotelRoom Test Case
 *
 */
class HotelRoomTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.location.hotel_room',
		'plugin.location.hotel',
		'plugin.location.hotel_room_category'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->HotelRoom = ClassRegistry::init('Location.HotelRoom');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->HotelRoom);

		parent::tearDown();
	}

}

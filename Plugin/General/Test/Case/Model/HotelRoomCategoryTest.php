<?php
App::uses('HotelRoomCategory', 'General.Model');

/**
 * HotelRoomCategory Test Case
 *
 */
class HotelRoomCategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.general.hotel_room_category',
		'plugin.general.hotel_room'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->HotelRoomCategory = ClassRegistry::init('General.HotelRoomCategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->HotelRoomCategory);

		parent::tearDown();
	}

}

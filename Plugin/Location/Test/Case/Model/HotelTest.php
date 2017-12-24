<?php
App::uses('Hotel', 'Location.Model');

/**
 * Hotel Test Case
 *
 */
class HotelTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.location.hotel',
		'plugin.location.hotel_category',
		'plugin.location.country',
		'plugin.location.zone',
		'plugin.location.hotel_detail',
		'plugin.location.hotel_image',
		'plugin.location.hotel_room'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Hotel = ClassRegistry::init('Location.Hotel');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Hotel);

		parent::tearDown();
	}

}

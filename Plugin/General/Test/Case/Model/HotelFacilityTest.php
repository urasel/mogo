<?php
App::uses('HotelFacility', 'General.Model');

/**
 * HotelFacility Test Case
 *
 */
class HotelFacilityTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.general.hotel_facility',
		'plugin.general.hotel_detail'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->HotelFacility = ClassRegistry::init('General.HotelFacility');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->HotelFacility);

		parent::tearDown();
	}

}

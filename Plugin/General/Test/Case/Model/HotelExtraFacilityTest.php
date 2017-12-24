<?php
App::uses('HotelExtraFacility', 'General.Model');

/**
 * HotelExtraFacility Test Case
 *
 */
class HotelExtraFacilityTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.general.hotel_extra_facility',
		'plugin.general.hotel_detail'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->HotelExtraFacility = ClassRegistry::init('General.HotelExtraFacility');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->HotelExtraFacility);

		parent::tearDown();
	}

}

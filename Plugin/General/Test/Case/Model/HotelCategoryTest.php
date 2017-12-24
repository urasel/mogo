<?php
App::uses('HotelCategory', 'General.Model');

/**
 * HotelCategory Test Case
 *
 */
class HotelCategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.general.hotel_category',
		'plugin.general.hotel'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->HotelCategory = ClassRegistry::init('General.HotelCategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->HotelCategory);

		parent::tearDown();
	}

}

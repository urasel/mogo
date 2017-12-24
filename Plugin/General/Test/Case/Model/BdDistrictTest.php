<?php
App::uses('BdDistrict', 'General.Model');

/**
 * BdDistrict Test Case
 *
 */
class BdDistrictTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.general.bd_district',
		'plugin.general.bd_division',
		'plugin.general.bd_thana',
		'plugin.general.bd_upozilla',
		'plugin.general.boothe',
		'plugin.general.holy_place',
		'plugin.general.place',
		'plugin.general.point',
		'plugin.general.school',
		'plugin.general.service_data'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BdDistrict = ClassRegistry::init('General.BdDistrict');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BdDistrict);

		parent::tearDown();
	}

}

<?php
App::uses('Hospital', 'Information.Model');

/**
 * Hospital Test Case
 *
 */
class HospitalTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.hospital',
		'plugin.information.point',
		'plugin.information.hospital_category',
		'plugin.information.doctor'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Hospital = ClassRegistry::init('Information.Hospital');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Hospital);

		parent::tearDown();
	}

}

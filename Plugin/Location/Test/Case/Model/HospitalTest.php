<?php
App::uses('Hospital', 'Location.Model');

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
		'plugin.location.hospital',
		'plugin.location.point',
		'plugin.location.hospital_category',
		'plugin.location.doctor'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Hospital = ClassRegistry::init('Location.Hospital');
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

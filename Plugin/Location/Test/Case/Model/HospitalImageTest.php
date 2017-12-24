<?php
App::uses('HospitalImage', 'Location.Model');

/**
 * HospitalImage Test Case
 *
 */
class HospitalImageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.location.hospital_image',
		'plugin.location.point'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->HospitalImage = ClassRegistry::init('Location.HospitalImage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->HospitalImage);

		parent::tearDown();
	}

}

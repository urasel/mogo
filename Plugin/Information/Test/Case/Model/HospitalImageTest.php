<?php
App::uses('HospitalImage', 'Information.Model');

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
		'plugin.information.hospital_image',
		'plugin.information.point'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->HospitalImage = ClassRegistry::init('Information.HospitalImage');
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

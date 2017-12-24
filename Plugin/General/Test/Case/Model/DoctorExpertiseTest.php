<?php
App::uses('DoctorExpertise', 'General.Model');

/**
 * DoctorExpertise Test Case
 *
 */
class DoctorExpertiseTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.general.doctor_expertise',
		'plugin.general.doctor'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DoctorExpertise = ClassRegistry::init('General.DoctorExpertise');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DoctorExpertise);

		parent::tearDown();
	}

}

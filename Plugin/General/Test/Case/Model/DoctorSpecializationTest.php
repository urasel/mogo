<?php
App::uses('DoctorSpecialization', 'General.Model');

/**
 * DoctorSpecialization Test Case
 *
 */
class DoctorSpecializationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.general.doctor_specialization',
		'plugin.general.doctor'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DoctorSpecialization = ClassRegistry::init('General.DoctorSpecialization');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DoctorSpecialization);

		parent::tearDown();
	}

}

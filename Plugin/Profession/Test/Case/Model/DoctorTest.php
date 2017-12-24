<?php
App::uses('Doctor', 'Profession.Model');

/**
 * Doctor Test Case
 *
 */
class DoctorTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.profession.doctor',
		'plugin.profession.point',
		'plugin.profession.hospital',
		'plugin.profession.sex',
		'plugin.profession.religion',
		'plugin.profession.doctor_specialization',
		'plugin.profession.doctor_expertise'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Doctor = ClassRegistry::init('Profession.Doctor');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Doctor);

		parent::tearDown();
	}

}

<?php
App::uses('HospitalCategory', 'General.Model');

/**
 * HospitalCategory Test Case
 *
 */
class HospitalCategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.general.hospital_category',
		'plugin.general.hospital'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->HospitalCategory = ClassRegistry::init('General.HospitalCategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->HospitalCategory);

		parent::tearDown();
	}

}

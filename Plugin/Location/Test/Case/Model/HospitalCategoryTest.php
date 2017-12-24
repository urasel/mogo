<?php
App::uses('HospitalCategory', 'Location.Model');

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
		'plugin.location.hospital_category',
		'plugin.location.hospital'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->HospitalCategory = ClassRegistry::init('Location.HospitalCategory');
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

<?php
App::uses('BloodGroup', 'General.Model');

/**
 * BloodGroup Test Case
 *
 */
class BloodGroupTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.general.blood_group',
		'plugin.general.blood_news'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BloodGroup = ClassRegistry::init('General.BloodGroup');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BloodGroup);

		parent::tearDown();
	}

}

<?php
App::uses('BloodDonar', 'Information.Model');

/**
 * BloodDonar Test Case
 *
 */
class BloodDonarTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.blood_donar',
		'plugin.information.user',
		'plugin.information.blood_group',
		'plugin.information.sex',
		'plugin.information.country',
		'plugin.information.zone',
		'plugin.information.bd_division',
		'plugin.information.bd_district',
		'plugin.information.bd_thanas',
		'plugin.information.blood_donation_record'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BloodDonar = ClassRegistry::init('Information.BloodDonar');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BloodDonar);

		parent::tearDown();
	}

}

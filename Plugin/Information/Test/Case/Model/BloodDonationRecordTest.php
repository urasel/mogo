<?php
App::uses('BloodDonationRecord', 'Information.Model');

/**
 * BloodDonationRecord Test Case
 *
 */
class BloodDonationRecordTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.blood_donation_record',
		'plugin.information.blood_donar'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BloodDonationRecord = ClassRegistry::init('Information.BloodDonationRecord');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BloodDonationRecord);

		parent::tearDown();
	}

}

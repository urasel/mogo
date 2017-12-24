<?php
App::uses('UpdateInformation', 'Information.Model');

/**
 * UpdateInformation Test Case
 *
 */
class UpdateInformationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.update_information',
		'plugin.information.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UpdateInformation = ClassRegistry::init('Information.UpdateInformation');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UpdateInformation);

		parent::tearDown();
	}

}

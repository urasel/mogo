<?php
App::uses('UpdateInformation', 'Model');

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
		'app.update_information',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UpdateInformation = ClassRegistry::init('UpdateInformation');
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

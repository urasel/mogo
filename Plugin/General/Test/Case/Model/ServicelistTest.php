<?php
App::uses('Servicelist', 'General.Model');

/**
 * Servicelist Test Case
 *
 */
class ServicelistTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.general.servicelist',
		'plugin.general.service',
		'plugin.general.service_field'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Servicelist = ClassRegistry::init('General.Servicelist');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Servicelist);

		parent::tearDown();
	}

}

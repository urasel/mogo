<?php
App::uses('BdThana', 'General.Model');

/**
 * BdThana Test Case
 *
 */
class BdThanaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.general.bd_thana',
		'plugin.general.bd_district',
		'plugin.general.service_data'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BdThana = ClassRegistry::init('General.BdThana');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BdThana);

		parent::tearDown();
	}

}

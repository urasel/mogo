<?php
App::uses('BdUpozilla', 'General.Model');

/**
 * BdUpozilla Test Case
 *
 */
class BdUpozillaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.general.bd_upozilla',
		'plugin.general.bd_division',
		'plugin.general.bd_district'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BdUpozilla = ClassRegistry::init('General.BdUpozilla');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BdUpozilla);

		parent::tearDown();
	}

}

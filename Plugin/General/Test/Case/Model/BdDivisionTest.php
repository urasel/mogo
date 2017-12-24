<?php
App::uses('BdDivision', 'General.Model');

/**
 * BdDivision Test Case
 *
 */
class BdDivisionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.general.bd_division',
		'plugin.general.bd_district',
		'plugin.general.bd_upozilla',
		'plugin.general.service_data'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BdDivision = ClassRegistry::init('General.BdDivision');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BdDivision);

		parent::tearDown();
	}

}

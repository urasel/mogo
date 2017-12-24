<?php
App::uses('Airport', 'Information.Model');

/**
 * Airport Test Case
 *
 */
class AirportTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.airport',
		'plugin.information.point',
		'plugin.information.place_type',
		'plugin.information.airport_type',
		'plugin.information.continent',
		'plugin.information.country'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Airport = ClassRegistry::init('Information.Airport');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Airport);

		parent::tearDown();
	}

}

<?php
App::uses('Motorcycle', 'Information.Model');

/**
 * Motorcycle Test Case
 *
 */
class MotorcycleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.motorcycle',
		'plugin.information.point',
		'plugin.information.place_type',
		'plugin.information.motorcycle_image',
		'plugin.information.motorcycle_price',
		'plugin.information.motorcycle_specification'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Motorcycle = ClassRegistry::init('Information.Motorcycle');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Motorcycle);

		parent::tearDown();
	}

}

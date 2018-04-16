<?php
App::uses('MotorcycleModel', 'Information.Model');

/**
 * MotorcycleModel Test Case
 *
 */
class MotorcycleModelTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.motorcycle_model',
		'plugin.information.place_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MotorcycleModel = ClassRegistry::init('Information.MotorcycleModel');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MotorcycleModel);

		parent::tearDown();
	}

}

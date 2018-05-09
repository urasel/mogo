<?php
App::uses('MotorcycleSpecification', 'Information.Model');

/**
 * MotorcycleSpecification Test Case
 *
 */
class MotorcycleSpecificationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.motorcycle_specification',
		'plugin.information.motorcycle'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MotorcycleSpecification = ClassRegistry::init('Information.MotorcycleSpecification');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MotorcycleSpecification);

		parent::tearDown();
	}

}

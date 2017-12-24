<?php
App::uses('Animal', 'Information.Model');

/**
 * Animal Test Case
 *
 */
class AnimalTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.animal',
		'plugin.information.point',
		'plugin.information.place_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Animal = ClassRegistry::init('Information.Animal');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Animal);

		parent::tearDown();
	}

}

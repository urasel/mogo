<?php
App::uses('Animal', 'Model');

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
		'app.animal',
		'app.point',
		'app.place_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Animal = ClassRegistry::init('Animal');
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

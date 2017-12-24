<?php
App::uses('Institute', 'Location.Model');

/**
 * Institute Test Case
 *
 */
class InstituteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.location.institute',
		'plugin.location.user',
		'plugin.location.point',
		'plugin.location.place_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Institute = ClassRegistry::init('Location.Institute');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Institute);

		parent::tearDown();
	}

}

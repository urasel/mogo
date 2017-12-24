<?php
App::uses('Institute', 'Information.Model');

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
		'plugin.information.institute',
		'plugin.information.user',
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
		$this->Institute = ClassRegistry::init('Information.Institute');
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

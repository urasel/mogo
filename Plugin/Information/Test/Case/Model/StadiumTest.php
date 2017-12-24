<?php
App::uses('Stadium', 'Information.Model');

/**
 * Stadium Test Case
 *
 */
class StadiumTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.stadium',
		'plugin.information.point',
		'plugin.information.place_type',
		'plugin.information.country',
		'plugin.information.stadium_data'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Stadium = ClassRegistry::init('Information.Stadium');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Stadium);

		parent::tearDown();
	}

}

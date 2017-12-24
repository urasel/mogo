<?php
App::uses('StadiumData', 'Information.Model');

/**
 * StadiumData Test Case
 *
 */
class StadiumDataTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.stadium_data',
		'plugin.information.language',
		'plugin.information.stadium'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->StadiumData = ClassRegistry::init('Information.StadiumData');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StadiumData);

		parent::tearDown();
	}

}

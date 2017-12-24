<?php
App::uses('BabyName', 'Information.Model');

/**
 * BabyName Test Case
 *
 */
class BabyNameTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.baby_name',
		'plugin.information.place_type',
		'plugin.information.sex'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BabyName = ClassRegistry::init('Information.BabyName');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BabyName);

		parent::tearDown();
	}

}

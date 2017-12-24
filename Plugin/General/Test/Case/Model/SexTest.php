<?php
App::uses('Sex', 'General.Model');

/**
 * Sex Test Case
 *
 */
class SexTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.general.sex',
		'plugin.general.doctor'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Sex = ClassRegistry::init('General.Sex');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Sex);

		parent::tearDown();
	}

}

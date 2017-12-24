<?php
App::uses('Religion', 'General.Model');

/**
 * Religion Test Case
 *
 */
class ReligionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.general.religion',
		'plugin.general.doctor'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Religion = ClassRegistry::init('General.Religion');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Religion);

		parent::tearDown();
	}

}

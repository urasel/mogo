<?php
App::uses('Continent', 'General.Model');

/**
 * Continent Test Case
 *
 */
class ContinentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.general.continent',
		'plugin.general.point',
		'plugin.general.place_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Continent = ClassRegistry::init('General.Continent');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Continent);

		parent::tearDown();
	}

}

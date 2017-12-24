<?php
App::uses('Zone', 'General.Model');

/**
 * Zone Test Case
 *
 */
class ZoneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.general.zone',
		'plugin.general.country',
		'plugin.general.boothe',
		'plugin.general.holy_place',
		'plugin.general.hotel',
		'plugin.general.place',
		'plugin.general.point',
		'plugin.general.school'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Zone = ClassRegistry::init('General.Zone');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Zone);

		parent::tearDown();
	}

}

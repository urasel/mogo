<?php
App::uses('Place', 'Information.Model');

/**
 * Place Test Case
 *
 */
class PlaceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.place',
		'plugin.information.user',
		'plugin.information.point',
		'plugin.information.place_type',
		'plugin.information.country',
		'plugin.information.zone',
		'plugin.information.bd_district',
		'plugin.information.bd_thanas'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Place = ClassRegistry::init('Information.Place');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Place);

		parent::tearDown();
	}

}

<?php
App::uses('Place', 'Location.Model');

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
		'plugin.location.place',
		'plugin.location.user',
		'plugin.location.point',
		'plugin.location.place_type',
		'plugin.location.country',
		'plugin.location.zone',
		'plugin.location.bd_district',
		'plugin.location.bd_thanas'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Place = ClassRegistry::init('Location.Place');
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

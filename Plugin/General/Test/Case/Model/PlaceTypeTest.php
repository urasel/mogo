<?php
App::uses('PlaceType', 'General.Model');

/**
 * PlaceType Test Case
 *
 */
class PlaceTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.general.place_type',
		'plugin.general.institute',
		'plugin.general.place',
		'plugin.general.point',
		'plugin.general.quiz_question'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PlaceType = ClassRegistry::init('General.PlaceType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PlaceType);

		parent::tearDown();
	}

}

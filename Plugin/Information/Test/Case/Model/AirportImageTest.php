<?php
App::uses('AirportImage', 'Information.Model');

/**
 * AirportImage Test Case
 *
 */
class AirportImageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.airport_image',
		'plugin.information.point'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AirportImage = ClassRegistry::init('Information.AirportImage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AirportImage);

		parent::tearDown();
	}

}

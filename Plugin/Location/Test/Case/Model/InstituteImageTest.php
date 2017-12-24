<?php
App::uses('InstituteImage', 'Location.Model');

/**
 * InstituteImage Test Case
 *
 */
class InstituteImageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.location.institute_image',
		'plugin.location.point'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->InstituteImage = ClassRegistry::init('Location.InstituteImage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->InstituteImage);

		parent::tearDown();
	}

}

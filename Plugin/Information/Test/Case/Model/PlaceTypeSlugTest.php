<?php
App::uses('PlaceTypeSlug', 'Information.Model');

/**
 * PlaceTypeSlug Test Case
 *
 */
class PlaceTypeSlugTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.place_type_slug',
		'plugin.information.place_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PlaceTypeSlug = ClassRegistry::init('Information.PlaceTypeSlug');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PlaceTypeSlug);

		parent::tearDown();
	}

}

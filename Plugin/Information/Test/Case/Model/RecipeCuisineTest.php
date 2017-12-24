<?php
App::uses('RecipeCuisine', 'Information.Model');

/**
 * RecipeCuisine Test Case
 */
class RecipeCuisineTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.recipe_cuisine',
		'plugin.information.recipe'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RecipeCuisine = ClassRegistry::init('Information.RecipeCuisine');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RecipeCuisine);

		parent::tearDown();
	}

}

<?php
App::uses('Recipe', 'Information.Model');

/**
 * Recipe Test Case
 */
class RecipeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.recipe',
		'plugin.information.point',
		'plugin.information.place_type',
		'plugin.information.recipe_cuisine',
		'plugin.information.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Recipe = ClassRegistry::init('Information.Recipe');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Recipe);

		parent::tearDown();
	}

}

<?php
App::uses('RecipeImage', 'Information.Model');

/**
 * RecipeImage Test Case
 */
class RecipeImageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.recipe_image',
		'plugin.information.recipe'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RecipeImage = ClassRegistry::init('Information.RecipeImage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RecipeImage);

		parent::tearDown();
	}

}

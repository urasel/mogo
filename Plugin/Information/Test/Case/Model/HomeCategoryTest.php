<?php
App::uses('HomeCategory', 'Information.Model');

/**
 * HomeCategory Test Case
 *
 */
class HomeCategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.home_category',
		'plugin.information.home_post'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->HomeCategory = ClassRegistry::init('Information.HomeCategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->HomeCategory);

		parent::tearDown();
	}

}

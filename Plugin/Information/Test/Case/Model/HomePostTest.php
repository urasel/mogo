<?php
App::uses('HomePost', 'Information.Model');

/**
 * HomePost Test Case
 *
 */
class HomePostTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.home_post',
		'plugin.information.home_category'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->HomePost = ClassRegistry::init('Information.HomePost');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->HomePost);

		parent::tearDown();
	}

}

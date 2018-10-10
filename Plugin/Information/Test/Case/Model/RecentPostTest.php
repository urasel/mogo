<?php
App::uses('RecentPost', 'Information.Model');

/**
 * RecentPost Test Case
 *
 */
class RecentPostTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.recent_post'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RecentPost = ClassRegistry::init('Information.RecentPost');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RecentPost);

		parent::tearDown();
	}

}

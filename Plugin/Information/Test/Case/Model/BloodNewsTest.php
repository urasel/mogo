<?php
App::uses('BloodNews', 'Information.Model');

/**
 * BloodNews Test Case
 *
 */
class BloodNewsTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.blood_news',
		'plugin.information.blood_group',
		'plugin.information.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BloodNews = ClassRegistry::init('Information.BloodNews');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BloodNews);

		parent::tearDown();
	}

}

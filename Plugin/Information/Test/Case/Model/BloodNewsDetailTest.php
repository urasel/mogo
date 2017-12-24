<?php
App::uses('BloodNewsDetail', 'Information.Model');

/**
 * BloodNewsDetail Test Case
 *
 */
class BloodNewsDetailTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.blood_news_detail',
		'plugin.information.language',
		'plugin.information.blood_news'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BloodNewsDetail = ClassRegistry::init('Information.BloodNewsDetail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BloodNewsDetail);

		parent::tearDown();
	}

}

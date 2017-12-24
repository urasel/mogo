<?php
App::uses('SubscriberList', 'Information.Model');

/**
 * SubscriberList Test Case
 *
 */
class SubscriberListTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.subscriber_list',
		'plugin.information.sex'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SubscriberList = ClassRegistry::init('Information.SubscriberList');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SubscriberList);

		parent::tearDown();
	}

}

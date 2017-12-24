<?php
App::uses('TopicData', 'Information.Model');

/**
 * TopicData Test Case
 *
 */
class TopicDataTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.topic_data',
		'plugin.information.language',
		'plugin.information.topic'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TopicData = ClassRegistry::init('Information.TopicData');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TopicData);

		parent::tearDown();
	}

}

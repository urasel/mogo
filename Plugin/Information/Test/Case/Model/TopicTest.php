<?php
App::uses('Topic', 'Information.Model');

/**
 * Topic Test Case
 *
 */
class TopicTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.topic',
		'plugin.information.user',
		'plugin.information.point',
		'plugin.information.place_data',
		'plugin.information.topic_data'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Topic = ClassRegistry::init('Information.Topic');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Topic);

		parent::tearDown();
	}

}

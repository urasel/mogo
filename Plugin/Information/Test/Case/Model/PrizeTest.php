<?php
App::uses('Prize', 'Information.Model');

/**
 * Prize Test Case
 *
 */
class PrizeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.prize',
		'plugin.information.point'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Prize = ClassRegistry::init('Information.Prize');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Prize);

		parent::tearDown();
	}

}

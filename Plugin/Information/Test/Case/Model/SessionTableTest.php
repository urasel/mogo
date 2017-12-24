<?php
App::uses('SessionTable', 'Information.Model');

/**
 * SessionTable Test Case
 *
 */
class SessionTableTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.session_table'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SessionTable = ClassRegistry::init('Information.SessionTable');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SessionTable);

		parent::tearDown();
	}

}

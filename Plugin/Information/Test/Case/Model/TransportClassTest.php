<?php
App::uses('TransportClass', 'Information.Model');

/**
 * TransportClass Test Case
 *
 */
class TransportClassTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.transport_class',
		'plugin.information.transport_type',
		'plugin.information.transport_route'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TransportClass = ClassRegistry::init('Information.TransportClass');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TransportClass);

		parent::tearDown();
	}

}

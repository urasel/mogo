<?php
App::uses('TransportClass', 'Transport.Model');

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
		'plugin.transport.transport_class',
		'plugin.transport.transport_type',
		'plugin.transport.transport_route'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TransportClass = ClassRegistry::init('Transport.TransportClass');
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

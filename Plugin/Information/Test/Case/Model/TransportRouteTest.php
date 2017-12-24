<?php
App::uses('TransportRoute', 'Information.Model');

/**
 * TransportRoute Test Case
 */
class TransportRouteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.transport_route',
		'plugin.information.transport_service',
		'plugin.information.country',
		'plugin.information.transport_gallery'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TransportRoute = ClassRegistry::init('Information.TransportRoute');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TransportRoute);

		parent::tearDown();
	}

}

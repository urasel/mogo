<?php
App::uses('TransportService', 'Information.Model');

/**
 * TransportService Test Case
 */
class TransportServiceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.transport_service',
		'plugin.information.point',
		'plugin.information.place_type',
		'plugin.information.transport_type',
		'plugin.information.transport_service_provider',
		'plugin.information.transport_accomodation',
		'plugin.information.transport_route'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TransportService = ClassRegistry::init('Information.TransportService');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TransportService);

		parent::tearDown();
	}

}

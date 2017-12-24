<?php
App::uses('TransportServiceProvider', 'Information.Model');

/**
 * TransportServiceProvider Test Case
 *
 */
class TransportServiceProviderTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.transport_service_provider',
		'plugin.information.transport_type',
		'plugin.information.point',
		'plugin.information.place_type',
		'plugin.information.transport_service'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TransportServiceProvider = ClassRegistry::init('Information.TransportServiceProvider');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TransportServiceProvider);

		parent::tearDown();
	}

}

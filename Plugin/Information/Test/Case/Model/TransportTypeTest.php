<?php
App::uses('TransportType', 'Information.Model');

/**
 * TransportType Test Case
 *
 */
class TransportTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.transport_type',
		'plugin.information.transport_class',
		'plugin.information.transport_service_provider',
		'plugin.information.transport_service',
		'plugin.information.transport_stopage'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TransportType = ClassRegistry::init('Information.TransportType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TransportType);

		parent::tearDown();
	}

}

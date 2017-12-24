<?php
App::uses('TransportRouteSpecification', 'Information.Model');

/**
 * TransportRouteSpecification Test Case
 */
class TransportRouteSpecificationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.transport_route_specification',
		'plugin.information.transport_type',
		'plugin.information.transport_service'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TransportRouteSpecification = ClassRegistry::init('Information.TransportRouteSpecification');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TransportRouteSpecification);

		parent::tearDown();
	}

}

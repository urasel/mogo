<?php
App::uses('TransportAccomodation', 'Information.Model');

/**
 * TransportAccomodation Test Case
 */
class TransportAccomodationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.transport_accomodation',
		'plugin.information.transport_class',
		'plugin.information.transport_service'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TransportAccomodation = ClassRegistry::init('Information.TransportAccomodation');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TransportAccomodation);

		parent::tearDown();
	}

}

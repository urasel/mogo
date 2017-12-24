<?php
App::uses('TransportStopage', 'Information.Model');

/**
 * TransportStopage Test Case
 *
 */
class TransportStopageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.transport_stopage',
		'plugin.information.point',
		'plugin.information.place_type',
		'plugin.information.transport_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TransportStopage = ClassRegistry::init('Information.TransportStopage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TransportStopage);

		parent::tearDown();
	}

}

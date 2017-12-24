<?php
App::uses('TransportGallery', 'Information.Model');

/**
 * TransportGallery Test Case
 *
 */
class TransportGalleryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.transport_gallery',
		'plugin.information.transport_route'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TransportGallery = ClassRegistry::init('Information.TransportGallery');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TransportGallery);

		parent::tearDown();
	}

}

<?php
App::uses('Point', 'Location.Model');

/**
 * Point Test Case
 *
 */
class PointTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.location.point',
		'plugin.location.country',
		'plugin.location.zone',
		'plugin.location.bd_district',
		'plugin.location.bd_thanas',
		'plugin.location.place_type',
		'plugin.location.doctor_image',
		'plugin.location.doctor',
		'plugin.location.hospital_image',
		'plugin.location.hospital',
		'plugin.location.institute_image',
		'plugin.location.institute',
		'plugin.location.place_image',
		'plugin.location.place',
		'plugin.location.tag',
		'plugin.location.topic'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Point = ClassRegistry::init('Location.Point');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Point);

		parent::tearDown();
	}

}

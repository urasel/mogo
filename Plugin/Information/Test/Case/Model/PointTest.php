<?php
App::uses('Point', 'Information.Model');

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
		'plugin.information.point',
		'plugin.information.country',
		'plugin.information.zone',
		'plugin.information.bd_district',
		'plugin.information.bd_thanas',
		'plugin.information.place_type',
		'plugin.information.doctor_image',
		'plugin.information.doctor',
		'plugin.information.hospital_image',
		'plugin.information.hospital',
		'plugin.information.institute_image',
		'plugin.information.institute',
		'plugin.information.place_image',
		'plugin.information.place',
		'plugin.information.tag',
		'plugin.information.topic'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Point = ClassRegistry::init('Information.Point');
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

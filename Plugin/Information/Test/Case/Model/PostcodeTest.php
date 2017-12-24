<?php
App::uses('Postcode', 'Information.Model');

/**
 * Postcode Test Case
 *
 */
class PostcodeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.postcode',
		'plugin.information.place_type',
		'plugin.information.point',
		'plugin.information.country',
		'plugin.information.bd_division',
		'plugin.information.bd_district',
		'plugin.information.bd_thanas'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Postcode = ClassRegistry::init('Information.Postcode');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Postcode);

		parent::tearDown();
	}

}

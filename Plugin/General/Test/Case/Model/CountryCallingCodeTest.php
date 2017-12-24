<?php
App::uses('CountryCallingCode', 'General.Model');

/**
 * CountryCallingCode Test Case
 *
 */
class CountryCallingCodeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.general.country_calling_code',
		'plugin.general.country'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CountryCallingCode = ClassRegistry::init('General.CountryCallingCode');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CountryCallingCode);

		parent::tearDown();
	}

}

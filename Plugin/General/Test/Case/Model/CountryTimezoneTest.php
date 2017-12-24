<?php
App::uses('CountryTimezone', 'General.Model');

/**
 * CountryTimezone Test Case
 *
 */
class CountryTimezoneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.general.country_timezone',
		'plugin.general.country'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CountryTimezone = ClassRegistry::init('General.CountryTimezone');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CountryTimezone);

		parent::tearDown();
	}

}

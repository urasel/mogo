<?php
App::uses('Country', 'General.Model');

/**
 * Country Test Case
 *
 */
class CountryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.general.country',
		'plugin.general.continent',
		'plugin.general.bank',
		'plugin.general.boothe',
		'plugin.general.country_calling_code',
		'plugin.general.country_capital',
		'plugin.general.country_city',
		'plugin.general.country_currency',
		'plugin.general.country_domain',
		'plugin.general.country_timezone',
		'plugin.general.holy_place',
		'plugin.general.hotel',
		'plugin.general.place',
		'plugin.general.point',
		'plugin.general.points_backup',
		'plugin.general.postcode',
		'plugin.general.postofficestwo',
		'plugin.general.profile',
		'plugin.general.school',
		'plugin.general.zone'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Country = ClassRegistry::init('General.Country');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Country);

		parent::tearDown();
	}

}

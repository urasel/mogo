<?php
App::uses('CountryDetail', 'General.Model');

/**
 * CountryDetail Test Case
 *
 */
class CountryDetailTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.general.country_detail',
		'plugin.general.user',
		'plugin.general.country'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CountryDetail = ClassRegistry::init('General.CountryDetail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CountryDetail);

		parent::tearDown();
	}

}

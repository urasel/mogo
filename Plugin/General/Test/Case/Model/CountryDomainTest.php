<?php
App::uses('CountryDomain', 'General.Model');

/**
 * CountryDomain Test Case
 *
 */
class CountryDomainTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.general.country_domain',
		'plugin.general.country'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CountryDomain = ClassRegistry::init('General.CountryDomain');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CountryDomain);

		parent::tearDown();
	}

}

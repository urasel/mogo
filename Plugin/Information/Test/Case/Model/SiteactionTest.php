<?php
App::uses('Siteaction', 'Information.Model');

/**
 * Siteaction Test Case
 *
 */
class SiteactionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.siteaction'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Siteaction = ClassRegistry::init('Information.Siteaction');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Siteaction);

		parent::tearDown();
	}

}

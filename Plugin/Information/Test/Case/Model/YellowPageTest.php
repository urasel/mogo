<?php
App::uses('YellowPage', 'Information.Model');

/**
 * YellowPage Test Case
 */
class YellowPageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.yellow_page',
		'plugin.information.country',
		'plugin.information.point',
		'plugin.information.place_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->YellowPage = ClassRegistry::init('Information.YellowPage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->YellowPage);

		parent::tearDown();
	}

}

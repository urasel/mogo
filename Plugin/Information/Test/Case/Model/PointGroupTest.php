<?php
App::uses('PointGroup', 'Information.Model');

/**
 * PointGroup Test Case
 *
 */
class PointGroupTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.point_group',
		'plugin.information.place_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PointGroup = ClassRegistry::init('Information.PointGroup');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PointGroup);

		parent::tearDown();
	}

}

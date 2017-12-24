<?php
App::uses('BdUnion', 'General.Model');

/**
 * BdUnion Test Case
 *
 */
class BdUnionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.general.bd_union',
		'plugin.general.bd_division',
		'plugin.general.bd_district',
		'plugin.general.bd_thanas'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BdUnion = ClassRegistry::init('General.BdUnion');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BdUnion);

		parent::tearDown();
	}

}

<?php
App::uses('NobelWinner', 'Information.Model');

/**
 * NobelWinner Test Case
 *
 */
class NobelWinnerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.nobel_winner',
		'plugin.information.point',
		'plugin.information.religion',
		'plugin.information.sex',
		'plugin.information.country'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->NobelWinner = ClassRegistry::init('Information.NobelWinner');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->NobelWinner);

		parent::tearDown();
	}

}

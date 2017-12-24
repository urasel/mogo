<?php
App::uses('StadiumImage', 'Information.Model');

/**
 * StadiumImage Test Case
 *
 */
class StadiumImageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.information.stadium_image',
		'plugin.information.point'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->StadiumImage = ClassRegistry::init('Information.StadiumImage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StadiumImage);

		parent::tearDown();
	}

}

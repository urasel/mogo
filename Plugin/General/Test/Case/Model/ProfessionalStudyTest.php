<?php
App::uses('ProfessionalStudy', 'General.Model');

/**
 * ProfessionalStudy Test Case
 *
 */
class ProfessionalStudyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.general.professional_study',
		'plugin.general.professional_education'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ProfessionalStudy = ClassRegistry::init('General.ProfessionalStudy');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProfessionalStudy);

		parent::tearDown();
	}

}

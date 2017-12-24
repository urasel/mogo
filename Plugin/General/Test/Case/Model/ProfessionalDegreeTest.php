<?php
App::uses('ProfessionalDegree', 'General.Model');

/**
 * ProfessionalDegree Test Case
 *
 */
class ProfessionalDegreeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.general.professional_degree',
		'plugin.general.professional_education'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ProfessionalDegree = ClassRegistry::init('General.ProfessionalDegree');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProfessionalDegree);

		parent::tearDown();
	}

}

<?php
App::uses('GeneralAppModel', 'General.Model');
/**
 * ProfessionalStudy Model
 *
 * @property ProfessionalEducation $ProfessionalEducation
 */
class ProfessionalStudy extends GeneralAppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'ProfessionalEducation' => array(
			'className' => 'ProfessionalEducation',
			'foreignKey' => 'professional_study_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}

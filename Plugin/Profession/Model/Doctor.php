<?php
App::uses('ProfessionAppModel', 'Profession.Model');
/**
 * Doctor Model
 *
 * @property Point $Point
 * @property Hospital $Hospital
 * @property Sex $Sex
 * @property Religion $Religion
 * @property DoctorSpecialization $DoctorSpecialization
 * @property DoctorExpertise $DoctorExpertise
 */
class Doctor extends ProfessionAppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'point_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'qualification' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'address' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Point' => array(
			'className' => 'Point',
			'foreignKey' => 'point_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Hospital' => array(
			'className' => 'Hospital',
			'foreignKey' => 'hospital_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Sex' => array(
			'className' => 'Sex',
			'foreignKey' => 'sex_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Religion' => array(
			'className' => 'Religion',
			'foreignKey' => 'religion_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'DoctorSpecialization' => array(
			'className' => 'DoctorSpecialization',
			'foreignKey' => 'doctor_specialization_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'DoctorExpertise' => array(
			'className' => 'DoctorExpertise',
			'foreignKey' => 'doctor_expertise_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

<?php
App::uses('InformationAppModel', 'Information.Model');
/**
 * BloodDonar Model
 *
 * @property User $User
 * @property BloodGroup $BloodGroup
 * @property Sex $Sex
 * @property Country $Country
 * @property Zone $Zone
 * @property BdDivision $BdDivision
 * @property BdDistrict $BdDistrict
 * @property BdThanas $BdThanas
 * @property BloodDonationRecord $BloodDonationRecord
 */
class BloodDonar extends InformationAppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
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
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'BloodGroup' => array(
			'className' => 'BloodGroup',
			'foreignKey' => 'blood_group_id',
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
		'Country' => array(
			'className' => 'Country',
			'foreignKey' => 'country_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Zone' => array(
			'className' => 'Zone',
			'foreignKey' => 'zone_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'BdDivision' => array(
			'className' => 'BdDivision',
			'foreignKey' => 'bd_division_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'BdDistrict' => array(
			'className' => 'BdDistrict',
			'foreignKey' => 'bd_district_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'BdThanas' => array(
			'className' => 'BdThanas',
			'foreignKey' => 'bd_thanas_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'BloodDonationRecord' => array(
			'className' => 'BloodDonationRecord',
			'foreignKey' => 'blood_donar_id',
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

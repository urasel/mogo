<?php
App::uses('GeneralAppModel', 'General.Model');
/**
 * BdUnion Model
 *
 * @property BdDivision $BdDivision
 * @property BdDistrict $BdDistrict
 * @property BdThanas $BdThanas
 */
class BdUnion extends GeneralAppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
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
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
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
}

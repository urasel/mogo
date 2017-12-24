<?php
App::uses('GeneralAppModel', 'General.Model');
/**
 * BdUpozilla Model
 *
 * @property BdDivision $BdDivision
 * @property BdDistrict $BdDistrict
 */
class BdUpozilla extends GeneralAppModel {


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
		)
	);
}

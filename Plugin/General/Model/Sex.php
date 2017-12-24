<?php
App::uses('GeneralAppModel', 'General.Model');
/**
 * Sex Model
 *
 * @property Doctor $Doctor
 */
class Sex extends GeneralAppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Doctor' => array(
			'className' => 'Doctor',
			'foreignKey' => 'sex_id',
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

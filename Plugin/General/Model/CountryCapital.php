<?php
App::uses('GeneralAppModel', 'General.Model');
/**
 * CountryCapital Model
 *
 * @property Country $Country
 */
class CountryCapital extends GeneralAppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Country' => array(
			'className' => 'Country',
			'foreignKey' => 'country_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

<?php
App::uses('InformationAppModel', 'Information.Model');
/**
 * CountryAirportData Model
 *
 * @property Language $Language
 * @property CountryAirport $CountryAirport
 */
class CountryAirportData extends InformationAppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'language_id' => array(
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
		'Language' => array(
			'className' => 'Language',
			'foreignKey' => 'language_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'CountryAirport' => array(
			'className' => 'CountryAirport',
			'foreignKey' => 'country_airport_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

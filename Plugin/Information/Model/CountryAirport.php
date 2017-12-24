<?php
App::uses('InformationAppModel', 'Information.Model');
/**
 * CountryAirport Model
 *
 * @property Point $Point
 * @property PlaceType $PlaceType
 * @property AirportType $AirportType
 * @property Continent $Continent
 * @property Country $Country
 * @property CountryAirportData $CountryAirportData
 */
class CountryAirport extends InformationAppModel {

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
		'Point' => array(
			'className' => 'Point',
			'foreignKey' => 'point_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PlaceType' => array(
			'className' => 'PlaceType',
			'foreignKey' => 'place_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'AirportType' => array(
			'className' => 'AirportType',
			'foreignKey' => 'airport_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Continent' => array(
			'className' => 'Continent',
			'foreignKey' => 'continent_id',
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
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'CountryAirportData' => array(
			'className' => 'CountryAirportData',
			'foreignKey' => 'country_airport_id',
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

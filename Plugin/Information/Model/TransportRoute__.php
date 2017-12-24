<?php
App::uses('InformationAppModel', 'Information.Model');
/**
 * TransportRoute Model
 *
 * @property TransportService $TransportService
 * @property TransportClass $TransportClass
 * @property TransportGallery $TransportGallery
 */
class TransportRoute extends InformationAppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'route_fromid' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'route_toid' => array(
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
		'TransportService' => array(
			'className' => 'TransportService',
			'foreignKey' => 'transport_service_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'FromCountry' => array(
			'className' => 'Country',
			'foreignKey' => 'route_fromcountryid',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ToCountry' => array(
			'className' => 'Country',
			'foreignKey' => 'route_tocountryid',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'RouteFrom' => array(
			'className' => 'BdDistrict',
			'foreignKey' => 'route_fromid',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'RouteTo' => array(
			'className' => 'BdDistrict',
			'foreignKey' => 'route_toid',
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
		'TransportGallery' => array(
			'className' => 'TransportGallery',
			'foreignKey' => 'transport_route_id',
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

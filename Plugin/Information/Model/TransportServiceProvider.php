<?php
App::uses('InformationAppModel', 'Information.Model');
/**
 * TransportServiceProvider Model
 *
 * @property TransportType $TransportType
 * @property Point $Point
 * @property PlaceType $PlaceType
 * @property TransportService $TransportService
 */
class TransportServiceProvider extends InformationAppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'transport_type_id' => array(
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
		'TransportType' => array(
			'className' => 'TransportType',
			'foreignKey' => 'transport_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
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
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'TransportService' => array(
			'className' => 'TransportService',
			'foreignKey' => 'transport_service_provider_id',
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

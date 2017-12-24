<?php
App::uses('InformationAppModel', 'Information.Model');
/**
 * TransportRouteSpecification Model
 *
 * @property TransportType $TransportType
 * @property TransportService $TransportService
 */
class TransportRouteSpecification extends InformationAppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

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
			'foreignKey' => 'transport_route_specification_id',
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

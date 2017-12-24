<?php
App::uses('InformationAppModel', 'Information.Model');
/**
 * TransportRoute Model
 *
 * @property TransportService $TransportService
 * @property Country $Country
 * @property TransportGallery $TransportGallery
 */
class TransportRoute extends InformationAppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

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

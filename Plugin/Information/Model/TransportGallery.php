<?php
App::uses('InformationAppModel', 'Information.Model');
/**
 * TransportGallery Model
 *
 * @property TransportRoute $TransportRoute
 */
class TransportGallery extends InformationAppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'transport_route_id' => array(
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
		'TransportRoute' => array(
			'className' => 'TransportRoute',
			'foreignKey' => 'transport_route_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

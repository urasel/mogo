<?php
App::uses('TransportAppModel', 'Transport.Model');
/**
 * TransportClass Model
 *
 * @property TransportType $TransportType
 * @property TransportRoute $TransportRoute
 */
class TransportClass extends TransportAppModel {

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
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'TransportRoute' => array(
			'className' => 'TransportRoute',
			'foreignKey' => 'transport_class_id',
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

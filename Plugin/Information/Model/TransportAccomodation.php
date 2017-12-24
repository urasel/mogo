<?php
App::uses('InformationAppModel', 'Information.Model');
/**
 * TransportAccomodation Model
 *
 * @property TransportClass $TransportClass
 * @property TransportService $TransportService
 */
class TransportAccomodation extends InformationAppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'transport_routes' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'transport_class_id' => array(
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

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'TransportClass' => array(
			'className' => 'TransportClass',
			'foreignKey' => 'transport_class_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'TransportService' => array(
			'className' => 'TransportService',
			'foreignKey' => 'transport_service_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

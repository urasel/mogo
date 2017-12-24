<?php
App::uses('InformationAppModel', 'Information.Model');
/**
 * Postcode Model
 *
 * @property PlaceType $PlaceType
 * @property Point $Point
 * @property Country $Country
 * @property BdDivision $BdDivision
 * @property BdDistrict $BdDistrict
 * @property BdThanas $BdThanas
 */
class Postcode extends InformationAppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'place_type_id' => array(
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
 /*
	public $belongsTo = array(
		'Point' => array(
			'className' => 'Point',
			'foreignKey' => 'point_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		
	);
*/
}

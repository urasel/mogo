<?php
App::uses('InformationAppModel', 'Information.Model');
/**
 * Point Model
 *
 * @property Country $Country
 * @property Zone $Zone
 * @property BdDistrict $BdDistrict
 * @property BdThanas $BdThanas
 * @property PlaceType $PlaceType
 * @property DoctorImage $DoctorImage
 * @property Doctor $Doctor
 * @property HospitalImage $HospitalImage
 * @property Hospital $Hospital
 * @property InstituteImage $InstituteImage
 * @property Institute $Institute
 * @property PlaceImage $PlaceImage
 * @property Place $Place
 * @property Tag $Tag
 * @property Topic $Topic
 */
class Point extends InformationAppModel {

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
	public $belongsTo = array(
		'Country' => array(
			'className' => 'Country',
			'foreignKey' => 'country_id',
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
		/*
		'Zone' => array(
			'className' => 'Zone',
			'foreignKey' => 'zone_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'BdDistrict' => array(
			'className' => 'BdDistrict',
			'foreignKey' => 'bd_district_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'BdThanas' => array(
			'className' => 'BdThanas',
			'foreignKey' => 'bd_thanas_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		
		*/
	);

/**
 * hasMany associations
 *
 * @var array
 */
 /*
	public $hasMany = array(
		'DoctorImage' => array(
			'className' => 'DoctorImage',
			'foreignKey' => 'point_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Doctor' => array(
			'className' => 'Doctor',
			'foreignKey' => 'point_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'HospitalImage' => array(
			'className' => 'HospitalImage',
			'foreignKey' => 'point_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Hospital' => array(
			'className' => 'Hospital',
			'foreignKey' => 'point_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'InstituteImage' => array(
			'className' => 'InstituteImage',
			'foreignKey' => 'point_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Institute' => array(
			'className' => 'Institute',
			'foreignKey' => 'point_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'PlaceImage' => array(
			'className' => 'PlaceImage',
			'foreignKey' => 'point_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Place' => array(
			'className' => 'Place',
			'foreignKey' => 'point_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Tag' => array(
			'className' => 'Tag',
			'foreignKey' => 'point_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Topic' => array(
			'className' => 'Topic',
			'foreignKey' => 'point_id',
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
	*/
	/*
	public $hasOne = array(
		'Place' => array(
			'className' => 'Place',
			'foreignKey' => 'point_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
	);
	*/
}

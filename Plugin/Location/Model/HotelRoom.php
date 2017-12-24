<?php
App::uses('LocationAppModel', 'Location.Model');
/**
 * HotelRoom Model
 *
 * @property Hotel $Hotel
 * @property HotelRoomCategory $HotelRoomCategory
 */
class HotelRoom extends LocationAppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'hotel_room_category_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'bed' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'price' => array(
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
		'Hotel' => array(
			'className' => 'Hotel',
			'foreignKey' => 'hotel_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'HotelRoomCategory' => array(
			'className' => 'HotelRoomCategory',
			'foreignKey' => 'hotel_room_category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

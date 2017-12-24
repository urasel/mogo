<?php
App::uses('GeneralAppModel', 'General.Model');
/**
 * HotelFacility Model
 *
 * @property HotelDetail $HotelDetail
 */
class HotelFacility extends GeneralAppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'HotelDetail' => array(
			'className' => 'HotelDetail',
			'foreignKey' => 'hotel_facility_id',
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

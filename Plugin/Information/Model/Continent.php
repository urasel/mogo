<?php
App::uses('GeneralAppModel', 'General.Model');
/**
 * Continent Model
 *
 * @property Point $Point
 * @property PlaceType $PlaceType
 */
class Continent extends GeneralAppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


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

<?php
App::uses('InformationAppModel', 'Information.Model');
/**
 * NobelWinner Model
 *
 * @property Point $Point
 * @property Religion $Religion
 * @property Sex $Sex
 * @property Country $Country
 */
class NobelWinner extends InformationAppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Point' => array(
			'className' => 'Point',
			'foreignKey' => 'point_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Religion' => array(
			'className' => 'Religion',
			'foreignKey' => 'religion_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Sex' => array(
			'className' => 'Sex',
			'foreignKey' => 'sex_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Country' => array(
			'className' => 'Country',
			'foreignKey' => 'country_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

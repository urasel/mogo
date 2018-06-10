<?php
App::uses('InformationAppModel', 'Information.Model');
/**
 * Recipe Model
 *
 * @property Point $Point
 * @property PlaceType $PlaceType
 * @property RecipeCuisine $RecipeCuisine
 * @property User $User
 */
class Recipe extends InformationAppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

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
		'PlaceType' => array(
			'className' => 'PlaceType',
			'foreignKey' => 'place_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'RecipeCuisine' => array(
			'className' => 'RecipeCuisine',
			'foreignKey' => 'recipe_cuisine_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	
	public $hasMany = array(
		'RecipeImage' => array(
			'className' => 'RecipeImage',
			'foreignKey' => 'recipe_id',
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

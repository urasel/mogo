<?php
App::uses('AppModel', 'Model');
/**
 * BloodNewsDetail Model
 *
 * @property BloodNews $BloodNews
 */
class BloodNewsDetail extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'BloodNews' => array(
			'className' => 'BloodNews',
			'foreignKey' => 'blood_news_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

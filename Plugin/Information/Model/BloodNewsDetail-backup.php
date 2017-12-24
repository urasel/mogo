<?php
App::uses('InformationAppModel', 'Information.Model');
/**
 * BloodNewsDetail Model
 *
 * @property Language $Language
 * @property BloodNews $BloodNews
 */
class BloodNewsDetail extends InformationAppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Language' => array(
			'className' => 'Language',
			'foreignKey' => 'language_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'BloodNews' => array(
			'className' => 'BloodNews',
			'foreignKey' => 'blood_news_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

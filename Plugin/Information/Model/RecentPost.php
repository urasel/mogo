<?php
App::uses('InformationAppModel', 'Information.Model');
/**
 * RecentPost Model
 *
 */
class RecentPost extends InformationAppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'pointid' => array(
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
}

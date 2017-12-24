<?php
/**
 * BdUnionFixture
 *
 */
class BdUnionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'bd_division_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'bd_district_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'bd_thanas_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'bn_name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'bd_division_id' => 1,
			'bd_district_id' => 1,
			'bd_thanas_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'bn_name' => 'Lorem ipsum dolor sit amet'
		),
	);

}

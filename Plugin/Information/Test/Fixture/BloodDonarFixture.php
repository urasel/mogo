<?php
/**
 * BloodDonarFixture
 *
 */
class BloodDonarFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'bn_name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'blood_group_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 3, 'unsigned' => false),
		'sex_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 1, 'unsigned' => false),
		'date_of_birth' => array('type' => 'date', 'null' => true, 'default' => null),
		'mobile_number' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'land_line_number' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'country_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 3, 'unsigned' => false),
		'zone_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 6, 'unsigned' => false),
		'bd_division_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 7, 'unsigned' => false),
		'bd_district_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'bd_thanas_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'permanent_address' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'updated' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'user_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'bn_name' => 'Lorem ipsum dolor sit amet',
			'blood_group_id' => 1,
			'sex_id' => 1,
			'date_of_birth' => '2016-03-23',
			'mobile_number' => 'Lorem ipsum dolor ',
			'land_line_number' => 'Lorem ipsum dolor ',
			'country_id' => 1,
			'zone_id' => 1,
			'bd_division_id' => 1,
			'bd_district_id' => 1,
			'bd_thanas_id' => 1,
			'permanent_address' => 'Lorem ipsum dolor sit amet',
			'created' => '2016-03-23 17:22:40',
			'updated' => '2016-03-23 17:22:40'
		),
	);

}

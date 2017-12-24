<?php
/**
 * BdUpozillaFixture
 *
 */
class BdUpozillaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'division_bn' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'division_en' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'bd_division_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'district_bn' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'district_en' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'bd_district_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'upozilla_bn' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'upozilla_en' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'upozillaid' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'union_bn' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'union_en' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'unionid' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
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
			'division_bn' => 'Lorem ipsum dolor sit amet',
			'division_en' => 'Lorem ipsum dolor sit amet',
			'bd_division_id' => 1,
			'district_bn' => 'Lorem ipsum dolor sit amet',
			'district_en' => 'Lorem ipsum dolor sit amet',
			'bd_district_id' => 1,
			'upozilla_bn' => 'Lorem ipsum dolor sit amet',
			'upozilla_en' => 'Lorem ipsum dolor sit amet',
			'upozillaid' => 1,
			'union_bn' => 'Lorem ipsum dolor sit amet',
			'union_en' => 'Lorem ipsum dolor sit amet',
			'unionid' => 1
		),
	);

}

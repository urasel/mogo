<?php
/**
 * CountryAirportFixture
 *
 */
class CountryAirportFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'ident' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'point_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'place_type_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4, 'unsigned' => false),
		'airport_type_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 2, 'unsigned' => false),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'seo_name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'lat' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '10,6', 'unsigned' => false),
		'lng' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '10,6', 'unsigned' => false),
		'address' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'elevation_ft' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
		'continent_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 2, 'unsigned' => false),
		'country_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4, 'unsigned' => false),
		'iso_region' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'municipality' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 200, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'scheduled_service' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'gps_code' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'iata_code' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'local_code' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'home_link' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 150, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'web' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 150, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'email' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'mobile' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 30, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'metatag' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'keywords' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'isactive' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'NewIndex1' => array('column' => array('id', 'point_id'), 'unique' => 1),
			'NewIndex2' => array('column' => array('id', 'point_id', 'place_type_id'), 'unique' => 1)
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
			'ident' => 'Lorem ipsum dolor ',
			'point_id' => 1,
			'place_type_id' => 1,
			'airport_type_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'seo_name' => 'Lorem ipsum dolor sit amet',
			'lat' => 1,
			'lng' => 1,
			'address' => 'Lorem ipsum dolor sit amet',
			'elevation_ft' => 1,
			'continent_id' => 1,
			'country_id' => 1,
			'iso_region' => 'Lorem ipsum dolor ',
			'municipality' => 'Lorem ipsum dolor sit amet',
			'scheduled_service' => 1,
			'gps_code' => 'Lorem ipsum dolor ',
			'iata_code' => 'Lorem ip',
			'local_code' => 'Lorem ip',
			'home_link' => 'Lorem ipsum dolor sit amet',
			'web' => 'Lorem ipsum dolor sit amet',
			'email' => 'Lorem ipsum dolor sit amet',
			'mobile' => 'Lorem ipsum dolor sit amet',
			'metatag' => 'Lorem ipsum dolor sit amet',
			'keywords' => 'Lorem ipsum dolor sit amet',
			'isactive' => 1
		),
	);

}

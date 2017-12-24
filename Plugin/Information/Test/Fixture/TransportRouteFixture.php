<?php
/**
 * TransportRoute Fixture
 */
class TransportRouteFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'transport_service_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'country_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'bn_name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'route_fromcountryid' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'route_fromid' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'route_tocountryid' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'route_toid' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'route_from' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 200, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'route_to' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 200, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'route_details' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'fare' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'seo_name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'off_day' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 200, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'departure_time' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'distance' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 200, 'collate' => 'utf8_unicode_ci', 'comment' => 'distance in km', 'charset' => 'utf8'),
		'estimated_reach_time' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'isactive' => array('type' => 'boolean', 'null' => true, 'default' => null),
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
			'transport_service_id' => 1,
			'country_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'bn_name' => 'Lorem ipsum dolor sit amet',
			'route_fromcountryid' => 1,
			'route_fromid' => 1,
			'route_tocountryid' => 1,
			'route_toid' => 1,
			'route_from' => 'Lorem ipsum dolor sit amet',
			'route_to' => 'Lorem ipsum dolor sit amet',
			'route_details' => 'Lorem ipsum dolor sit amet',
			'fare' => 'Lorem ipsum dolor sit amet',
			'seo_name' => 'Lorem ipsum dolor sit amet',
			'off_day' => 'Lorem ipsum dolor sit amet',
			'departure_time' => 'Lorem ipsum dolor sit amet',
			'distance' => 'Lorem ipsum dolor sit amet',
			'estimated_reach_time' => 'Lorem ipsum dolor sit amet',
			'isactive' => 1
		),
	);

}

<?php
/**
 * TransportAccomodation Fixture
 */
class TransportAccomodationFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'transport_routes' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'transport_class_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'transport_service_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'fare' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'images' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
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
			'transport_routes' => 'Lorem ipsum dolor sit amet',
			'transport_class_id' => 1,
			'transport_service_id' => 1,
			'fare' => 'Lorem ipsum dolor sit amet',
			'images' => 'Lorem ipsum dolor sit amet',
			'isactive' => 1
		),
	);

}

<?php
/**
 * TransportRouteSpecification Fixture
 */
class TransportRouteSpecificationFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'transport_type_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 222, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'bn_name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 222, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'seo_name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 222, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
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
			'transport_type_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'bn_name' => 'Lorem ipsum dolor sit amet',
			'seo_name' => 'Lorem ipsum dolor sit amet'
		),
	);

}

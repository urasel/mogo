<?php
/**
 * HotelRoomFixture
 *
 */
class HotelRoomFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'hotel_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'hotel_room_category_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'room_size' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'bed' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'hotel_views' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 222, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'room_features' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 222, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'rules_conditions' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 222, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'offers' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 222, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'price' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false),
		'number' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
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
			'hotel_id' => 1,
			'hotel_room_category_id' => 1,
			'room_size' => 'Lorem ipsum dolor sit amet',
			'bed' => 1,
			'hotel_views' => 'Lorem ipsum dolor sit amet',
			'room_features' => 'Lorem ipsum dolor sit amet',
			'rules_conditions' => 'Lorem ipsum dolor sit amet',
			'offers' => 'Lorem ipsum dolor sit amet',
			'price' => 1,
			'number' => 1
		),
	);

}

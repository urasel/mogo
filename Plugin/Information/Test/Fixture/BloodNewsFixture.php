<?php
/**
 * BloodNewsFixture
 *
 */
class BloodNewsFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'blood_group_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 1, 'unsigned' => false, 'comment' => 'O(+ve) Blood'),
		'required_date' => array('type' => 'date', 'null' => true, 'default' => null, 'comment' => 'Need in 2nd December'),
		'quantity' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '4,1', 'unsigned' => false, 'comment' => '2 Bag Needed'),
		'mobile' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'utf8_unicode_ci', 'comment' => 'Contact Mobile Number', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => 'Post Date'),
		'updated' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => 'Date Changed'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'comment' => 'Posting User ID'),
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
			'blood_group_id' => 1,
			'required_date' => '2015-08-31',
			'quantity' => 1,
			'mobile' => 'Lorem ipsum dolor ',
			'created' => '2015-08-31 17:53:48',
			'updated' => '2015-08-31 17:53:48',
			'user_id' => 1,
			'isactive' => 1
		),
	);

}

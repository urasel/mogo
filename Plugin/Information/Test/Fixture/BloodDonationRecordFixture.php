<?php
/**
 * BloodDonationRecordFixture
 *
 */
class BloodDonationRecordFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'blood_donar_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'patient_name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'bag' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2', 'unsigned' => false),
		'donation_date' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'hospital' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 200, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'patient_phone' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'patient_address' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 200, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'updated' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'isactive' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'id' => array('column' => 'id', 'unique' => 1)
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
			'blood_donar_id' => 1,
			'patient_name' => 'Lorem ipsum dolor sit amet',
			'bag' => 1,
			'donation_date' => '2016-03-23 18:30:31',
			'hospital' => 'Lorem ipsum dolor sit amet',
			'patient_phone' => 'Lorem ipsum dolor sit amet',
			'patient_address' => 'Lorem ipsum dolor sit amet',
			'created' => '2016-03-23 18:30:31',
			'updated' => '2016-03-23 18:30:31',
			'isactive' => 1
		),
	);

}

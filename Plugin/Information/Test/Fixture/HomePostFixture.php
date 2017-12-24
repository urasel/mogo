<?php
/**
 * HomePostFixture
 *
 */
class HomePostFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => false, 'key' => 'primary'),
		'home_category_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => false),
		'pointid' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'point_seoname' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'classid' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'class_bntitle' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'class_title' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'class_metatag' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'class_image' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'placetype_icon' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'placetype_pluralname' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'placetype_seoname' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'publishdate' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'unpublishdate' => array('type' => 'datetime', 'null' => true, 'default' => null),
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
			'home_category_id' => 1,
			'pointid' => 1,
			'point_seoname' => 'Lorem ipsum dolor sit amet',
			'classid' => 1,
			'class_bntitle' => 'Lorem ipsum dolor sit amet',
			'class_title' => 'Lorem ipsum dolor sit amet',
			'class_metatag' => 'Lorem ipsum dolor sit amet',
			'class_image' => 'Lorem ipsum dolor sit amet',
			'placetype_icon' => 'Lorem ipsum dolor sit amet',
			'placetype_pluralname' => 'Lorem ipsum dolor sit amet',
			'placetype_seoname' => 'Lorem ipsum dolor sit amet',
			'publishdate' => '2016-01-01 19:22:17',
			'unpublishdate' => '2016-01-01 19:22:17',
			'isactive' => 1
		),
	);

}

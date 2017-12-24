<?php

CroogoNav::add('sidebar', 'content.children.generalsetting', array(
	'icon' => 'cog',
	'title' => __d('croogo', 'General Settings'),
	'url' => array(
		'admin' => true,
		'plugin' => 'general',
		'controller' => 'countries',
		'action' => 'index',
		'Site',
	),
	'children' => array(
		'countries' => array(
			'title' => __d('croogo', 'Locations'),
			'url' => array(
				'admin' => true,
				'plugin' => 'general',
				'controller' => 'continents',
				'action' => 'index',
				'Site',
			),
			'weight' => 10,
			'children' => array(
				'airporttypes' => array(
					'title' => __d('croogo', 'Airport Types'),
					'url' => array(
						'admin' => true,
						'plugin' => 'general',
						'controller' => 'airport_types',
						'action' => 'index',
						'Site',
					),
					'weight' => 10,
					
					
				),
				'continents' => array(
					'title' => __d('croogo', 'Continents'),
					'url' => array(
						'admin' => true,
						'plugin' => 'general',
						'controller' => 'continents',
						'action' => 'index',
						'Site',
					),
					'weight' => 10,
					
					
				),
				'countries' => array(
					'title' => __d('croogo', 'Countries'),
					'url' => array(
						'admin' => true,
						'plugin' => 'general',
						'controller' => 'countries',
						'action' => 'index',
						'Site',
					),
					'weight' => 10,
					
					
				),
				'bddivision' => array(
					'title' => __d('croogo', 'Divisions'),
					'url' => array(
						'admin' => true,
						'plugin' => 'general',
						'controller' => 'bd_divisions',
						'action' => 'index',
						'Site',
					),
					'weight' => 20,
				),
				'bddistrict' => array(
					'title' => __d('croogo', 'Districts'),
					'url' => array(
						'admin' => true,
						'plugin' => 'general',
						'controller' => 'bd_districts',
						'action' => 'index',
						'Site',
					),
					'weight' => 30,
				),
				'bdthanas' => array(
					'title' => __d('croogo', 'Thanas'),
					'url' => array(
						'admin' => true,
						'plugin' => 'general',
						'controller' => 'bd_thanas',
						'action' => 'index',
						'Site',
					),
					'weight' => 40,
				),
				'bdthanas' => array(
					'title' => __d('croogo', 'Thanas'),
					'url' => array(
						'admin' => true,
						'plugin' => 'general',
						'controller' => 'bd_thanas',
						'action' => 'index',
						'Site',
					),
					'weight' => 50,
				),
				'bdupozillas' => array(
					'title' => __d('croogo', 'Upozillas'),
					'url' => array(
						'admin' => true,
						'plugin' => 'general',
						'controller' => 'bd_upozillas',
						'action' => 'index',
						'Site',
					),
					'weight' => 50,
				),
				'zones' => array(
					'title' => __d('croogo', 'Zones'),
					'url' => array(
						'admin' => true,
						'plugin' => 'general',
						'controller' => 'zones',
						'action' => 'index',
						'Site',
					),
					'weight' => 50,
				),

			),
			
		),
		'countryinfo' => array(
			'title' => __d('croogo', 'Country Information'),
			'url' => array(
				'admin' => true,
				'plugin' => 'general',
				'controller' => 'country_capitals',
				'action' => 'index',
				'Site',
			),
			'weight' => 10,
			'children' => array(
				'capitals' => array(
					'title' => __d('croogo', 'Capitals'),
					'url' => array(
						'admin' => true,
						'plugin' => 'general',
						'controller' => 'country_capitals',
						'action' => 'index',
						'Site',
					),
					'weight' => 10,
					
					
				),
				'airports' => array(
					'title' => __d('croogo', 'Airports'),
					'url' => array(
						'admin' => true,
						'plugin' => 'information',
						'controller' => 'country_airports',
						'action' => 'index',
						'Site',
					),
					'weight' => 10,
					
					
				),
				'currencies' => array(
					'title' => __d('croogo', 'Currencies'),
					'url' => array(
						'admin' => true,
						'plugin' => 'general',
						'controller' => 'country_currencies',
						'action' => 'index',
						'Site',
					),
					'weight' => 10,
					
					
				),
				'callingCodes' => array(
					'title' => __d('croogo', 'Calling Code'),
					'url' => array(
						'admin' => true,
						'plugin' => 'general',
						'controller' => 'country_calling_codes',
						'action' => 'index',
						'Site',
					),
					'weight' => 10,
					
					
				),
				'timeZones' => array(
					'title' => __d('croogo', 'Time Zones'),
					'url' => array(
						'admin' => true,
						'plugin' => 'general',
						'controller' => 'country_timezones',
						'action' => 'index',
						'Site',
					),
					'weight' => 10,
					
					
				),
				'cities' => array(
					'title' => __d('croogo', 'Cities'),
					'url' => array(
						'admin' => true,
						'plugin' => 'general',
						'controller' => 'country_cities',
						'action' => 'index',
						'Site',
					),
					'weight' => 10,
					
					
				),
				'countryDetails' => array(
					'title' => __d('croogo', 'Country Details'),
					'url' => array(
						'admin' => true,
						'plugin' => 'general',
						'controller' => 'country_details',
						'action' => 'index',
						'Site',
					),
					'weight' => 10,
					
					
				),
			),
		),
		'currencies' => array(
			'title' => __d('croogo', 'Currency Price'),
			'url' => array(
				'admin' => true,
				'plugin' => 'general',
				'controller' => 'currencies',
				'action' => 'index',
				'Site',
			),
			'weight' => 10,
		),
		'religions' => array(
			'title' => __d('croogo', 'Religions'),
			'url' => array(
				'admin' => true,
				'plugin' => 'general',
				'controller' => 'religions',
				'action' => 'index',
				'Site',
			),
			'weight' => 20,
		),
		'bloodgroups' => array(
			'title' => __d('croogo', 'Blood Groups'),
			'url' => array(
				'admin' => true,
				'plugin' => 'general',
				'controller' => 'blood_groups',
				'action' => 'index',
				'Site',
			),
			'weight' => 20,
		),
		'sexes' => array(
			'title' => __d('croogo', 'Sex'),
			'url' => array(
				'admin' => true,
				'plugin' => 'general',
				'controller' => 'sexes',
				'action' => 'index',
				'Site',
			),
			'weight' => 30,
		),
		'placetypes' => array(
			'title' => __d('croogo', 'Post Item Categories'),
			'url' => array(
				'admin' => true,
				'plugin' => 'general',
				'controller' => 'place_types',
				'action' => 'index',
				'Site',
			),
			'weight' => 40,
		),
		'professional' => array(
			'title' => __d('croogo', 'Professional Setting'),
			'url' => array(
				'admin' => true,
				'plugin' => 'general',
				'controller' => 'services',
				'action' => 'index',
				'Site',
			),
			'children' => array(
					'servicelists' => array(
						'title' => __d('croogo', 'Service Lists'),
						'url' => array(
							'admin' => true,
							'plugin' => 'general',
							'controller' => 'servicelists',
							'action' => 'index',
							'Site',
						),
						'weight' => 10,
					),
					'professionalstudy' => array(
						'title' => __d('croogo', 'Professional Studies'),
						'url' => array(
							'admin' => true,
							'plugin' => 'general',
							'controller' => 'professional_studies',
							'action' => 'index',
							'Site',
						),
						'weight' => 20,
					),
					'professionaldegree' => array(
						'title' => __d('croogo', 'Professional Degrees'),
						'url' => array(
							'admin' => true,
							'plugin' => 'general',
							'controller' => 'professional_degrees',
							'action' => 'index',
							'Site',
						),
						'weight' => 30,
					),
					'doctorexpertise' => array(
						'title' => __d('croogo', 'Doctor Expertises'),
						'url' => array(
							'admin' => true,
							'plugin' => 'general',
							'controller' => 'doctor_expertises',
							'action' => 'index',
							'Site',
						),
						'weight' => 40,
					),
					'doctorspecialization' => array(
						'title' => __d('croogo', 'Doctor Specializations'),
						'url' => array(
							'admin' => true,
							'plugin' => 'general',
							'controller' => 'doctor_specializations',
							'action' => 'index',
							'Site',
						),
						'weight' => 50,
					),
			)
		),
		'hotelsettings' => array(
			'title' => __d('croogo', 'Hotel Setting'),
			'url' => array(
				'admin' => true,
				'plugin' => 'general',
				'controller' => 'hotel_categories',
				'action' => 'index',
				'Site',
			),
			'children' => array(
					'hotelscategory' => array(
						'title' => __d('croogo', 'Hotel Categories'),
						'url' => array(
							'admin' => true,
							'plugin' => 'general',
							'controller' => 'hotel_categories',
							'action' => 'index',
							'Site',
						),
						'weight' => 10,
					),
					'hotelfacilities' => array(
						'title' => __d('croogo', 'Hotel Facilities'),
						'url' => array(
							'admin' => true,
							'plugin' => 'general',
							'controller' => 'hotel_facilities',
							'action' => 'index',
							'Site',
						),
						'weight' => 20,
					),
					'hotelextrafacility' => array(
						'title' => __d('croogo', 'Hotel Extra Facilities'),
						'url' => array(
							'admin' => true,
							'plugin' => 'general',
							'controller' => 'hotel_extra_facilities',
							'action' => 'index',
							'Site',
						),
						'weight' => 30,
					),
					'hotelroomtypes' => array(
						'title' => __d('croogo', 'Hotel Room Types'),
						'url' => array(
							'admin' => true,
							'plugin' => 'general',
							'controller' => 'hotel_rooms',
							'action' => 'index',
							'Site',
						),
						'weight' => 40,
					),
					
			)
		),
		'hospitalsettings' => array(
			'title' => __d('croogo', 'Hospital Setting'),
			'url' => array(
				'admin' => true,
				'plugin' => 'general',
				'controller' => 'hospital_categories',
				'action' => 'index',
				'Site',
			),
			'children' => array(
					'hospitalcategory' => array(
						'title' => __d('croogo', 'Hospital Categories'),
						'url' => array(
							'admin' => true,
							'plugin' => 'general',
							'controller' => 'hospital_categories',
							'action' => 'index',
							'Site',
						),
						'weight' => 10,
					),
					
					
			)
		),
		

	),
));

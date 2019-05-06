<?php

CroogoNav::add('sidebar', 'content.children.informationupload', array(
	'icon' => 'cog',
	'title' => __d('croogo', 'All Uploads'),
	'url' => array(
		'admin' => true,
		'plugin' => 'information',
		'controller' => 'points',
		'action' => 'index',
	),
	'children' => array(
		
		'homemanagement' => array(
			'title' => __d('croogo', 'Home Post'),
			'url' => array(
				'admin' => true,
				'plugin' => 'information',
				'controller' => 'home_categories',
				'action' => 'index',
				'Site',
			),
			'weight' => 10,
			'children' => array(
				'homecategories' => array(
					'title' => __d('croogo', 'Home Post categories'),
					'url' => array(
						'admin' => true,
						'plugin' => 'information',
						'controller' => 'home_categories',
						'action' => 'index',
						'Site',
					),
					'weight' => 10,
					
					
				),
				'homeposts' => array(
					'title' => __d('croogo', 'Home Posts'),
					'url' => array(
						'admin' => true,
						'plugin' => 'information',
						'controller' => 'home_posts',
						'action' => 'index',
						'Site',
					),
					'weight' => 10,
					
					
				),
			),
		),
		'recipemanagement' => array(
			'title' => __d('croogo', 'Recipe Details'),
			'url' => array(
				'admin' => true,
				'plugin' => 'information',
				'controller' => 'recipes',
				'action' => 'index',
				'Site',
			),
			'weight' => 10,
			'children' => array(
				'recipes' => array(
					'title' => __d('croogo', 'Recipes'),
					'url' => array(
						'admin' => true,
						'plugin' => 'information',
						'controller' => 'recipes',
						'action' => 'index',
						'Site',
					),
					'weight' => 10,
					
					
				),
				'recipecategories' => array(
					'title' => __d('croogo', 'Recipe Categories'),
					'url' => array(
						'admin' => true,
						'plugin' => 'general',
						'controller' => 'place_types',
						'action' => 'recipe_category',
						'Site',
					),
					'weight' => 10,
					
					
				),
				'recipecuisines' => array(
					'title' => __d('croogo', 'Recipe Cuisines'),
					'url' => array(
						'admin' => true,
						'plugin' => 'information',
						'controller' => 'recipe_cuisines',
						'action' => 'index',
						'Site',
					),
					'weight' => 10,
					
					
				),
			),
		),
		'transportmanagement' => array(
			'title' => __d('croogo', 'Transport'),
			'weight' => 10,
			'children' => array(
				'transportroutes' => array(
					'title' => __d('croogo', 'Routes'),
					'url' => array(
						'admin' => true,
						'plugin' => 'information',
						'controller' => 'transport_routes',
						'action' => 'index',
						'Site',
					),
					'weight' => 10,
					
					
				),
				'transportservices' => array(
					'title' => __d('croogo', 'Services'),
					'url' => array(
						'admin' => true,
						'plugin' => 'information',
						'controller' => 'transport_services',
						'action' => 'index',
						'Site',
					),
					'weight' => 10,
					
					
				),
				'transportserviceprovider' => array(
					'title' => __d('croogo', 'Service Provider'),
					'url' => array(
						'admin' => true,
						'plugin' => 'information',
						'controller' => 'transport_service_providers',
						'action' => 'index',
						'Site',
					),
					'weight' => 10,
					
					
				),
				'transporttypes' => array(
					'title' => __d('croogo', 'Transport Type'),
					'url' => array(
						'admin' => true,
						'plugin' => 'information',
						'controller' => 'transport_types',
						'action' => 'index',
						'Site',
					),
					'weight' => 10,
					
					
				),
				'transportclasses' => array(
					'title' => __d('croogo', 'Transport Class'),
					'url' => array(
						'admin' => true,
						'plugin' => 'information',
						'controller' => 'transport_classes',
						'action' => 'index',
						'Site',
					),
					'weight' => 10,
					
					
				),
			),
		),
		'areainfo' => array(
			'title' => __d('croogo', 'Locations'),
			'url' => array(
				'admin' => true,
				'plugin' => 'information',
				'controller' => 'locations',
				'action' => 'index',
			),
			'weight' => 10,
		),
		'areainfo' => array(
			'title' => __d('croogo', 'Blood News'),
			'url' => array(
				'admin' => true,
				'plugin' => 'information',
				'controller' => 'blood_news',
				'action' => 'index',
			),
			'weight' => 10,
		),
		'allpoints' => array(
			'title' => __d('croogo', 'All Point'),
			'url' => array(
				'admin' => true,
				'plugin' => 'information',
				'controller' => 'points',
				'action' => 'index',
			),
			'weight' => 10,
		),
		'allpointsupdate' => array(
			'title' => __d('croogo', 'Update Wise Point List'),
			'url' => array(
				'admin' => true,
				'plugin' => 'information',
				'controller' => 'points',
				'action' => 'updatewiselist',
			),
			'weight' => 10,
		),
		'newpoints' => array(
			'title' => __d('croogo', 'New Point'),
			'url' => array(
				'admin' => true,
				'plugin' => 'information',
				'controller' => 'points',
				'action' => 'addpoint',
			),
			'weight' => 10,
		),
		'newtopics' => array(
			'title' => __d('croogo', 'New Topic'),
			'url' => array(
				'admin' => true,
				'plugin' => 'information',
				'controller' => 'points',
				'action' => 'topicadd',
			),
			'weight' => 10,
		),
		'user_feedback' => array(
			'title' => __d('croogo', 'User Feedback'),
			'url' => array(
				'admin' => true,
				'plugin' => 'information',
				'controller' => 'update_informations',
				'action' => 'index',
			),
			'weight' => 10,
		),
		'updatecache' => array(
			'title' => __d('croogo', 'Update Cache Data'),
			'url' => array(
				'admin' => true,
				'plugin' => 'information',
				'controller' => 'points',
				'action' => 'cachestate',
			),
			'weight' => 10,
		),
		

	),
));

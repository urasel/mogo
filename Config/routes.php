<?php

App::uses('CroogoRouter', 'Croogo.Lib');
CroogoRouter::routes();
Router::parseExtensions();
Router::setExtensions(array('json', 'rss'));
CroogoRouter::localize();
	Router::connect('/social_login/:site', array('plugin'=>'users','controller' => 'users', 'action' => 'social_login'),array('pass' => 'site'));
	Router::connect('/social_endpoint', array('plugin'=>'users','controller' => 'users', 'action' => 'social_endpoint'));
	Router::connect('/fblogin', array('plugin'=>'users','controller' => 'users', 'action' => 'fblogin'),array('pass' => 'site'));
	Router::connect('/fb_login', array('plugin'=>'users','controller' => 'users', 'action' => 'fb_login'),array('pass' => 'language'));
	Router::connect('/googlelogin', array('plugin'=>'users','controller' => 'users', 'action' => 'googlelogin'),array('pass' => 'language'));
	Router::connect('/google_login', array('plugin'=>'users','controller' => 'users', 'action' => 'google_login'),array('pass' => 'language'));
	Router::connect('/forgot-password', array('plugin'=>'users','controller' => 'users', 'action' => 'forgot'),array('pass' => 'language'));
	Router::connect('/reset-password', array('plugin'=>'users','controller' => 'users', 'action' => 'reset'),array('pass' => 'language'));
	Router::connect('/logout', array('plugin'=>'users','controller' => 'users', 'action' => 'logout'));
	Router::connect('/fbcallback', array('controller' => 'users', 'action' => 'fbcallback'));
	
	Router::connect('/:language/sitemap.asp', array('plugin'=>'information','controller' => 'siteactions', 'action' => 'sitemap'),array('pass' => 'language'));
	Router::connect('/sitemap.asp', array('plugin'=>'information','controller' => 'siteactions', 'action' => 'sitemap'),array('pass' => 'language'));
	Router::connect('/:language/:country/sitemap.asp', array('plugin'=>'information','controller' => 'siteactions', 'action' => 'sitemap'),array('pass' => array('language','country')));
	
	Router::connect('/:language/searchitem', array('plugin'=>'information','controller' => 'siteactions', 'action' => 'searchitem'),array('pass' => array('language')));
	Router::connect('/:language/searchitem/1/:string', 
                     array('plugin'=>'information','controller' => 'siteactions', 'action'=>'searchitem'), 
                     array(
					 'pass' => array('string','language'),	
					 ));
	Router::connect('/:language/searchitem/:page/:string', 
                     array('plugin'=>'information','controller' => 'siteactions', 'action'=>'searchitem'), 
                     array(
					 'pass' => array('string','page','language'),
					 ));
	Router::connect('/:language/contactus', array('plugin'=>'information','controller' => 'siteactions', 'action' => 'contact'),array('pass' => 'language'));
	/*
	Router::connect('/:language/aboutus', array('plugin'=>'information','controller' => 'siteactions', 'action' => 'aboutus'),array('pass' => 'language'));
	Router::connect('/:language/terms_condition', array('plugin'=>'information','controller' => 'siteactions', 'action' => 'terms_condition'),array('pass' => 'language'));
	Router::connect('/:language/privacy_policy', array('plugin'=>'information','controller' => 'siteactions', 'action' => 'privacy_policy'),array('pass' => 'language'));
	*/
	Router::connect('/:language/aboutus', array('plugin'=>'nodes','controller' => 'nodes', 'action' => 'view','type'=>'page','slug'=>'aboutus'),array('pass' => 'language','slug'));
	Router::connect('/:language/terms_condition', array('plugin'=>'nodes','controller' => 'nodes', 'action' => 'view','type'=>'page','slug'=>'terms_condition'),array('pass' => 'language','slug'));
	Router::connect('/:language/privacy_policy', array('plugin'=>'nodes','controller' => 'nodes', 'action' => 'view','type'=>'page','slug'=>'privacy_policy'),array('pass' => 'language','slug'));
	Router::connect('/:language/subscriber_add', array('plugin'=>'information','controller' => 'subscriber_lists', 'action' => 'subscription'));
	//Router::connect('/category/*', array('controller' => 'pages', 'action' => 'categories'));
	Router::connect('/item/*', array('controller' => 'pages', 'action' => 'categoryitem'));
	Router::connect('/direction/*', array('controller' => 'pages', 'action' => 'mappath'));
	Router::connect('/add_location/*', array('controller' => 'pages', 'action' => 'choseplace'));
	Router::connect('/placesearch', array('controller' => 'points', 'action' => 'placesearch'));
	Router::connect('/placetype', array('controller' => 'places', 'action' => 'placetype'));
	Router::connect('/add', array('controller' => 'places', 'action' => 'add'));
	Router::connect('/admin_add', array('controller' => 'places', 'action' => 'admin_add'));
	Router::connect('/currentplace', array('controller' => 'places', 'action' => 'myside'));
	Router::connect('/savedplaces', array('controller' => 'places', 'action' => 'savedplaces'));
	Router::connect('/changelanguage/:language', array('plugin'=>'information','controller' => 'siteactions', 'action' => 'changeLanguage'),array('pass'=> array('language')));
	Router::connect('/locate/:catname', 
                     array('plugin'=>'information','controller'=>'siteactions', 'action'=>'locate'),
					 array('pass' => array('catname')));
	
	Router::connect('/:language/point/:country/:category/:point/:id', 
                     array('plugin'=>'information','controller'=>'siteactions', 'action'=>'infos'), 
                     array('pass' => array('category', 'point','id','language','couontry')));
	Router::connect('/point/:country/:category/:point/:id', 
                     array('plugin'=>'information','controller'=>'siteactions', 'action'=>'infos'), 
                     array('pass' => array('category', 'point','id','language','couontry')));
	Router::connect('/:language/point/:category/:point/:id', 
                     array('plugin'=>'information','controller'=>'siteactions', 'action'=>'infos'), 
                     array('pass' => array('category', 'point','id','language','couontry')));
					 
	/*
	Router::connect('/:language/:category/:point/:id', 
                     array('plugin'=>'information','controller'=>'siteactions', 'action'=>'infos'), 
                     array('pass' => array('category', 'point','id','language','couontry')));
	*/
	Router::connect('/:language/section/:category/:itemgroup/:point/:id', 
                     array('plugin'=>'information','controller'=>'siteactions', 'action'=>'bucket'), 
                     array('pass' => array('category', 'point','id','language','itemgroup')));
	Router::connect('/:language/world', 
                     array('plugin'=>'information','controller'=>'siteactions', 'action'=>'world'));				 
	Router::connect('/:language/continents/:category/:point/:id', 
                     array('plugin'=>'information','controller'=>'siteactions', 'action'=>'countries'), 
                     array('pass' => array('category', 'point','id','language')));
	Router::connect('/:language/country/:category/:title/:id', 
                     array('plugin'=>'information','controller'=>'siteactions', 'action'=>'country_details'), 
                     array('pass' => array('category', 'title','id','language')));
					 
	Router::connect('/:language/topic/:category/:point/:id', 
                     array('plugin'=>'information','controller'=>'siteactions', 'action'=>'topic'), 
                     array('pass' => array('category', 'point','id','language')));
					 
	Router::connect('/:language/largemap/:category/:point/:id', 
                     array('plugin'=>'information','controller'=>'siteactions', 'action'=>'map'), 
                     array('pass' => array('category', 'point','id','language')));
	Router::connect('/:language/pathdirection/:class/:point/:id', 
                     array('plugin'=>'information','controller'=>'siteactions', 'action'=>'mappath'), 
                     array('pass' => array('class', 'point','id','language')));
	
	Router::connect('/:language/category/:country/:category/:id', 
                     array('plugin'=>'information','controller' => 'siteactions', 'action'=>'categories'), 
                     array(
					 'pass' => array('id','category','language','country'),	
					 ));
	
					 /*
	Router::connect('/:language/category/:country/1/:category/:character/:id', 
                     array('plugin'=>'information','controller' => 'siteactions', 'action'=>'categories'), 
                     array(
					 'pass' => array('id','category','language','character','country'),	
					 ));
	Router::connect('/:language/category/:country/:page/:category/:character/:id', 
                     array('plugin'=>'information','controller' => 'siteactions', 'action'=>'categories'), 
                     array(
					 'pass' => array('id','category','page','language','character','country'),
					 ));
	*/
	/****************************************************************************/
	Router::connect('/:language/category/1/:category/:id', 
                     array('plugin'=>'information','controller' => 'siteactions', 'action'=>'categories'), 
                     array(
					 'pass' => array('id','category','language'),	
					 ));
	Router::connect('/:language/category/:page/:category/:id', 
                     array('plugin'=>'information','controller' => 'siteactions', 'action'=>'categories'), 
                     array(
					 'pass' => array('id','category','page','language'),
					 ));
	Router::connect('/:language/category/1/:category/:character/:id', 
                     array('plugin'=>'information','controller' => 'siteactions', 'action'=>'categories'), 
                     array(
					 'pass' => array('id','category','language','character'),	
					 ));
	Router::connect('/:language/category/:page/:category/:character/:id', 
                     array('plugin'=>'information','controller' => 'siteactions', 'action'=>'categories'), 
                     array(
					 'pass' => array('id','category','page','language','character'),
					 ));
					 
					 
	/****************************************************************************/
	
	
	Router::connect('/:language/subcategories/:country/:category/:id', 
                     array('plugin'=>'information','controller' => 'siteactions', 'action'=>'subcategories'), 
                     array(
					 'pass' => array('id','category','language','country'),	
					 ));
	Router::connect('/:language/subcategories/:country/:page/:category/:id', 
                     array('plugin'=>'information','controller' => 'siteactions', 'action'=>'subcategories'), 
                     array(
					 'pass' => array('id','category','page','language','country'),
					 ));
	Router::connect('/:language/subcategories/:country/1/:category/:character/:id', 
                     array('plugin'=>'information','controller' => 'siteactions', 'action'=>'subcategories'), 
                     array(
					 'pass' => array('id','category','language','character','country'),	
					 ));
	Router::connect('/:language/subcategories/:country/:page/:category/:character/:id', 
                     array('plugin'=>'information','controller' => 'siteactions', 'action'=>'subcategories'), 
                     array(
					 'pass' => array('id','category','page','language','character','country'),
					 ));
	/********************************************************************/
	Router::connect('/:language/subcategories/1/:category/:id', 
                     array('plugin'=>'information','controller' => 'siteactions', 'action'=>'subcategories'), 
                     array(
					 'pass' => array('id','category','language'),	
					 ));
	Router::connect('/:language/subcategories/:page/:category/:id', 
                     array('plugin'=>'information','controller' => 'siteactions', 'action'=>'subcategories'), 
                     array(
					 'pass' => array('id','category','page','language'),
					 ));
	Router::connect('/:language/subcategories/1/:category/:character/:id', 
                     array('plugin'=>'information','controller' => 'siteactions', 'action'=>'subcategories'), 
                     array(
					 'pass' => array('id','category','language','character'),	
					 ));
	Router::connect('/:language/subcategories/:page/:category/:character/:id', 
                     array('plugin'=>'information','controller' => 'siteactions', 'action'=>'subcategories'), 
                     array(
					 'pass' => array('id','category','page','language','character'),
					 ));
	/********************************************************************/
	
	Router::connect('/:language/tags/:country/:institutetype/:seotitle/:page/:id', 
                     array('plugin'=>'information','controller' => 'siteactions', 'action'=>'tags'), 
                     array(
					 'pass' => array('id','institutetype','seotitle','country'),
					 ));
					 
	Router::connect('/:language/tags/:country/:institutetype/:seotitle/:id', 
                     array('plugin'=>'information','controller' => 'siteactions', 'action'=>'tags'), 
                     array(
					 'pass' => array('id','institutetype','seotitle','country'),
					 ));
	
	Router::connect('/:language/tags/:country/:division/:institutetype/:seotitle/:page/:id', 
                     array('plugin'=>'information','controller' => 'siteactions', 'action'=>'tags'), 
                     array(
					 'pass' => array('id','institutetype','seotitle','country','division'),
					 ));
	
	Router::connect('/:language/tags/:country/:division/:institutetype/:seotitle/:id', 
                     array('plugin'=>'information','controller' => 'siteactions', 'action'=>'tags'), 
                     array(
					 'pass' => array('id','institutetype','seotitle','country','division'),
					 ));
					 
	Router::connect('/:language/tags/:country/:division/:district/:institutetype/:seotitle/:page/:id', 
                     array('plugin'=>'information','controller' => 'siteactions', 'action'=>'tags'), 
                     array(
					 'pass' => array('id','institutetype','seotitle','country','division','district'),
					 ));
					
	Router::connect('/:language/tags/:country/:division/:district/:institutetype/:seotitle/:id', 
                     array('plugin'=>'information','controller' => 'siteactions', 'action'=>'tags'), 
                     array(
					 'pass' => array('id','institutetype','seotitle','country','division','district'),
					 ));
					 
	Router::connect('/:language/tags/:country/:division/:district/:thana/:institutetype/:seotitle/:page/:id', 
                     array('plugin'=>'information','controller' => 'siteactions', 'action'=>'tags'), 
                     array(
					 'pass' => array('id','institutetype','seotitle','country','division','district','thana'),
					 ));	
					 
	Router::connect('/:language/tags/:country/:division/:district/:thana/:institutetype/:seotitle/:id', 
                     array('plugin'=>'information','controller' => 'siteactions', 'action'=>'tags'), 
                     array(
					 'pass' => array('id','institutetype','seotitle','country','division','district','thana'),
					 ));
					 
	Router::connect('/en/page/:category/:id', 
                     array('controller'=>'pages', 'action'=>'categories'), 
                     array('pass' => array('id')));
					 
	Router::connect('/blood_information/:id', 
                     array('plugin'=>'information','controller'=>'blood_news', 'action'=>'view'), 
                     array('pass' => array('id')));
					 
	Router::connect('/all_blood_infos/:params', 
                     array('plugin'=>'information','controller'=>'blood_news', 'action'=>'listing'),
					 array('pass' => array('params')));
	Router::connect('/blood_infos/:params', 
                     array('plugin'=>'information','controller'=>'blood_news', 'action'=>'add'),
					 array('pass' => array('params')));

	Router::connect('/likeplace', 
                     array('plugin'=>'information','controller'=>'siteactions', 'action'=>'getPlaces'));
	Router::connect('/locate', 
                     array('plugin'=>'information','controller'=>'siteactions', 'action'=>'locate'));
	Router::connect('/path', 
                     array('plugin'=>'information','controller'=>'siteactions', 'action'=>'direction')
					 ,array('lat' => 'lat','lng' => 'lng','plat' => 'plat','plng' => 'plng','record' => 'record','addr' => 'addr'));
	Router::connect('/getlocation', 
                     array('plugin'=>'general','controller'=>'bd_thanas', 'action'=>'getLocation'));				 
	Router::connect('/:language/info_contribution', 
                     array('plugin'=>'information','controller'=>'update_informations', 'action'=>'add'));	
	Router::connect('/robotchecker', 
                     array('plugin'=>'information','controller'=>'subcategories', 'action'=>'subcategories'));	
					 
					 
					 
	//Business Section Routing Start
	
	Router::connect('/motorcycles', 
                     array('plugin'=>'information','controller' => 'motorcycles', 'action'=>'motorcycles'),
					 array('pass' => array('id')));	
					 
	Router::connect('/:service/:category/info/:id', 
                     array('plugin'=>'information','controller' => 'siteactions', 'action'=>'categories'), 
                     array(
					 'pass' => array('id','category','service'),
					 ));	
	/*
	Router::connect('/:service/:category/:page/:id', 
                     array('plugin'=>'information','controller' => 'siteactions', 'action'=>'categories'), 
                     array(
					 'pass' => array('id','category','page','service'),
					 ));
	*/			
	Router::connect('/sort/:category/:page/:character/:id', 
                     array('plugin'=>'information','controller' => 'siteactions', 'action'=>'categories'), 
                     array(
					 'pass' => array('id','category','page','service','character'),
					 ));
				
	Router::connect('/:language/:service/:country/:category/:point/:id', 
                     array('plugin'=>'information','controller'=>'siteactions', 'action'=>'infos'), 
                     array('pass' => array('category', 'point','id','language','couontry','service')));
			 
	Router::connect('/:service/:category/:point/:id', 
                     array('plugin'=>'information','controller'=>'siteactions', 'action'=>'infos'), 
                     array('pass' => array('category', 'point','id','couontry')));
						 
	//Business Section Routing End
	
	
	//CroogoRouter::connect('/login', array('plugin' => 'users', 'controller' => 'users', 'action' => 'login'));
	CroogoRouter::connect('/login', array('plugin' => 'users', 'controller' => 'users', 'action' => 'login'),array('pass' => 'language'));
	CroogoRouter::connect('/logout', array('plugin' => 'users', 'controller' => 'users', 'action' => 'logout'),array('pass' => 'language'));
	CroogoRouter::connect('/admin_login', array('admin' => true,'plugin' => 'users', 'controller' => 'users', 'action' => 'login'));
	CroogoRouter::connect('/admin_logout', array('admin' => true,'plugin' => 'users', 'controller' => 'users', 'action' => 'logout'),array('pass' => 'language'));
CroogoRouter::connect('/register', array('plugin' => 'users', 'controller' => 'users', 'action' => 'add'));
CroogoRouter::connect('/:language/reset', array('plugin' => 'users', 'controller' => 'users', 'action' => 'reset'),array('pass' => 'language'));
require CAKE . 'Config' . DS . 'routes.php';

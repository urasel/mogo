<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	//Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	//Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */

	//Router::connect('/', array('controller' => 'pages', 'action' => 'locate'));
	Router::connect('/', array('controller' => 'pages', 'action' => 'home'));
	Router::connect('/login', array('controller' => 'users', 'action' => 'login'));
	Router::connect('/fbcallback', array('controller' => 'users', 'action' => 'fbcallback'));
	Router::connect('/sitemap.asp', array('controller' => 'pages', 'action' => 'sitemap'));
	Router::connect('/searchitem/*', array('controller' => 'points', 'action' => 'searchitem'));
	Router::connect('/contact', array('controller' => 'pages', 'action' => 'contact'));
	Router::connect('/about', array('controller' => 'pages', 'action' => 'aboutus'));
	Router::connect('/terms_condition', array('controller' => 'pages', 'action' => 'terms_condition'));
	Router::connect('/privacy_policy', array('controller' => 'pages', 'action' => 'privacy_policy'));
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
			 
	Router::connect('/:language/point/:category/:point/:id', 
                     array('controller'=>'points', 'action'=>'view'), 
                     array('pass' => array('category', 'point','id')));
					 
	Router::connect('/:language/topic/:category/:point/:id', 
                     array('controller'=>'points', 'action'=>'topic'), 
                     array('pass' => array('category', 'point','id')));
					 
	Router::connect('/:language/largemap/:category/:point/:id', 
                     array('controller'=>'points', 'action'=>'map'), 
                     array('pass' => array('category', 'point','id')));
					 
	Router::connect('/:language/category/:category/:id', 
                     array('controller'=>'pages', 'action'=>'categories'), 
                     array('pass' => array('id','category')));
					 
	Router::connect('/en/page/:category/:id', 
                     array('controller'=>'pages', 'action'=>'categories'), 
                     array('pass' => array('id')));
					 
	Router::connect('/:language/blood_information/:id', 
                     array('controller'=>'blood_news', 'action'=>'view'), 
                     array('pass' => array('id')));
					 
	Router::connect('/:language/blood_news/:params', 
                     array('controller'=>'blood_news', 'action'=>'listing'),
					 array('pass' => array('language','params')));

	Router::connect('/getplace', 
                     array('controller'=>'points', 'action'=>'getPlaces'));
	Router::connect('/getlocation', 
                     array('controller'=>'bd_thanas', 'action'=>'getLocation'));	
					 
	// Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'index'));
	
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	//Router::connect('/pages/home', array('controller' => 'pages', 'action' => 'display'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';

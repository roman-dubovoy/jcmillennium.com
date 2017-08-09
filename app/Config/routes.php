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
	Router::mapResources('users');
	Router::parseExtensions('json');

	/*App pages for simple users*/
	Router::connect('/', ['controller' => 'pages', 'action' => 'home']);
	Router::connect('/home', ['controller' => 'pages', 'action' => 'home']);
	Router::connect('/club', ['controller' => 'pages', 'action' => 'club']);
	Router::connect('/news', ['controller' => 'posts', 'action' => 'index']);
	Router::connect('/results', ['controller' => 'posts', 'action' => 'results']);
	Router::connect('/coaches', ['controller' => 'coaches', 'action' => 'index']);
	Router::connect('/athletes/page/:page', ['controller' => 'athletes', 'action' => 'index'],
			['pass' => ['page'], 'page' => '\\d+']);
	Router::connect('/contacts', ['controller' => 'pages', 'action' => 'contacts']);

	/*Routes for sidebar*/
	Router::connect('/judo', ['controller' => 'pages', 'action' => 'judo']);
	Router::connect('/emblem', ['controller' => 'pages', 'action' => 'emblem']);
	Router::connect('/gallery', ['controller' => 'pages', 'action' => 'emblem']);
	Router::connect('/videos', ['controller' => 'pages', 'action' => 'emblem']);
	Router::connect('/calendar', ['controller' => 'pages', 'action' => 'emblem']);
	Router::connect('/schedule', ['controller' => 'pages', 'action' => 'emblem']);
	Router::connect('/exams', ['controller' => 'pages', 'action' => 'emblem']);

	//Router::connect('/registration', ['controller' => 'users', 'action' => 'add']);
	Router::connect('/handleContactsForm', ['controller' => 'feedbacks', 'action' => 'handleContactsForm']);

	//Router::connect('/products', ['controller' => 'products', 'action' => 'index']);
	//Router::connect('/products/category/:group_id', ['controller' => 'products', 'action' => 'filteredList'], ['group_id' => '\\d+']);

	//Router::connect('/bucket', ['controller' => 'buckets', 'action' => 'view']);
	//Router::connect('/bucket/add', ['controller' => 'buckets', 'action' => 'add']);
	//Router::connect('/bucket/delete/:id', ['controller' => 'buckets', 'action' => 'delete'], ['id' => '\\d+']);

	/*App pages for admin*/
	Router::connect('/admin/login', ['controller' => 'users', 'action' => 'adminLogin']);
	Router::connect('/admin/logout', ['controller' => 'users', 'action' => 'adminLogout']);

	Router::connect('/admin', ['controller' => 'coaches', 'action' => 'coachesList']);

	Router::connect('/admin/posts', ['controller' => 'posts', 'action' => 'postsList']);
	Router::connect('/admin/posts/page/:page', ['controller' => 'posts', 'action' => 'postsList'],
		['pass' => ['page'], 'page' => '\\d+']);
	Router::connect('/admin/posts/addPost', ['controller' => 'posts', 'action' => 'addPost']);
	Router::connect('/admin/posts/editPost/:id', ['controller' => 'posts', 'action' => 'editPost'], ['id' => '\\d+']);
	Router::connect('/admin/posts/deletePost/:id', ['controller' => 'posts', 'action' => 'deletePost'], ['id' => '\\d+']);

	Router::connect('/admin/coaches', ['controller' => 'coaches', 'action' => 'coachesList']);
	Router::connect('/admin/coaches/addCoach', ['controller' => 'coaches', 'action' => 'addCoach']);
	Router::connect('/admin/coaches/editCoach/:id', ['controller' => 'coaches', 'action' => 'editCoach'], ['id' => '\\d+']);
	Router::connect('/admin/coaches/deleteCoach/:id', ['controller' => 'coaches', 'action' => 'deleteCoach'], ['id' => '\\d+']);

	Router::connect('/admin/athletes', ['controller' => 'athletes', 'action' => 'athletesList']);
	Router::connect('/admin/athletes/page/:page', ['controller' => 'athletes', 'action' => 'athletesList'],
					['pass' => ['page'], 'page' => '\\d+']);
	Router::connect('/admin/athletes/addAthlete', ['controller' => 'athletes', 'action' => 'addAthlete']);
	Router::connect('/admin/athletes/editAthlete/:id', ['controller' => 'athletes', 'action' => 'editAthlete'], ['id' => '\\d+']);
	Router::connect('/admin/athletes/deleteAthlete/:id', ['controller' => 'athletes', 'action' => 'deleteAthlete'], ['id' => '\\d+']);

	Router::connect('/admin/users', ['controller' => 'users', 'action' => 'usersList']);
	Router::connect('/admin/user/:id', ['controller' => 'users', 'action' => 'viewUser'], ['id' => '\\d+']);
	Router::connect('/admin/user/edit/:id', ['controller' => 'users', 'action' => 'editUser'], ['id' => '\\d+']);
	Router::connect('/admin/user/delete/:id', ['controller' => 'users', 'action' => 'deleteUser'], ['id' => '\\d+']);

	Router::connect('/admin/productGroups', ['controller' => 'products', 'action' => 'productGroupsList']);
	Router::connect('/admin/productGroups/add', ['controller' => 'products', 'action' => 'addProductGroup']);
	Router::connect('/admin/productGroup/edit/:id', ['controller' => 'products', 'action' => 'editProductGroup'], ['id' => '\\d+']);
	Router::connect('/admin/productGroup/delete/:id', ['controller' => 'products', 'action' => 'deleteProductGroup', 'admin' => true], ['id' => '\\d+']);

	Router::connect('/admin/products', ['controller' => 'products', 'action' => 'productsList']);
	Router::connect('/admin/products/add', ['controller' => 'products', 'action' => 'addProduct']);
	Router::connect('/admin/product/edit/:id', ['controller' => 'products', 'action' => 'editProduct'], ['id' => '\\d+']);
	Router::connect('/admin/product/delete/:id', ['controller' => 'products', 'action' => 'deleteProduct'], ['id' => '\\d+']);

/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

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

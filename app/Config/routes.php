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

	Router::connect('/', array('controller' => 'news', 'action' => 'index'));
	Router::connect('/home', array('controller' => 'news', 'action' => 'index'));
	Router::connect('/contacts', array('controller' => 'pages', 'action' => 'contacts'));
	Router::connect('/registration', ['controller' => 'users', 'action' => 'add']);

	Router::connect('/handleContactsForm', ['controller' => 'feedbacks', 'action' => 'handleContactsForm']);

	Router::connect('/products', ['controller' => 'products', 'action' => 'index']);
	Router::connect('/products/category/:group_id', ['controller' => 'products', 'action' => 'filteredList'], ['group_id' => '\\d+']);

	Router::connect('/bucket', ['controller' => 'buckets', 'action' => 'view']);
	Router::connect('/bucket/add', ['controller' => 'buckets', 'action' => 'add']);
	Router::connect('/bucket/delete/:id', ['controller' => 'buckets', 'action' => 'delete'], ['id' => '\\d+']);

	Router::connect('/admin', ['controller' => 'admins', 'action' => 'index']);
	Router::connect('/admin/panel', ['controller' => 'admins', 'action' => 'index']);
	Router::connect('/admin/athletes', ['controller' => 'admins', 'action' => 'athletesList']);
	Router::connect('/admin/coaches', ['controller' => 'admins', 'action' => 'coachesList']);

	Router::connect('/admins/users', ['controller' => 'admins', 'action' => 'usersList']);
	Router::connect('/admins/user/:id', ['controller' => 'admins', 'action' => 'viewUser'], ['id' => '\\d+']);
	Router::connect('/admins/user/edit/:id', ['controller' => 'admins', 'action' => 'editUser'], ['id' => '\\d+']);
	Router::connect('/admins/user/delete/:id', ['controller' => 'admins', 'action' => 'deleteUser'], ['id' => '\\d+']);

	Router::connect('/admins/productGroups', ['controller' => 'admins', 'action' => 'productGroupsList']);
	Router::connect('/admins/productGroups/add', ['controller' => 'admins', 'action' => 'addProductGroup']);
	Router::connect('/admins/productGroup/edit/:id', ['controller' => 'admins', 'action' => 'editProductGroup'], ['id' => '\\d+']);
	Router::connect('/admins/productGroup/delete/:id', ['controller' => 'admins', 'action' => 'deleteProductGroup'], ['id' => '\\d+']);

	Router::connect('/admins/products', ['controller' => 'admins', 'action' => 'productsList']);
	Router::connect('/admins/products/add', ['controller' => 'admins', 'action' => 'addProduct']);
	Router::connect('/admins/product/edit/:id', ['controller' => 'admins', 'action' => 'editProduct'], ['id' => '\\d+']);
	Router::connect('/admins/product/delete/:id', ['controller' => 'admins', 'action' => 'deleteProduct'], ['id' => '\\d+']);



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

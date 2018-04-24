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
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
	$routes->extensions(['json','xml']);
$routes->resources('Topics');
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */

    // Product
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);
    $routes->connect('/index/',['controller'=>'Products','action'=>'index']);
    $routes->connect('/addProduct/',['controller'=>'Products','action'=>'addProduct']);
    $routes->connect('/editProduct/*',['controller'=>'Products','action'=>'editProduct']);
    $routes->connect('/typeProduct/*',['controller'=>'Products','action'=>'typeProduct']);
    $routes->connect('/getSearch/*',['controller'=>'Products','action'=>'getSearch']);
    $routes->connect('/detailProduct/*',['controller'=>'Products','action'=>'detailProduct']);   
    $routes->connect('/postCheckout/',['controller'=>'Products','action'=>'postCheckout']);
    $routes->connect('/getNew/',['controller'=>'Products','action'=>'getNew']);
    $routes->connect('/updateQuantity/',['controller'=>'Products','action'=>'updateQuantity']);
    $routes->connect('/order/',['controller'=>'Products','action'=>'order']);
    $routes->connect('/listCustomer/',['controller'=>'Products','action'=>'listCustomer']);
    $routes->connect('/viewMoreProduct/*',['controller'=>'Products','action'=>'viewMoreProduct']);
    $routes->connect('/sort/*',['controller'=>'Products','action'=>'sort']);
    $routes->connect('/billDetail/*',['controller'=>'Products','action'=>'billDetail']);
    $routes->connect('/getAddToCart/*',['controller'=>'Products','action'=>'getAddToCart']);
    $routes->connect('/customerBill/*',['controller'=>'Products','action'=>'customerBill']);
    $routes->connect('/updateStatus/*',['controller'=>'Products','action'=>'updateStatus']);
    
    


    // User
    $routes->connect('/contact/',['controller'=>'Users','action'=>'contact']);
    $routes->connect('/listUser/',['controller'=>'Users','action'=>'listUser']);
    $routes->connect('/login/',['controller'=>'Users','action'=>'login']);
    $routes->connect('/detailUser/*',['controller'=>'Users','action'=>'detailUser']);
    $routes->connect('/editUser/*',['controller'=>'Users','action'=>'editUser']);
    $routes->connect('/addUser/',['controller'=>'Users','action'=>'addUser']);
    $routes->connect('/forgetPass/',['controller'=>'Users','action'=>'forgetPass']);
    $routes->connect('/introducttion/',['controller'=>'Users','action'=>'introducttion']);

    // News
     $routes->connect('/news/',['controller'=>'News','action'=>'news']);
     $routes->connect('/editNews/*',['controller'=>'News','action'=>'editNews']);
     $routes->connect('/addnews/',['controller'=>'News','action'=>'addnews']);
     $routes->connect('/detailNews/',['controller'=>'News','action'=>'detailNews']);
     $routes->connect('/listNews/',['controller'=>'News','action'=>'listNews']);

    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks('DashedRoute');
});


/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();

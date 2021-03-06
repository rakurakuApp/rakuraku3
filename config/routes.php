<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
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
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);
    $routes->connect('/login', ['controller' => 'Login', 'action' => 'login']);
    /**
     * login routing
     **/
    $routes->connect('/logout', ['controller' => 'Login', 'action' => 'logout']);
    /**
     * logout routing
     **/
    $routes->connect('/login/forget/success', ['controller' => 'Login', 'action' => 'success']);
    /**
     * success routing
     */
    $routes->connect('/user/photolist', ['controller' => 'common', 'action' => 'photolist']);
    /**
     * reset routing
     */
    $routes->connect('/common/inquirysend', ['controller' => 'Common', 'action' => 'inquirysend']);
    /**
     * reset routing
     */
    $routes->connect('/resetCheck', ['controller' => 'user', 'action' => 'resetCheck']);
    /**
     * passchange routing
     */
    $routes->connect('/user/passChange', ['controller' => 'user', 'action' => 'passChange']);

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
    //問合わせ詳細画面
    $routes->connect(
        '/inquirydetail/:number',
        ['controller'=>'manager','action'=>'inquirydetail'],
        ['number'=>'\d+']
    );
    //問合わせ変更
    $routes->connect(
        '/inquirydetailphotohide/:updatanam/:photosID',
        ['controller'=>'manager','action'=>'inquirydetailphotohide'],
        ['updetanam'=>'\d+']
    );
    //ユーザ情報表示画面
    $routes->connect(
        '/individualinfo/:id',
        ['controller' => 'account', 'action'=> 'individualinfo'],
        ['id' => '\d+']
    );
    //ユーザ情報表示画面(アカウント削除チェック更新アクション)
    $routes->connect(
        '/editrecord/:editNum',
        ['controller' => 'account', 'action'=> 'editrecord'],
        ['editNum' => '\d+']
    );
    //ユーザ情報表示画面(ユーザ情報更新アクション)
    $routes->connect(
        '/reloadPatronDelete/:deleteNum',
        ['controller' => 'account', 'action'=> 'reloadPatronDelete'],
        ['deleteNum' => '\d+']
    );
    $routes->fallbacks(DashedRoute::class);
});
/**
 * Load all plugin routes. See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
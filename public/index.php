<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 8/20/18
 * Time: 3:52 PM
 */

use Core\Router;

/**
 * Front Controller
 *
 * PHP 7.2.1
 */

/**
 * Composer
 */
require '../vendor/autoload.php';

/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

/**
 * Routing
 */
$router = new Router();
// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
//$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
//$router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}', ['namespace' => "Admin"]);
$router->dispatch($_SERVER['QUERY_STRING']);
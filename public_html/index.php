<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 8/20/18
 * Time: 3:52 PM
 */
/**
 * Front Controller
 *
 * PHP 7.2.1
 */

/**
 * Routing
 */
require '../core/Router.php';
$router = new Router();

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
//$router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);
$router->add('{controller}/{action}');
//$router->add('admin/{action}/{controller}');
$router->add('{controller}/{id:\d+}/{action}');

// Display routing table
echo '<pre>';
//	var_dump($router->getRoutes());
echo htmlspecialchars(print_r($router->getRoutes(), true));
echo '<pre>';

// Match the requested route
$url = $_SERVER['QUERY_STRING'];

if ($router->match($url)) {
	echo '<pre>';
	var_dump($router->getParams());
	echo '</pre>';
} else {
	echo "No route found for URL '$url'";
}
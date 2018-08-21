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
 * Twig
 */
require_once dirname(__DIR__) . '/vendor/autoload.php';
/**
 * Autoloader
 */
spl_autoload_register(function ($class) {
	$root = dirname(__DIR__); // get the parent directory
	$file = $root . '/' . str_replace('\\', '/', $class) . '.php';
	if (is_readable($file))
	{
		require $root . '/' . str_replace('\\', '/', $class) . '.php';
	}
});
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
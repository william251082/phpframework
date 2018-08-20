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

//echo 'Requested URL = "' . $_SERVER['QUERY_STRING'] . '"';

/**
 * Routing
 */
require '../core/Router.php';

$router = new Router();

echo get_class($router);
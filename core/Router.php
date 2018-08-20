<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 8/20/18
 * Time: 4:08 PM
 */

/**
 * Class Router
 */
class Router
{
	/**
	 * Associative array of routes (the routing table)
	 * @var array
	 */
	protected $routes = [];
	/**
	 * Parameters from matched route
	 * @var array
	 */
	protected $params = [];

	/**
	 * Add a route to the routing table
	 *
	 * @param string $route  The route URL
	 * @param array  $params Parameters (controller, action, etc.)
	 *
	 * @return void
	 */
	public function add($route, $params)
	{
		$this->routes[$route] = $params;
	}

	/**
	 * Get all the routes from the routing table
	 *
	 * @return array
	 */
	public function getRoutes()
	{
		return $this->routes;
	}

	/**
	 * Match the route to the  routes in the routing table, setting the $params
	 * property if the route is found
	 *
	 * @param string $url The route URL
	 *
	 * @return boolean true if match found, false otherwise
	 */
	public function match($url)
	{
		// Match the fixed URL format /controller/action
		$reg_exp = "/^(?P<controller>[a-z-]+)\/(?P<action>[a-z-]+)$/";

		if (preg_match($reg_exp, $url, $matches))
		{
			// Get named captured group values
			$params = [];
			foreach ($matches as $key => $match)
			{
				if (is_string($key))
				{
					$params[$key] = $match;
				}
			}

			$this->params = $params;
			return true;
		}
		return false;
	}

	/**
	 * Get the currently matched parameters
	 *
	 * @return array
	 */
	public function getParams()
	{
		return $this->params;
	}
}
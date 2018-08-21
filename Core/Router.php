<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 8/20/18
 * Time: 4:08 PM
 */

namespace Core;

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
	public function add($route, $params = [])
	{
		// Convert the route to a regular expression: escape forward slashes
		$route = preg_replace('/\//', '\\/', $route);
		// Convert variables e.g. {controller}
		$route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);
		// Convert variables with custom regular expressions e.g. {id:\d+}
		$route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);
		// Add start and end delimiters, and case insensitive flag
		$route = '/^' . $route . '$/i';
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
	 * Get the currently matched parameters
	 *
	 * @return array
	 */
	public function getParams()
	{
		return $this->params;
	}

	/**
	 * Dispatch the route, creating the controller object and running the
	 * action method
	 *
	 * @param string $url The route URL
	 *
	 * @return void
	 */
	public function dispatch($url)
	{
		if ($this->match($url))
		{
			$controller = $this->params['controller'];
			$controller = $this->convertToStudlyCaps($controller);
			$controller = "App\Controllers\\$controller";
			if (class_exists($controller))
			{
				$controller_object = new $controller();
				$action            = $this->params['action'];
				$action            = $this->convertToCamelCase($action);
				if (is_callable([$controller_object, $action]))
				{
					$controller_object->$action();
				}
				else
				{
					echo "Method $action (in controller $controller) not found";
				}
			}
		}
		else
		{
			echo "No route matched";
		}
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
//		// Match the fixed URL format /controller/action
//		$reg_exp = "/^(?P<controller>[a-z-]+)\/(?P<action>[a-z-]+)$/";
		foreach ($this->routes as $route => $params)
		{
			if (preg_match($route, $url, $matches))
			{
				// Get named captured group values
//				$params = [];
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
		}

		return false;
	}

	/**
	 * Convert the string with hyphens to StudlyCaps,
	 * e.g. post-authors => PostAuthors
	 *
	 * @param string $string The string to convert
	 *
	 * @return string
	 */
	protected function convertToStudlyCaps($string)
	{
		return str_replace(
			' ', '', ucwords(str_replace('-', ' ', $string))
		);
	}

	/**
	 * Convert the string with hyphens to camelCase,
	 * e.g. add-new => addNew
	 *
	 * @param string $string The string to convert
	 *
	 * @return string
	 */
	protected function convertToCamelCase($string)
	{
		return lcfirst($this->convertToStudlyCaps($string));
	}
}
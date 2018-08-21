<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 8/21/18
 * Time: 7:43 AM
 */

namespace Core;

/**
 * Base Controller
 */
abstract class Controller
{
	/**
	 * Parameters from the matched route
	 * @var array
	 */
	protected $route_params = [];

	/**
	 * @param array $route_params Parameters from the route
	 *
	 * @return void
	 */
	public function __construct($route_params)
	{
		$this->route_params = $route_params;
	}
}
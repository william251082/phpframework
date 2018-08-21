<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 8/21/18
 * Time: 3:14 AM
 */

namespace App\Controllers;

use Core\Controller;

/**
 * Home Controller
 *
 * @package App\Controllers
 */
class Home extends Controller
{
	/**
	 * Before filter - called before an action method
	 *
	 * @return void
	 */
	protected function before()
	{
		echo " (before) ";
		return false;
	}

	/**
	 * After filter - called after an action method
	 *
	 * @return void
	 */
	protected function after()
	{
		echo " (after) ";
	}

	/**
	 * Show the index page
	 *
	 * @return void
	 */
	public function indexAction()
	{
		echo 'Hello from the index action in the Home controller';
	}
}
<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 8/21/18
 * Time: 9:02 AM
 */

namespace App\Controllers\Admin;

use Core\Controller;

/**
 * User admin controller
 */
class Users extends Controller
{
	/**
	 * Before filter
	 *
	 * @return void
	 */
	protected function before()
	{
		// Make sure an admin user is logged in for example
		// return false;
	}

	/**
	 * Show the index page
	 *
	 * @return void
	 */
	public function indexAction()
	{
		echo 'User admin index';
	}
}
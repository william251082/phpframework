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
	 * Show the index page
	 *
	 * @return void
	 */
	public function index()
	{
		echo 'Hello from the index action in the Home controller';
	}
}
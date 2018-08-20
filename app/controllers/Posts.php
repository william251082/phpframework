<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 8/20/18
 * Time: 9:28 PM
 */

/**
 * Posts Controller
 *
 * PHP version 7.2.1
 */
class Posts
{
	/**
	 * Show the index page
	 *
	 * @return void
	 */
	public function index()
	{
		echo 'Hello from the index action in the Post Controller!';
	}

	/**
	 * Show the add new page
	 *
	 * @return void
	 */
	public function addNew()
	{
		echo 'Hello from the addNew action in the Post Controller!';
	}
}
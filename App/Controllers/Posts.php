<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 8/20/18
 * Time: 9:28 PM
 */

namespace App\Controllers;

use Core\Controller;
use Core\View;
use App\Models\Post;

/**
 * Posts Controller
 *
 * PHP version 7.2.1
 */
class Posts extends Controller
{
	/**
	 * Show the index page
	 *
	 * @return void
	 */
	public function indexAction()
	{
		$posts = Post::getAll();

		View::renderTemplate('Posts/index.html', [
			'posts' => $posts
		]);
	}

	/**
	 * Show the add new page
	 *
	 * @return void
	 */
	public function addNewAction()
	{
		echo 'Hello from the addNew action in the Post Controller!';
	}

	/**
	 * Show the edit page
	 *
	 * @return void
	 */
	public function editAction()
	{
		echo 'Hello from the edit action in the Posts controller!';
		echo '<p>Route parameters: <pre>' .
				htmlspecialchars(print_r($this->route_params, true)) . '</pre><p>';
	}
}
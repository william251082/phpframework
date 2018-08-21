<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 8/21/18
 * Time: 9:58 AM
 */

namespace Core;

/**
 * View
 *
 */
class View
{
	/**
	 * Render a view file
	 *
	 * @param string $view The view file
	 *
	 * @param array
	 */
	public static function render($view, $args = [])
	{
		extract($args, EXTR_SKIP);

		$file = "../App/Views/$view"; // Relative to Core directory
		if (is_readable($file))
		{
			require $file;
		}
		else
		{
			echo "$file not found";
		}
	}

	/**
	 * Render a view template using twig
	 *
	 * @throws 
	 * @param string $template The template file
	 * @param array  $args     Associative array of data to display in the view
	 *
	 * @return void
	 */
	public static function renderTemplate($template, $args = [])
	{
		// instantiate the twig object once
		static $twig = null;

		if ($twig === null)
		{
//			$loader = new \Twig_Loader_Filesystem( '../App/Views');
			$loader = new \Twig_Loader_Filesystem(dirname(__DIR__) . '/App/Views');
			$twig   = new \Twig_Environment($loader);
		}
			echo $twig->render($template, $args);
	}
}
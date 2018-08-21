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
}
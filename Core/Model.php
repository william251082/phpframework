<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 8/21/18
 * Time: 11:04 PM
 */

namespace Core;

use App\Config;
use App\Models\Post;
use PDO;
use PDOException;

/**
 * BaseModel
 *
 * @package Core
 */
abstract class Model
{

	/**
	 * Get the PDO database connection
	 *
	 * @return mixed
	 */
	protected static function getDB()
	{
		static $db = null;

		if ($db === null) {
			//$host = 'localhost';
			//$dbname = 'mvc';
			//$username = 'root';
			//$password = 'secret';

			try {
				//$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",
				//              $username, $password);
				$dsn = 'mysql:host=' . Config::DB_HOST . ';dbname=' .
					Config::DB_NAME . ';charset=utf8';
				$db = new PDO($dsn, Config::DB_USER, Config::DB_PASSWORD);

			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}

		return $db;
	}
}
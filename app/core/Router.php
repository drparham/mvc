<?php namespace App\Core;

use Phroute\Phroute\Dispatcher;

Class Router
{
	protected static $routes = [];
	protected static $router;
	
	protected function __construct()
	{

	}

	public static function getInstance()
	{
		if(static::$router === null){
			static::$router = new static();
			require_once '../routes/router.php';
			static::$routes = $router;
		}
		return static::$router;
	}

	public static function getRoutes()
	{
		return static::$routes;
	}

	public static function dispatchRoute()
	{
		// print_r(static::$routes);
		$dispatcher = new Dispatcher(static::$routes->getData());
		return $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
	}


	private function __clone()
	{

	}

	private function __wakeup()
	{

	}
}
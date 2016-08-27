<?php namespace App\Core;

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
			static::$routes = require_once '../routes/router.php';
		}
		return static::$router;
	}

	public static function getRoutes()
	{
		return static::$routes;
	}

	private function __clone()
	{

	}

	private function __wakeup()
	{

	}
}
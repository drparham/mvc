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

	public static function getRoute($url)
	{
		$urlLength = count($url);
		$routes = static::$routes;
		$route = [];
		$tempUrl = [];
		foreach($routes as $key => $value)
		{
			//O(N)
			$uri = explode('/', filter_var(rtrim($key, '/'), FILTER_SANITIZE_URL));
			$uriLength = count($uri);
			if($uriLength != $urlLength){
				continue;
			}

			for($i=0; $i < $uriLength; $i++)
			{
				//O(N^2)
				if(isset($url[$i]))
				{
					if($uri[$i] === $url[$i])
					{
						$route = $value;
					}
					elseif(strpos($uri[$i], '{') !== FALSE)
					{
						$tempUrl[] = $url[$i];
						$route = $value;
					}
					else {
						$tempUrl =[];
						break;
					}
				}
			}
		}
		if(empty($route)){
			return [null, $url];
		}
		
		return [$route, $tempUrl];

	}

	private function __clone()
	{

	}

	private function __wakeup()
	{

	}
}
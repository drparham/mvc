<?php namespace App\Core;

Class App {
	
	protected $controller = '\\App\\Controllers\\Home';
	protected $required = 'Home';
	protected $routes = '';
	protected $route = '';
	protected $method = 'index';
	protected $params = [];

	public function __construct()
	{
		//initialize App
		$router = Router::getInstance();
		$this->routes = $router::getRoutes();
		
		$url = $this->loadController($this->parseUrl());
		$url = $this->loadMethod($url);
		$url = $this->loadParams($url);

		call_user_func_array([$this->controller, $this->method], $this->params);

	}

	public function parseUrl()
	{

		if(isset($_SERVER['REQUEST_URI'])) {
			$url = explode('/', filter_var(rtrim($_SERVER['REQUEST_URI'], '/'), FILTER_SANITIZE_URL));
			$url = array_reverse($url);
			array_pop($url);
			return array_reverse($url);
		}

	}

	public function loadController($url)
	{
		if(isset($url[0])){
			if(isset($this->routes[$url[0]]))
			{
				$this->route = $this->routes[$url[0]];
				$this->required = $this->route[1];
				$this->controller = '\\'.$this->route[0].'\\'.$this->route[1];
				unset($url[0]);
			}else {
				$this->route[2] = 'notFound';
				$this->required = 'Home';
				$this->controller = '\\App\Controllers\\Home';
			}
		}
		
	
		require_once '../app/controllers/' . $this->required .  '.php';

		$this->controller = new $this->controller;
		return $url;
	}

	public function loadMethod($url)
	{
		if(isset($this->route[2])){
			if(method_exists($this->controller, $this->route[2])){
				$this->method = $this->route[2];
			}
		}	
		
		return $url;
	}

	public function loadParams($url)
	{
		$this->params = $url ? array_values($url) : [];
	}
}
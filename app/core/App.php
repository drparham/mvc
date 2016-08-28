<?php namespace App\Core;

Class App {
	
	protected $app = [];
	protected $database = [];
	protected $controller_namespace = '';
	protected $controller = '';
	protected $required = '';
	protected $routes = '';
	protected $route = '';
	protected $method = '';
	protected $params = [];
	public $name = '';

	public function __construct()
	{
		//initialize App

		//load config files
		$this->loadConfigs();

		//initalize defaults
		$this->loadDefaults();

		//initalize database
		$this->loadDatabase();

		//initialize routes
		$router = Router::getInstance();
		$this->routes = $router::getRoutes();
		
		$url = $this->loadController($this->parseUrl());
		//$url = $this->loadMethod($url);
		$url = $this->loadParams($url);

		//execute stack
		call_user_func_array([$this->controller, $this->method], $this->params);

	}

	private function parseUrl()
	{

		if(isset($_SERVER['REQUEST_URI'])) {
			$url = explode('/', filter_var(rtrim($_SERVER['REQUEST_URI'], '/'), FILTER_SANITIZE_URL));
			$url = array_reverse($url);
			array_pop($url);
			return array_reverse($url);
		}

	}

	private function loadConfigs()
	{
		$config = new Config();
		$this->database = $config->getConfig('database');
		$this->app = $config->getConfig('app');

	}

	private function loadDatabase()
	{
		$database = new Database();
		$database->setConfig($this->database);
	}

	private function loadDefaults()
	{
		$this->controller_namespace = $this->app['controller_namespace'];
		$this->required = $this->app['controller'];
		$this->controller = $this->controller_namespace . $this->required;
		$this->method = $this->app['method'];
		$this->name = $this->app['name'];
	}

	private function loadController($url)
	{
		list($route, $url) = Router::getRoute($url);
		
		if(is_null($route)){	
			$this->required = 'Home';
			$this->controller = '\\App\Controllers\\Home';
			$this->method = 'notFound';
		}else {
			//$this->route = $this->routes[$url[0]];
			$this->required = $route[1];
			$this->controller = '\\'.$route[0].'\\'.$route[1];
			$this->method = $route[2];
		}

		require_once '../app/controllers/' . $this->required .  '.php';

		$this->controller = new $this->controller;
		return $url;
	}

	private function loadParams($url)
	{
		$this->params = $url ? array_values($url) : [];
	}
}
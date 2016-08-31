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
		$router->dispatchRoute();
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
}
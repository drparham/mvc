<?php namespace App\Core;

Class Controller
{
	public function model($model)
	{
		require_once '../app/models/' . $model . '.php';
		$class = '\\App\\Models\\'.$model;
		return new $class;
	}

	public function view($name, $data = '')
	{
		// $config = new Config();
		// var_dump($config);
		// $app = $config->getConfig('app');
		//var_dump($app);
		require_once '../app/views/' . $name. '.php';
	}

	public function notFound()
	{
		echo "404 Page Not Found!!";
	}
}
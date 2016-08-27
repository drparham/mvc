<?php namespace App\Core;

Class Controller
{
	public function model($model)
	{
		require_once '../app/models/' . $model . '.php';
		$class = '\\App\\Models\\'.$model;
		return new $class;
	}

	public function notFound()
	{
		echo "404 Page Not Found!!";
	}
}
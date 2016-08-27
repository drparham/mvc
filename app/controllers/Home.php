<?php namespace App\Controllers;

use App\Core\Controller;

Class Home extends Controller
{

	public function index($name = 'Alex')
	{
		$user = $this->model('User');
		$user->name = $name;
		echo $user->name;
	}

	public function test()
	{
		echo "bob";
	}
}
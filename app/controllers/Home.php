<?php namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;
Class Home extends Controller
{

	protected $user;

	public function __construct()
	{
		$this->user = $this->model('User');
	}

	public function index()
	{
		$users = $this->user->all();
		
		return $this->view('home/index', $users);
	}

	public function create($username, $email)
	{
		$user = User::create([
					'username' => $username,
					'email' => $email,
				]);
		return $this->view('home/show', $user);
	}

	public function test($name)
	{
		echo $name;
	}

	public function test2($name)
	{
		echo 'Hi ' . $name;
	}
}
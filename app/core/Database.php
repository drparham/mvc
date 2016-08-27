<?php namespace App\Core;

use Illuminate\Database\Capsule\Manager as Capsule;

Class Database
{
	protected $config = [];
	protected $capsule = '';

	public function __construct($config = null)
	{
		if($config != null){
			$this->setConfig($config);
			$this->setCapsule();
		}
	}

	public function getConfig($config = null)
	{
		if($config != null){
			$this->setConfig($config);
		}
		return $this->config;
	}

	public function setConfig($config)
	{
		$this->config = $config;
		$this->setCapsule();
	}

	public function setCapsule()
	{
		$this->capsule = new Capsule();
		$this->capsule->addConnection($this->config);
		$this->loadDatabase();
	}

	public function loadDatabase()
	{
		$this->capsule->bootEloquent();
	}
}
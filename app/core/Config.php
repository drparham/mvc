<?php namespace App\Core;

Class Config
{
	protected static $config = [];

	public static function __consruct($config = null)
	{
		if($config != null){
			static::setConfig($config);
		}
		static::getConfig($config);
	}

	public static function getConfig($config = null)
	{
		if($config != null){
			static::setConfig($config);
		}
		return static::$config;
	}

	public static function setConfig($config)
	{
		
		$path =  realpath(__DIR__ . '/../config');
		static::$config = require_once $path.'/'.$config.'.php';
	}

}
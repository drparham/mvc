<?php namespace App;

require_once '../vendor/autoload.php';
require_once 'core/ClassLoader.php';
use App\Core\ClassLoader;

$loader = new ClassLoader();
 
// register classes with namespaces
$loader->addPrefix('App\Core', __DIR__.'/core');
$loader->addPrefix('App',           __DIR__);

// activate the autoloader
$loader->register();


// require_once 'core/App.php';
// require_once 'core/Controller.php';
// require_once 'core/helpers.php';
// require_once 'core/Router.php';
// require_once 'core/Database.php';




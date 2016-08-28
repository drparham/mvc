<?php 

return [
	'home' => ['App\\Controllers','Home','index'],
	'office/{name}' => ['App\\Controllers','Home','test'],
	'home-create' => ['App\\Controllers', 'Home', 'create'],
	'home/create/{username}/{email}' => ['App\\Controllers','Home','create'],
	'office/{name}/test' => ['App\\Controllers', 'Home', 'test2'],
];
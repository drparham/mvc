# MVC
	Simple example of an MVC framework for PHP.
	This is for educational purposes only. Although it could be used for a simple brochure site. Supports clean/pretty urls.

##This System supports very simply Routes.
	The routing system is super simple.

	There is a routes folder, with a routes file inside. This file contains an array of your routes.
	Currently this system is too simplistic to capture more then one uri section.

## Very simple Controllers.
     
	You have the ability to create any Controllers you want, with any methods you want. As long as they extend `App\Core\Controller`.
	This parent Controller class exposes a method for models, and views, it also has a default method for handling 404 errors.

## Very simple views
	Plain PHP viwe files, no templating system in place

## Eloquent Models. 
	This system is pulling in Eloquent Models from the Laravel Framework. 

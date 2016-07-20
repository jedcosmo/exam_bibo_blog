<?php
return array(
	'_root_'  => 'blog/index',  // The default route
	'_404_'   => 'blog/404',    // The main 404 route
	
	'hello(/:name)?' => array('blog/hello', 'name' => 'hello'),
        'register' => array( array('GET', new Route('admin/register')), array('POST', new Route('admin/create')) ),
        'login' => 'admin/login', 
        'logout' => 'admin/logout',
        'blog/create' => array( array('GET', new Route('blog/create')), array('POST', new Route('blog/create')) ),
        'blog/edit/(:any)' => array( array('GET', new Route('blog/edit/$1')), array('POST', new Route('blog/edit/$1')) ),
        'blog/preview/(:any)' => array( array('GET', new Route('blog/preview/$1')) ),
        'blog/delete/(:any)' => array( array('GET', new Route('blog/delete/$1')) ),
        'api/(:any)' => array( array('GET', new Route('api/$1')), array('POST', new Route('api/$1')) ),
);

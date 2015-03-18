<?php 
	$router = new Phalcon\Mvc\Router();
	//$router->setDefaultModule("frontend");
	## FrontEnd ##
	$frontend = new Phalcon\Mvc\Router\Group(array(
			'module'	=> 'frontend'
	));
	$frontend->add('/', array(
			'module' => 'frontend',
			'controller' => 'index',
			'action' => 'index',
	));
	$frontend->add('/:controller', array(
			'module' => 'frontend',
			'controller' => 1,
			'action' => 'index',
	));
	$frontend->add('/:controller/:action', array(
			'module' => 'frontend',
			'controller' => 1,
			'action' => 2,
	));
	$frontend->add('/:controller/:action/:params', array(
			'controller' => 1,
			'action'	 => 2,
			'params' 	 => 3
	));
	$router->mount($frontend);
	
	## FrontEnd ##
	
	
	## Backend ##
	$admin = new Phalcon\Mvc\Router\Group(array(
			'module'	=> 'backend'	
	));
	$admin->setPrefix('/admin');
	$admin->add('/:controller', array(
			'controller' => 1,
			'action'	 => 'index'
	));
	$admin->add('/:controller/:action/:params', array(
			'controller' => 1,
			'action'	 => 2,
			'params' 	 => 3	
	));
	$router->mount($admin);
	
	## Backend ##

	
	// Sondaki slashı sil
	$router->removeExtraSlashes(true);

?>
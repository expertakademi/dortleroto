<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
try {

	/**
	 * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
	 */
	$di = new \Phalcon\DI\FactoryDefault();

	/**
	 * Registering a router
	 */
	$di->set('router', function() {
		include_once __DIR__ . '/../common/config/router.php';
		return $router;
	});

	/**
	 * The URL component is used to generate all kind of urls in the application
	 */
	$di->set('domain',function(){
		return '31.210.54.34';
	});
	$di->set('url', function() {
		$url = new \Phalcon\Mvc\Url();
		$url->setBaseUri('/');
		return $url;
	});

	/**
	 * Start the session the first time some component request the session service
	 */
	$di->set('session', function() use($di) {
		//$domain = '.' .  $di->get('domain');
		//session_set_cookie_params(3600,'/',$domain,false,true);
		$session = new \Phalcon\Session\Adapter\Files();
		$session->start();
		return $session;
	}, true);
	/**
	 * Session objesi
	 */
	$di->set('sessionObj',function(){
		$obj = new Phalcon\Session\Bag('sessionObj');
		return $obj;
	});
	/**
	 * Güvenlik sınıfını başlat
	 */
	$di->set('security', function(){
			$security = new \Phalcon\Security();
			//Set the password hashing factor to 12 rounds
			$security->setWorkFactor(12);
			return $security;
	}, true);
	/**
	 * Her oturum için 1 csrf üret
	 */
	$di->set('csrf',function() use($di){
		$obj = new stdClass();
		$key = '$PHALCON/CSRF/KEY$';
		$tokenKey = $di->get('session')->$key;
		if ($tokenKey):
			$obj->name = $tokenKey;
		else:
			$obj->name = $di->get('security')->getTokenKey();
		endif;
		$key = '$PHALCON/CSRF$';
		$token = $di->get('session')->$key;
		if ($token):
			$obj->token =  $token;
		else:
			$obj->token = $di->get('security')->getToken();
		endif;
		return $obj;
	}, true);
	
	$di->set('message', function(){
		require __DIR__ . '/../common/messages/tr.php';
		$message =  new \Phalcon\Translate\Adapter\NativeArray(array(
				"content" => $messages
		));
		return $message;
	}, true);
	
	
	/**
	 * Handle the request
	 */
	$application = new \Phalcon\Mvc\Application();

	$application->setDI($di);

	/**
	 * Register application modules
	 */
	$application->registerModules(array(
		'frontend' => array(
			'className' => 'Modules\Frontend\Module',
			'path' => '../apps/frontend/Module.php'
		),
		'backend' => array(
				'className' => 'Modules\Backend\Module',
				'path' => '../apps/backend/Module.php'
		)
	));

	echo $application->handle()->getContent();

} catch (Phalcon\Exception $e) {
	echo $e->getMessage();
} catch (PDOException $e){
	echo $e->getMessage();
}
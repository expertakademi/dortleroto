<?php

namespace Modules\Backend;
use Phalcon\Mvc\View,
	Phalcon\Mvc\View\Engine\Volt,
	Phalcon\Dispatcher,
	Phalcon\Mvc\Dispatcher as MvcDispatcher,
	Phalcon\Events\Manager as EventsManager,
	Modules\Backend\Plugins\Acl;
class Module
{

	public function registerAutoloaders()
	{

		$loader = new \Phalcon\Loader();

		$loader->registerNamespaces(array(
			'Modules\Backend\Controllers' => __DIR__ . '/controllers/',
			'Modules\Backend\Models' => __DIR__ . '/models/',
			'Modules\Backend\Plugins' => __DIR__ . '/plugins/',
			'Modules\Common\Components' => __DIR__ . '/../../common/components/'
		));

		$loader->register();
	}

	public function registerServices($di)
	{

		$di->set('dispatcher', function(){
			//Create an EventsManager
			$eventsManager = new EventsManager();
				
			//Attach a listener
			$eventsManager->attach("dispatch:beforeDispatchLoop", function($event, $dispatcher) {
				$keyParams = array();
				$params = $dispatcher->getParams();
				// Route da parametre gelmediği için böyle çözdüm şimdilik
				if(array_key_exists(0,$params)):
					//Explode each parameter as key,value pairs
					foreach ($params as $number => $value) {
						$parts = explode(':', $value);
						if(isset($parts[1])):
						$keyParams[$parts[0]] = $parts[1];
						endif;
					}
					//Override parameters
					$dispatcher->setParams($keyParams);
				else:
					$dispatcher->setParams($params);
				endif;
			});
			$acl = new Acl('backend');
			$eventsManager->attach('dispatch', $acl);
				
			$dispatcher = new MvcDispatcher();
			$dispatcher->setDefaultNamespace("Modules\Backend\Controllers");
			$dispatcher->setEventsManager($eventsManager);
				
			return $dispatcher;
		});
		/**
		 * Volt Service
		 */
		$di->set('voltService', function($view, $di) {
		
			$volt = new Volt($view, $di);
		
			$volt->setOptions(array(
					"compiledPath" => __DIR__ .'/cache/compiled-templates/',
					"compiledExtension" => ".compiled",
					"compileAlways" => true
			));
			//load function php
			$compiler = $volt->getCompiler();
			$compiler->addFunction('in_array', 'in_array');
			return $volt;
		});
		/**
		 * Setting up the view component
		 */
		$di->set('view', function() {
			$view = new \Phalcon\Mvc\View();
			$view->setViewsDir(__DIR__ . '/views/');
			$view->registerEngines(array(
					".volt" => 'voltService'
			));
			return $view;
		});

		/**
		 * Database connection is created based in the parameters defined in the configuration file
		 */
		$di->set('db', function() {
			return new \Phalcon\Db\Adapter\Pdo\Mysql(array(
				"host" => 'localhost',
				"username" => 'root',
				"password" => '',
				"dbname" => 'dortlerOto',
				"charset" => 'utf8'
			));
		});
		
		$di->set('transactions', function(){
			return new \Phalcon\Mvc\Model\Transaction\Manager();
		}, true);
		
		$di->set('helper', function(){
    		return new \Modules\Common\Components\helper();
		}, true);
	
		$di->set('imageUpload', function(){
			return new \Modules\Common\Components\imageUpload();
		}, true);
		
		$di->set('topluSms', function(){
			return new \Modules\Common\Components\topluSms();
		}, true);

	}

}

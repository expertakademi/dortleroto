<?php

namespace Modules\Backend\Plugins;

use Phalcon\Events\Event,
	Phalcon\Mvc\Dispatcher,
	Phalcon\Mvc\User\Plugin;

class Acl extends Plugin
{

	protected $_module;

	public function __construct($module)
	{
		$this->_module = $module;
	}

	public function beforeDispatch(Event $event, Dispatcher $dispatcher)
	{
		/*echo $resource = $this->_module . '-' . $dispatcher->getControllerName(), PHP_EOL; // frontend-dashboard
		echo $access = $dispatcher->getActionName(); // null */
		
		$acl = new \Phalcon\Acl\Adapter\Memory();
		$acl->setDefaultAction(\Phalcon\Acl::DENY);
		$sessionRole = $this->sessionObj->rol ? $this->sessionObj->rol : 'guest';
		
		/*Rolleri tanımlıyoruz*/
		$roles = array(
				'admin'=>new \Phalcon\Acl\Role('admin'),
				'editor'=>new \Phalcon\Acl\Role('editor'),
				'guest'=>new \Phalcon\Acl\Role('guest'),
		);
		/*Rolleri ekliyoruz*/
		foreach($roles as $role){
			$acl->addRole($role);
		}
		/*Kaynakları tanımlıyoruz*/
		switch($sessionRole){
			case "guest":
				$controllers = array(
					'index'     => array('index'),
					'giris'		=> array('index', 'girisYap'),
					'test'	 	=> array('*')
				);
				$r = 'guest';
			break;
			case "admin":
				$controllers = array(
				'index'		=> array('*'),
				'giris' 	=> array('index'),
				'kategori'  => array ('ekle','ekleAjax', 'duzenle', 'duzenleAjax', 'sil', 'silAjax', 'yonet', 'dataTableListele'),
				'marka' 	=> array ('yonet', 'ekle', 'ekleAjax', 'duzenle', 'duzenleAjax', 'sil', 'silAjax', 'dataTableListele'),
				'seri' 		=> array ('yonet', 'ekle', 'ekleAjax','duzenle', 'duzenleAjax', 'sil', 'silAjax', 'markayaGoreGetir', 'dataTableListele'),
				'model'		=> array ('yonet', 'ekle', 'ekleAjax', 'duzenle', 'duzenleAjax', 'sil', 'silAjax', 'seriyeGoreGetir', 'dataTableListele'),
				'ilan'		=> array ('ekle', 'ekleAjax','yonet','dataTableListele'),
				'musteri'	=> array ('ekle','ekleAjax','duzenle','duzenleAjax','sil',
					'silAjax', 'yonet','dataTableListele', 'goruntule', 'musteriNotDataTable',
					'ekleNot','ekleNotAjax','duzenleNot','duzenleNotAjax','silNot','silNotAjax'),
				'slider'	=> array ('ekle','ekleAjax','duzenle', 'duzenleAjax','sil','silAjax', 'yonet', 'dataTableListele'),
				'pazarlama'	=> array('topluSms','topluSmsAjax'),
				'test'	 	=> array('*')
				);
				$r= 'admin';
			break;
			
		}
		/*Kaynakları ekliyoruz*/
		foreach($controllers as $controller => $actions){
			$acl->addResource(new \Phalcon\Acl\Resource($controller),$actions);
		}
		/*İzin atamaları yapıyoruz*/
		foreach($controllers as $controller => $actions){
			foreach($actions as $action){
				$acl->allow($r,$controller,$action);
			}
		}
		/*------------------------------------------------------------------*/
		$controller = $dispatcher->getControllerName();
		$action = $dispatcher->getActionName();
		 
		$allowed = $acl->isAllowed($sessionRole, $controller, $action);
		 
		if($allowed != \Phalcon\Acl::ALLOW) {
			$this->response->redirect('');
			return false;
		}	
		
		
	}

}
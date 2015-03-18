<?php
namespace Modules\Backend\Controllers;
class TestController extends ControllerBase{
	public function indexAction(){
		$this->view->disable();
		var_dump($this->sessionObj->rol);
	}
}
?>
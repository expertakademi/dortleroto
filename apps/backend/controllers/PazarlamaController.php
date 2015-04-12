<?php 
namespace  Modules\Backend\Controllers;
class PazarlamaController extends ControllerBase{
	public function topluSmsAction(){
		$this->view->title = "Toplu Sms";
	}
	public function topluSmsAjaxAction(){
		$this->view->disable();
		print_r($this->request->getPost());
	}
}

?>
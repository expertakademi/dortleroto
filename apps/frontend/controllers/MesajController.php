<?php 
namespace Modules\Frontend\Controllers;
use Modules\Frontend\Models\mesajlar;
class MesajController extends ControllerBase{
	public function gonderAction(){
		parent::disableMain();
		$id = $this->dispatcher->getParam("id",null,null);
		$this->view->ilanId = $id ;
	}
	public function ekleAjaxAction(){
		parent::ajaxform();
		$params = $this->request->getPost();
		echo (new mesajlar)->yeni($params);
	}
}
?>
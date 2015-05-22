<?php 
namespace  Modules\Backend\Controllers;
use Modules\Backend\Models\gorevler;
class GorevController extends ControllerBase{
	public function ekleAction(){
		parent::disableMain();
	}
	public function ekleAjaxAction(){
		parent::ajaxForm();
		$params = $this->request->getPost();
		echo (new gorevler)->yeni($params);
	}
	public function listeleAction(){
		parent::disableMain();
		$type = $this->dispatcher->getParam("type");
		$minDate = $this->dispatcher->getParam("minDate");
		$maxDate = $this->dispatcher->getParam("maxDate");
		if(!isset($type)):
			$type = null;
		endif;
		if(!isset($minDate)):
			$minDate = null;
		endif;
		if(!isset($maxDate)):
			$maxDate = null;
		endif;
		$gorevler = (new gorevler)->listele($type,$minDate,$maxDate);
		$this->view->gorevler = $gorevler;
	}
	public function tamamlaAction(){
		parent::disableMain();
		$id = $this->dispatcher->getParam("id");
		$gorev = (new gorevler)->getir($id);
		$this->view->gorev = $gorev;
	}
	public function tamamlaAjaxAction(){
		parent::ajaxForm();
		$id = $this->request->getPost("id");
		echo (new gorevler)->tamamla($id);
	}
	public function duzenleAction(){
		parent::disableMain();
		$id = $this->dispatcher->getParam("id");
		$gorev = (new gorevler)->getir($id);
		$this->view->gorev = $gorev;
	}
	public function duzenleAjaxAction(){
		parent::ajaxForm();
		$params = $this->request->getPost();
		echo (new gorevler)->duzenle($params);
	}
	public function silAction(){
		parent::disableMain();
		$id = $this->dispatcher->getParam("id");
		$gorev = (new gorevler)->getir($id);
		$this->view->gorev = $gorev;
	}
	public function silAjaxAction(){
		parent::ajaxForm();
		$id = $this->request->getPost("id");
		echo (new gorevler)->sil($id);
	}
	public function dataTableAction(){
		parent::disableMain();
	}
	public function dataTableListeleAction(){
		$this->view->disable();
		echo (new gorevler)->dataTable();
	}

}

?>
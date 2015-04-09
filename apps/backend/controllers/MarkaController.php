<?php
namespace Modules\Backend\Controllers;
use Modules\Backend\Models\markalar;
class MarkaController extends ControllerBase{
	public function yonetAction(){
		$this->view->title= 'Marka Yönetimi';
	}
	public function ekleAction(){
		parent::disableMain();
	}
	public function ekleAjaxAction(){
		parent::ajaxForm();
		$params = $this->request->getPost();
		$marka = new markalar();
		echo $marka->yeni($params);
	}
	public function duzenleAction(){
		parent::disableMain();
		$id = $this->dispatcher->getParam('id');
		$marka = (new markalar)->getir($id);
		$this->view->marka = $marka;
	}
	public function duzenleAjaxAction(){
		parent::ajaxForm();
		$params = $this->request->getPost();
		$marka = new markalar();
		echo $marka->duzenle($params);
	}
	public function silAction(){
		parent::disableMain();
		$id = $this->dispatcher->getParam('id');
		$marka = (new markalar)->getir($id);
		$this->view->marka = $marka;
	}
	public function silAjaxAction(){
		parent::ajaxForm();
		$id = $this->request->getPost("id");
		$marka = new markalar();
		echo $marka->sil($id);
	}
	public function dataTableListeleAction(){
		$this->view->disable();
		echo (new markalar)->dataTable();
	}
}
?>
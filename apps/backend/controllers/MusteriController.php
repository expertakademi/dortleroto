<?php 
namespace Modules\Backend\Controllers;
use Modules\Backend\Models\musteriler,
	Modules\Backend\Models\musteriNotlari;
class MusteriController extends ControllerBase{
	public function ekleAction(){
		$this->view->title= "Müşteri Ekle";
	}
	public function ekleAjaxAction(){
		parent::ajaxForm();
		$params = $this->request->getPost();
		echo (new musteriler)->yeni($params);
	}
	public function yonetAction(){
		$this->view->title = "Müşteri Yönetimi";
	}
	public function dataTableListeleAction(){
		$this->view->disable();
		echo (new musteriler)->dataTable();
	}
	public function goruntuleAction(){
		$this->view->title ="Müşteri Görüntüle";
		$id = $this->dispatcher->getParam('id');
		$this->view->musteri = (new musteriler)->getir($id);
	}
	public function musteriNotDataTableAction(){
		$this->view->disable();
		$id = $this->dispatcher->getParam("id");
		echo (new musteriNotlari)->dataTable($id);
	}
	public function duzenleAction(){
		$this->view->title = "Müşteri Düzenle";
		$id = $this->dispatcher->getParam('id');
		$this->view->musteri = (new musteriler)->getir($id);
	}
	public function duzenleAjaxAction(){
		parent::ajaxForm();
		$params = $this->request->getPost();
		echo (new musteriler)->duzenle($params);
	}
	public function silAction(){
		parent::disableMain();
		$id = $this->dispatcher->getParam("id");
		$this->view->musteri = (new musteriler)->getir($id); 
	}
	public function silAjaxAction(){
		parent::ajaxForm();
		$id = $this->request->getPost("id");
		$musteri = new musteriler();
		echo $musteri->sil($id);
	}
	public function ekleNotAction(){
		parent::disableMain();
		$id = $this->dispatcher->getParam("id");
		$this->view->musteri = (new musteriler)->getir($id);
	}
	public function ekleNotAjaxAction(){
		parent::ajaxForm();
		$params = $this->request->getPost();
		echo (new musteriNotlari)->yeni($params);
	}
	public function duzenleNotAction(){
		parent::disableMain();
		$id = $this->dispatcher->getParam("id");
		$this->view->musteriNot = (new musteriNotlari)->getir($id);
	}
	public function duzenleNotAjaxAction(){
		parent::ajaxForm();
		$params = $this->request->getPost();
		echo (new musteriNotlari)->duzenle($params);
	}
	public function silNotAction(){
		parent::disableMain();
		$id = $this->dispatcher->getParam("id");
		$this->view->musteriNot = (new musteriNotlari)->getir($id);
	}
	public function silNotAjaxAction(){
		parent::ajaxForm();
		$id = $this->request->getPost("id");
		$musteriNotlari = new musteriNotlari();
		echo $musteriNotlari->sil($id);
	}
}
?>
<?php
namespace Modules\Backend\Controllers;
use Modules\Backend\Models\kategoriler;
class KategoriController extends ControllerBase{
	public function yonetAction(){
		$this->view->title = 'Kategori Yönetimi';
	}
	public function ekleAction(){
		parent::disableMain();
	}
	public function ekleAjaxAction(){
		parent::ajaxForm();
		$params = $this->request->getPost();
		$kategori = new kategoriler();
		echo $kategori->yeni($params);
	}
	public function duzenleAction(){
		parent::disableMain();
		$id = $this->dispatcher->getParam('id');
		$kategori = (new kategoriler)->getir($id);
		$this->view->kategori = $kategori;
	}
	public function duzenleAjaxAction(){
		parent::ajaxForm();
		$params = $this->request->getPost();
		$kategori = new kategoriler();
		echo $kategori->duzenle($params);
	}
	public function silAction(){
		parent::disableMain();
		$id = $this->dispatcher->getParam('id');
		$kategori = (new kategoriler)->getir($id);
		$this->view->kategori = $kategori;
	}
	public function silAjaxAction(){
		parent::ajaxForm();
		$id = $this->request->getPost("id");
		$kategori = new kategoriler();
		echo $kategori->sil($id);
	}
	public function dataTableListeleAction(){
		$this->view->disable();
		echo (new kategoriler)->dataTable();
	}
}	
?>
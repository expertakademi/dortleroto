<?php
namespace Modules\Backend\Controllers;
use Modules\Backend\Models\kategoriler;
class KategoriController extends ControllerBase{
	public function ekleAction(){
		$this->view->title = 'Kategori Ekle';
	}
	public function ekleAjaxAction(){
		parent::ajaxForm();
		$params = $this->request->getPost();
		$kategori = new kategoriler();
		echo $kategori->yeni($params);
	}
}	
?>
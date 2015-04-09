<?php
namespace Modules\Backend\Controllers;
use Modules\Backend\Models\seriler,
	Modules\Backend\Models\markalar;
class SeriController extends ControllerBase{
	public function yonetAction(){
		$this->view->title= 'Seri Yönetimi';
	}
	public function ekleAction(){
		parent::disableMain();
		$marka = new markalar();
		$this->view->markalar = $marka->tumunuGetir();
	}
	public function ekleAjaxAction(){
		parent::ajaxForm();
		$params = $this->request->getPost();
		$seri = new seriler();
		echo $seri->yeni($params);
	}
	public function duzenleAction(){
		parent::disableMain();
		$id = $this->dispatcher->getParam('id');
		$seri = (new seriler)->getir($id);
		$this->view->seri = $seri;
		$marka = new markalar();
		$this->view->markalar = $marka->tumunuGetir();
	}
	public function duzenleAjaxAction(){
		parent::ajaxForm();
		$params = $this->request->getPost();
		$seri = new seriler();
		echo $seri->duzenle($params);
	}
	public function silAction(){
		parent::disableMain();
		$id = $this->dispatcher->getParam('id');
		$seri = (new seriler)->getir($id);
		$this->view->seri = $seri;
	}
	public function silAjaxAction(){
		parent::ajaxForm();
		$id = $this->request->getPost("id");
		$seri = new seriler();
		echo $seri->sil($id);
	}
	public function markayaGoreGetirAction(){
		parent::checkAjaxReq();
		$this->view->disable();
		$markaId = $this->dispatcher->getParam("markaId");
		if(isset($markaId)):
			$seri = new seriler();
			echo $this->helper->resultToJson($seri->markayaGoreGetir($markaId));
		else:
			die($this->message->_('accessDenied'));
		endif;
	}
	public function dataTableListeleAction(){
		$this->view->disable();
		echo (new seriler)->datatable();
	}
}
?>
<?php
namespace Modules\Backend\Controllers;
use Modules\Backend\Models\seriler,
	Modules\Backend\Models\markalar;
class SeriController extends ControllerBase{
	public function ekleAction(){
		$this->view->title= 'Seri Ekle';
		$marka = new markalar();
		$this->view->markalar = $marka->tumunuGetir();
		
	}
	public function ekleAjaxAction(){
		parent::ajaxForm();
		$params = $this->request->getPost();
		$seri = new seriler();
		echo $seri->yeni($params);
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
}
?>
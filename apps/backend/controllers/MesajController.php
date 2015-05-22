<?php 
namespace Modules\Backend\Controllers;
use Modules\Backend\Models\mesajlar,
	Modules\Backend\Models\iletiler;
class MesajController extends ControllerBase{
	public function inboxAction(){
		$this->view->title = "Mesajlar";
		$sayfa = $this->dispatcher->getParam('sayfa',null,1);
		$this->view->pageObject = (new mesajlar)->listele($sayfa);
		$this->assets
			->addCss("backend/assets/pages/css/inbox.css")
			->addJs("backend/assets/js/inbox.js");
	}
	public function goruntuleAction(){
		$this->view->title="Mesaj Görüntüle";
		$id = $this->dispatcher->getParam('id',null,null);
		$mesaj = (new mesajlar)->getir($id);
		if ($mesaj->okundu == 0):
			(new mesajlar)->okundu($mesaj->id);
		endif;
		$this->view->mesaj = $mesaj;
		$this->view->iletiler = (new iletiler)->iletileriGetir($id);
		$this->assets
		->addCss("backend/assets/pages/css/inbox.css");
	}
	public function ekleAjaxAction(){
		parent::ajaxform();
		$params = $this->request->getPost();
		$ileti = new iletiler();
		echo $ileti->yeni($params);
	}
}
?>
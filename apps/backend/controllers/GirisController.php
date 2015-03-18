<?php
namespace Modules\Backend\Controllers;
use Phalcon\Mvc\View,
	Modules\Backend\Models\kullanicilar;
class GirisController extends ControllerBase{
	public function indexAction(){
		$this->view->disableLevel(View::LEVEL_MAIN_LAYOUT);
		if( ($this->sessionObj->rol == 'admin') || ($this->sessionObj->rol == 'editor')):
	    	$this->response->redirect('admin/index');
	    endif;
	}
	public function girisYapAction(){
		parent::ajaxForm();
		$params = $this->request->getPost();
		$kullanicilar = new kullanicilar();
		echo $kullanicilar->girisYap($params);
	}
}
?>
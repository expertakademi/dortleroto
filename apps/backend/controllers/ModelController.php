<?php 
namespace Modules\Backend\Controllers;
use Modules\Backend\Models\markalar,
	Modules\Backend\Models\seriler,
	Modules\Backend\Models\modeller;
class ModelController extends ControllerBase{
	public function YonetAction(){
		$this->view->title= 'Model Yönetimi';
		$this->assets
			->addJs('backend/assets/js/ilanEkle.js');
	}
	public function ekleAction(){
		parent::disableMain();
		$this->view->markalar = (new markalar)->tumunuGetir();
		$this->assets
		->addJs('backend/assets/js/ilanEkle.js');
	}
	public function ekleAjaxAction(){
		parent::ajaxForm();
		$params = $this->request->getPost();
		$model = new modeller();
		echo $model->yeni($params);
	}
	public function duzenleAction(){
		parent::disableMain();
		$id = $this->dispatcher->getParam('id');
		$model = (new modeller)->getir($id);
		$this->view->markalar = (new markalar)->tumunuGetir();
		$this->view->seriler =  (new seriler)->markayaGoreGetir($model->seriler->marka_id);
		$this->view->model = $model;
	}
	public function duzenleAjaxAction(){
		parent::ajaxForm();
		$params = $this->request->getPost();
		$model = new modeller();
		echo $model->duzenle($params);
	}
	public function silAction(){
		parent::disableMain();
		$id = $this->dispatcher->getParam('id');
		$model = (new modeller)->getir($id);
		$this->view->model = $model;
	}
	public function silAjaxAction(){
		parent::ajaxForm();
		$id = $this->request->getPost("id");
		$model = new modeller();
		echo $model->sil($id);
	}
	public function seriyeGoreGetirAction(){
		parent::checkAjaxReq();
		$this->view->disable();
		$seriId = $this->dispatcher->getParam("seriId");
		if(isset($seriId)):
			$model = new modeller();
			echo $this->helper->resultToJson($model->seriyeGoreGetir($seriId));
		else:
			die($this->message->_('accessDenied'));
		endif;
	}
	public function dataTableListeleAction(){
		$this->view->disable();
		echo (new modeller)->dataTable();
	}
}
?>
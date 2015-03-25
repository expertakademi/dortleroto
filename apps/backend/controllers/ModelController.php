<?php 
namespace Modules\Backend\Controllers;
use Modules\Backend\Models\markalar,
	Modules\Backend\Models\modeller;
class ModelController extends ControllerBase{
	public function ekleAction(){
		$this->view->title= 'Model Ekle';
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
}
?>
<?php 
namespace Modules\Backend\Controllers;
use Modules\Backend\Models\yazismalar;
class YazismaController extends ControllerBase{
	public function listeleAction(){
		parent::disableMain();
		$minDate = $this->dispatcher->getParam("minDate");
		$maxDate = $this->dispatcher->getParam("maxDate");
		if(!isset($minDate)):
			$minDate = null;
		endif;
		if(!isset($maxDate)):
			$maxDate = null;
		endif;
		$this->view->yazismalar = (new yazismalar)->getir($minDate,$maxDate);
	}
	public function ekleAjaxAction(){
		parent::ajaxForm();
		$params = $this->request->getPost();
		echo (new yazismalar)->yeni($params);
	}
}
?>
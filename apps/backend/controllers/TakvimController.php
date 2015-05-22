<?php 
namespace Modules\Backend\Controllers;
use Modules\Backend\Models\takvim;
class TakvimController extends ControllerBase{
	public function indexAction(){
		parent::disableMain();
		$this->view->data = (new takvim)->listele();
		$this->assets
		->addCss('backend/assets/global/plugins/fullcalendar/fullcalendar.min.css')
		->addJs('backend/assets/global/plugins/fullcalendar/fullcalendar.min.js')
		->addJs('backend/assets/global/plugins/fullcalendar/lang/tr.js');
	}
	public function ekleAction(){
		parent::disableMain();
		$baslangic = $this->dispatcher->getParam("tarih",null,null);
		$this->view->baslangic = $baslangic;
	}
	public function ekleAjaxAction(){
		parent::ajaxForm();
		$params = $this->request->getPost();
		echo (new takvim)->yeni($params);
	}
	public function tasiAction(){
		$this->view->disable();
		$params =$this->request->getPost();
		echo (new takvim)->tasi($params);
	}
}
?>
<?php 
namespace Modules\Backend\Controllers;
use Modules\Backend\Models\slider;
class SliderController extends ControllerBase{
	public function ekleAction(){
		parent::disableMain();
	}
	public function ekleAjaxAction(){
		parent::ajaxForm();
		$params = $this->request->getPost();
		echo (new slider)->yeni($params);
	}
	public function duzenleAction(){
		parent::disableMain();
		$id = $this->dispatcher->getParam("id");
		$this->view->slider = (new slider)->getir($id);
	}
	public function duzenleAjaxAction(){
		parent::disableMain();
		$params = $this->request->getPost();
		echo (new slider)->duzenle($params);
	}
	public function silAction(){
		parent::disableMain();
		$id = $this->dispatcher->getParam("id");
		$this->view->slider = (new slider)->getir($id);
	}
	public function silAjaxAction(){
		parent::ajaxForm();
		$id = $this->request->getPost("id");
		$slider = new slider();
		echo $slider->sil($id);
	}
	public function yonetAction(){
		$this->view->title = "Slider Yönetimi";
		$this->assets
			->addCss('backend/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css');
		$this->assets
			->addJs('backend/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js');
	}
	public function dataTableListeleAction(){
		$this->view->disable();
		echo (new slider)->dataTable();
	}
}
?>
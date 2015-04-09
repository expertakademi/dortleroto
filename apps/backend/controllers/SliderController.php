<?php 
namespace Modules\Backend\Controllers;
use Modules\Backend\Models\slider;
class SliderController extends ControllerBase{
	public function yonetAction(){
		$this->view->title = "Slider Yönetimi";
	}
	public function dataTableListeleAction(){
		$this->view->disable();
		echo (new slider)->dataTable();
	}
}
?>
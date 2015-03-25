<?php
namespace Modules\Backend\Controllers;
use Modules\Backend\Models\markalar;
class MarkaController extends ControllerBase{
	public function ekleAction(){
		$this->view->title= 'Marka Ekle';
	}
	public function ekleAjaxAction(){
		parent::ajaxForm();
		$params = $this->request->getPost();
		$marka = new markalar();
		echo $marka->yeni($params);
	}
}
?>
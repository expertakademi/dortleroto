<?php
namespace Modules\Frontend\Controllers;
use Modules\Frontend\Models\seriler;
class SeriController extends ControllerBase{
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
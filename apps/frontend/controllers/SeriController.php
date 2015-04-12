<?php
namespace Modules\Frontend\Controllers;
use Modules\Frontend\Models\seriler;
class SeriController extends ControllerBase{
	public function markayaPermalinkGoreGetirAction(){
		parent::checkAjaxReq();
		$this->view->disable();
		$markaPerma = $this->dispatcher->getParam("markaPerma");
		if(isset($markaPerma)):
			$seri = new seriler();
			echo $this->helper->resultToJson($seri->markayaPermalinkGoreGetir($markaPerma));
		else:
			die($this->message->_('accessDenied'));
		endif;
	}
}
?>
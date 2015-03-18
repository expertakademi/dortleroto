<?php

namespace Modules\Backend\Controllers;
class ControllerBase extends \Phalcon\Mvc\Controller
{	
	protected function initialize(){

	}
	protected function checkAjaxReq(){
		if ($this->request->isAjax() != true) :
			$this->helper->goBase();
		endif;
	}
	private function csrfCheck(){
		if ($this->request->isPost()):
			if ($this->security->checkToken() != true):
				$response['status'] = "error";
				$response['message'] = $this->message->_('accessDenied');
				die(json_encode($response));
			endif;
		else:
			$response['status'] = "error";
			$response['message'] = $this->message->_('accessDenied'); ;
			die(json_encode($response));
		endif;
	}
	protected function ajaxForm(){
		$this->view->disable();
		$this->checkAjaxReq();
		$this->csrfCheck();
	}
	
	
}
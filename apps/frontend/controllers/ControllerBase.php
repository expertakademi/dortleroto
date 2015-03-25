<?php

namespace Modules\Frontend\Controllers;
class ControllerBase extends \Phalcon\Mvc\Controller
{	
	protected function initialize(){
		$this->assets
			->addCss('frontend/assets/css/bootstrap.min.css')
			->addCss('frontend/assets/css/site.css')
			->addCss('frontend/assets/css/font-awesome.min.css')
			->addCss('frontend/assets/css/jquery-ui.css');
		$this->assets
			->addJs('frontend/assets/js/jquery-1.11.2.min.js')
			->addJs('frontend/assets/js/jquery-ui.js')
			->addJs('frontend/assets/js/bootstrap.min.js')
			->addJs('frontend/assets/js/app.js');
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
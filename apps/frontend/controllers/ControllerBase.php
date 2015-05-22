<?php
namespace Modules\Frontend\Controllers;
use Modules\Frontend\Models\sosyalMedyaZiyaretleri,
	Modules\Frontend\Models\reklamErisimleri,
	Phalcon\Mvc\View;
class ControllerBase extends \Phalcon\Mvc\Controller
{	
	protected function initialize(){
		(new sosyalMedyaZiyaretleri)->yeniZiyaret();
		(new reklamErisimleri)->yeniErisim();
		$this->assets
			->addCss('frontend/assets/css/bootstrap.min.css')
			->addCss('frontend/assets/css/site.css')
			->addCss('frontend/assets/css/custom.css')
			->addCss('frontend/assets/css/font-awesome.min.css')
			->addCss('frontend/assets/css/jquery-ui.css')
			->addCss('frontend/assets/plugins/formvalidation/dist/css/formValidation.min.css')
			->addCss('frontend/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css');;
		$this->assets
			->addJs('frontend/assets/js/jquery-1.11.2.min.js')
			->addJs('frontend/assets/js/jquery-ui.js')
			->addJs('frontend/assets/js/bootstrap.min.js')
			->addJs('frontend/assets/plugins/jquery-form/jquery.form.min.js')
			->addJs('frontend/assets/plugins/formvalidation/dist/js/formValidation.min.js')
			->addJs('frontend/assets/plugins/formvalidation/dist/js/framework/bootstrap.min.js')
			->addJs('frontend/assets/plugins/formvalidation/dist/js/language/tr_TR.js')
			->addJs('frontend/assets/js/app.js')
			->addJs('frontend/assets/js/form.js')
			->addJs('frontend/assets/js/modal.js');
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
			$response['message'] = $this->message->_('accessDenied') ;
			die(json_encode($response));
		endif;
	}
	protected function ajaxForm(){
		$this->view->disable();
		$this->checkAjaxReq();
		$this->csrfCheck();
	}
	protected function disableMain(){
		$this->view->disableLevel(array(
				View::LEVEL_MAIN_LAYOUT => true
		));
	}
	
}
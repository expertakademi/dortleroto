<?php
namespace Modules\Backend\Controllers;
use Phalcon\Mvc\View;
class ControllerBase extends \Phalcon\Mvc\Controller
{	
	protected function initialize(){
		$this->view->setVars(array(
			"title"=>""	
		));
		$this->assets
			->addCss('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all',false)
			->addCss('backend/assets/global/plugins/font-awesome/css/font-awesome.min.css')
			->addCss('backend/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')
			->addCss('backend/assets/global/plugins/bootstrap/css/bootstrap.min.css')
			->addCss('backend/assets/global/plugins/uniform/css/uniform.default.css')
			->addCss('backend/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')
			->addCss('backend/assets/global/css/components.css')
			->addCss('backend/assets/global/css/plugins.css')
			->addCss('backend/assets/layout/css/layout.css')
			->addCss('backend/assets/layout/css/themes/darkblue.css')
			->addCss('backend/assets/layout/css/custom.css')
			->addCss('backend/assets/global/plugins/formvalidation/dist/css/formValidation.min.css')
			->addCss('backend/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css');
		$this->assets
			->addJs('backend/assets/global/plugins/jquery.min.js')
			->addJs('backend/assets/global/plugins/jquery-migrate.min.js')
			->addJs('backend/assets/global/plugins/jquery-ui/jquery-ui.min.js')
			->addJs('backend/assets/global/plugins/bootstrap/js/bootstrap.min.js')
			->addJs('backend/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')
			->addJs('backend/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')
			->addJs('backend/assets/global/plugins/jquery.blockui.min.js')
			->addJs('backend/assets/global/plugins/jquery.cokie.min.js')
			->addJs('backend/assets/global/plugins/uniform/jquery.uniform.min.js')
			->addJs('backend/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')
			->addJs('backend/assets/global/scripts/metronic.js')
			->addJs('backend/assets/layout/scripts/layout.js')
			->addJs('backend/assets/layout/scripts/quick-sidebar.js')
			->addJs('backend/assets/layout/scripts/demo.js')
			->addJs('backend/assets/global/plugins/jquery-form/jquery.form.min.js')
			->addJs('backend/assets/global/plugins/formvalidation/dist/js/formValidation.min.js')
			->addJs('backend/assets/global/plugins/formvalidation/dist/js/framework/bootstrap.min.js')
			->addJs('backend/assets/global/plugins/formvalidation/dist/js/language/tr_TR.js')
			->addJs('backend/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')
			->addJs('backend/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')
			->addJs('backend/assets/global/plugins/jquery.mask.min.js')
			->addJs('backend/assets/js/app.js')
			->addJs('backend/assets/js/form.js')
			->addJs('backend/assets/js/modal.js')
			->addJs('backend/assets/js/dataTables.js');
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
				$response['message'] = $this->message->_('accessDenied') . 'a';
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
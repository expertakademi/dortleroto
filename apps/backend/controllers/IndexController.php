<?php

namespace Modules\Backend\Controllers;

class IndexController extends ControllerBase
{
    public function indexAction()
    {
	    if( ($this->sessionObj->rol != 'admin') && ($this->sessionObj->rol != 'editor') ):
	    	$this->response->redirect('admin/giris');
	    endif;
	    $this->view->title= "Özet";
        $this->assets
                ->addJs('backend/assets/global/plugins/flot/jquery.flot.min.js')
                ->addJs('backend/assets/global/plugins/flot/jquery.flot.resize.min.js')
                ->addJs('backend/assets/global/plugins/flot/jquery.flot.categories.js')
                ->addJs('backend/assets/js/ozet.js');
    }
    public function testAction(){
	    $this->helper->goBase();
    }

}


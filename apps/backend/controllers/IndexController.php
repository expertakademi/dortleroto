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

    }
    public function testAction(){
	    $this->helper->goBase();
    }

}


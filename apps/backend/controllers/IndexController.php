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
                ->addCss('backend/assets/pages/css/tasks.css')
                ->addCss('backend/assets/global/css/components.css')
                ->addCss('backend/assets/global/css/plugins.css')
                ->addCss('backend/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css')
                ->addCss('backend/assets/global/plugins/fullcalendar/fullcalendar.min.css')
                ->addJs('backend/assets/global/plugins/flot/jquery.flot.min.js')
                ->addJs('backend/assets/global/plugins/flot/jquery.flot.resize.min.js')
                ->addJs('backend/assets/global/plugins/flot/jquery.flot.categories.js')
                ->addJs('backend/assets/global/plugins/bootstrap-daterangepicker/moment.min.js')
                ->addJs('backend/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js')
                ->addJs('backend/assets/global/plugins/fullcalendar/fullcalendar.min.js')
                ->addJs('backend/assets/global/plugins/fullcalendar/lang/tr.js')
                ->addJs('backend/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js')
                ->addJs('backend/assets/global/plugins/jquery.sparkline.min.js')
                ->addJs('backend/assets/pages/scripts/tasks.js')
                ->addJs('backend/assets/js/ozet.js');
    }
    public function testAction(){
	    $this->helper->goBase();
    }
}


<?php

namespace Modules\Backend\Controllers;
use Modules\Backend\Models\satislar,
	Modules\Backend\Models\ilanGorusmeleri,
	Modules\Backend\Models\hareketler;
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
                ->addCss('backend/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')
                ->addJs('backend/assets/global/plugins/flot/jquery.flot.min.js')
                ->addJs('backend/assets/global/plugins/flot/jquery.flot.resize.min.js')
                ->addJs('backend/assets/global/plugins/flot/jquery.flot.categories.js')
                ->addJs('backend/assets/global/plugins/bootstrap-daterangepicker/moment.min.js')
                ->addJs('backend/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js')
                ->addJs('backend/assets/global/plugins/fullcalendar/fullcalendar.min.js')
                ->addJs('backend/assets/global/plugins/fullcalendar/lang/tr.js')
                ->addJs('backend/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js')
                ->addJs('backend/assets/global/plugins/jquery.sparkline.min.js')
                ->addJs('backend/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')
                ->addJs('backend/assets/pages/scripts/tasks.js')
                ->addJs('backend/assets/js/ozet.js')
        		->addJs('backend/assets/js/pickers.js')
        		->addJs('backend/assets/js/charts.js')
        		->addJs('backend/assets/js/dashboard.js');
    }
    public function ustAction(){
    	parent::disableMain();
    	$minDate = $this->dispatcher->getParam("minDate",null,null);
    	$maxDate = $this->dispatcher->getParam("maxDate",null,null);
    	//Satışlar
    	$satislar = new satislar();
    	$satisMiktari = $satislar->satisMiktariToplam($minDate,$maxDate);
    	$satisOrtalama = round($satislar->satisMiktariOrtalama());
    	$satisOrtalama = $this->helper->yuzdeOrtalama($satisOrtalama,$satisMiktari);
    	//Görüşme Talepleri
    	$gorusme = new ilanGorusmeleri();
    	$gorusmeSayi = $gorusme->gorusmeSayi($minDate,$maxDate);	
    	$gorusmeOrtalama = round($gorusme->gorusmeOrtalama());
    	$gorusmeOrtalama = $this->helper->yuzdeOrtalama($gorusmeOrtalama,$gorusmeSayi);
    	$ortalama = floor( ($satisOrtalama + $gorusmeOrtalama) / 2 );
        $this->view->setVars(array(
            	'satisMiktari' => $satisMiktari,
        		'gorusmeSayi'  => $gorusmeSayi,
        		'ortalama'	   => $ortalama
        ));
    }
    public function hareketlerAction(){
    	parent::disableMain();
    	$minDate = $this->dispatcher->getParam("minDate",null,null);
    	$maxDate = $this->dispatcher->getParam("maxDate",null,null);
    	$type = $this->dispatcher->getParam("type",null,null);
    	$hareketler = (new hareketler)->listele($type,$minDate,$maxDate);
    		$type = str_replace("'","",$type);
    		$type = explode(",",$type);
    	$this->view->hareketler = $hareketler;
    	$this->view->tipler = $type;
    }

}


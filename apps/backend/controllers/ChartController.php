<?php 
namespace  Modules\Backend\Controllers;
use Modules\Backend\Models\satislar,
	Modules\Backend\Models\sosyalMedyaZiyaretleri,
	Modules\Backend\Models\reklamErisimleri;
class ChartController extends ControllerBase{
	public function satisAction(){
		parent::disableMain();		
		$minDate = $this->dispatcher->getParam("minDate",null,null);
		$maxDate = $this->dispatcher->getParam("maxDate",null,null);

		$satis = (new satislar)->chart($minDate,$maxDate);
		$satis = (object) $satis;
		$this->view->satis = $satis;
	}
	public function sosyalAction(){
		parent::disableMain();
		$minDate = $this->dispatcher->getParam("minDate",null,null);
		$maxDate = $this->dispatcher->getParam("maxDate",null,null);

		$oranlar = (new sosyalMedyaZiyaretleri)->oranlar($minDate,$maxDate);
		$this->view->oranlar = $oranlar;
	}
	public function sosyalDetayAction(){
		parent::disableMain();
		$type = $this->dispatcher->getParam("type");
		$this->view->type = $type;
	}
	public function sosyalDataTableAction(){
		$this->view->disable();
		$type = $this->dispatcher->getParam("type");
		echo (new sosyalMedyaZiyaretleri)->dataTable($type);
	}
	public function reklamAction(){
		parent::disableMain();
		$minDate = $this->dispatcher->getParam("minDate",null,null);
		$maxDate = $this->dispatcher->getParam("maxDate",null,null);

		$reklamErisimleri = new reklamErisimleri();
		$this->view->adwords = $reklamErisimleri->oranlar('adwords',$minDate,$maxDate);
		$this->view->adroll = $reklamErisimleri->oranlar('adroll',$minDate,$maxDate);
		$this->view->facebook = $reklamErisimleri->oranlar('facebook',$minDate,$maxDate);
	}
	public function reklamDetayAction(){
		parent::disableMain();
		$type = $this->dispatcher->getParam("type");
		$this->view->type = $type;
	}
	public function reklamDataTableAction(){
		$this->view->disable();
		$type = $this->dispatcher->getParam("type");
		echo (new reklamErisimleri )->dataTable($type);
	}
	public function erisimAction(){
		parent::disableMain();
		$minDate = $this->dispatcher->getParam("minDate",null,null);
		$maxDate = $this->dispatcher->getParam("maxDate",null,null);
		$type = $this->dispatcher->getParam("type",null,null);
		$erisim = (new sosyalMedyaZiyaretleri)->erisimler($type,$minDate,$maxDate);
		$this->view->erisim  = $erisim;
		$this->view->type = $type;
	}
}
?>
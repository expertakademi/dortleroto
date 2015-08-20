<?php 
namespace Modules\Frontend\Controllers;
use Modules\Frontend\Models\ilanlar,
	Modules\Frontend\Models\ilanResimleri,
    Modules\Frontend\Models\facilities,
	Modules\Frontend\Models\facilityFeatures,
    Modules\Frontend\Models\ilanDamages;
class IlanController extends ControllerBase{
	public function goruntuleAction(){
		$permalink = $this->dispatcher->getParam("permalink");
		$id = $this->dispatcher->getParam("id");
		$ilan = (new ilanlar)->ilanGetir($permalink,$id);
		$ilanResimleri = (new ilanResimleri)->ilanaGoreGetir($ilan->id);
        
        $this->view->selectedFacilities = (new \Modules\Frontend\Models\modellerFacilityFeatures)->getSelectFacilites($ilan->model_id);
        
        $this->view->facilities = (new facilities)->getList();
        $this->view->facilityFeatures = (new facilityFeatures)->getList();
        
        $this->view->damageValues = (new ilanDamages)->getDamageValues();
        $this->view->selectedDamages = (new ilanDamages)->getSelectedDamagesById($id);
		
        
		$this->view->ilan = $ilan;
		$this->view->ilanResimleri = $ilanResimleri;
	}
    
    public function sikayetlerAjaxAction(){
        //echo 's';exit;
		parent::ajaxForm();
		$params = $this->request->getPost();
		$sikayat = new \Modules\Frontend\Models\sikayetler();
		echo $sikayat->yeni($params);
	}
}
?>
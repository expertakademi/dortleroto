<?php 
namespace Modules\Frontend\Controllers;
use Modules\Frontend\Models\ilanlar,
	Modules\Frontend\Models\ilanResimleri;
class IlanController extends ControllerBase{
	public function goruntuleAction(){
		$permalink = $this->dispatcher->getParam("permalink");
		$id = $this->dispatcher->getParam("id");
		$ilan = (new ilanlar)->ilanGetir($permalink,$id);
		$ilanResimleri = (new ilanResimleri)->ilanaGoreGetir($ilan->id);
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
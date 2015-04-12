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
}
?>
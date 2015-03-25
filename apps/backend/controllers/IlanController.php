<?php 
namespace Modules\Backend\Controllers;
use Modules\Backend\Models\kategoriler,
	Modules\Backend\Models\markalar,
	Modules\Backend\Models\yakitlar,
	Modules\Backend\Models\renkler,
	Modules\Backend\Models\motorHacimleri,
	Modules\Backend\Models\motorGucleri,
	Modules\Backend\Models\cekisler,
	Modules\Backend\Models\vitesler,
	Modules\Backend\Models\kasalar,
	Modules\Backend\Models\ilanlar;
class IlanController extends ControllerBase{
	public function ekleAction(){
		$this->view->setVars(array(
				"title"			=> "İlan Ekle",
				"kategoriler"	=> (new kategoriler)->tumunuGetir(),
				"markalar" 		=> (new markalar)->tumunuGetir(),
				"yakitlar" 		=> (new yakitlar)->tumunuGetir(),
				"renkler" 		=> (new renkler)->tumunuGetir(),
				"hacimler"		=> (new motorHacimleri)->tumunuGetir(),
				"gucler"		=> (new motorGucleri)->tumunuGetir(),
				"cekisler"		=> (new cekisler)->tumunuGetir(),
				"vitesler"		=> (new vitesler)->tumunuGetir(),
				"kasalar"		=> (new kasalar)->tumunuGetir()
		));
		$this->assets
			->addJs("backend/assets/js/ilanEkle.js");
	}
	public function ekleAjaxAction(){
		parent::ajaxForm();
		$params = $this->request->getPost();
		$ilan = new ilanlar();
		echo $ilan->yeni($params);
	}
}
?>
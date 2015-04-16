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
	Modules\Backend\Models\ilanlar,
	Modules\Backend\Models\ilanNotlari,
	Modules\Backend\Models\ilanGorusmeleri,
	Modules\Backend\Models\ilanKapora,
	Modules\Backend\Models\satislar,
	Modules\Backend\Models\ilanEkspertiz;
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
			->addCss('backend/assets/global/plugins/bootstrap-fileinput2/css/fileinput.min.css')
			->addCss("backend/assets/global/plugins/summernote/dist/summernote.css");
		$this->assets
			->addJs("backend/assets/js/ilanEkle.js")
			->addJs('backend/assets/global/plugins/bootstrap-fileinput2/js/fileinput.min.js')
			->addJs('backend/assets/global/plugins/bootstrap-fileinput2/js/fileinput_locale_tr.js')
			->addJs("backend/assets/global/plugins/summernote/dist/summernote.js?ver=0.02")
			->addJs("backend/assets/global/plugins/summernote/plugin/summernote-ext-video.js")
			->addJs("backend/assets/global/plugins/summernote/plugin/summernote-ext-fontstyle.js")
			->addJs("backend/assets/global/plugins/summernote/lang/summernote-tr-TR.js");
		
	}
	public function ekleAjaxAction(){
		parent::ajaxForm();
		$params = $this->request->getPost();
		$ilan = new ilanlar();
		echo $ilan->yeni($params);
	}
	
	public function yonetAction(){
		$this->view->title= "İlan Yönetimi";
	}
	public function goruntuleAction(){
		$this->view->title = "İlan Görüntüle";
		$id = $this->dispatcher->getParam("id");
		$ilan = (new ilanlar)->ilanGetir($id);
		$kapora = (new ilanKapora)->getir($id);
		$this->view->ilan = $ilan;
		if($kapora!= '' && $kapora->durum == 1):
			$this->view->kapora = $kapora;
		else:
			$this->view->kapora = null;
		endif;
		$this->view->satis = (new satislar)->getir($id);
		$this->view->ekspertiz = (new ilanEkspertiz)->getir($id);
		
	}

    public function hesaplaAction(){
        
        $this->assets
            ->addCss("backend/assets/global/css/expertiz.css")
            ->addCss("backend/assets/global/plugins/icheck/skins/all.css")
            ->addJS("backend/assets/global/plugins/icheck/icheck.min.js")
            ->addJs("backend/assets/pages/scripts/form-icheck.js");
    }
	public function dataTableListeleAction(){
		$this->view->disable();
		echo (new ilanlar)->dataTable();
	}

	public function ekleNotAction(){
		parent::disableMain();
		$id = $this->dispatcher->getParam("id");
		$ilan = (new ilanlar)->ilanGetir($id);
		$this->view->ilan = $ilan;
	}
	public function ekleNotAjaxAction(){
		parent::ajaxForm();
		$params = $this->request->getPost();
		echo (new ilanNotlari)->yeni($params);
	}
	public function ilanNotDataTableAction(){
		$this->view->disable();
		$id = $this->dispatcher->getParam("id");
		echo (new ilanNotlari)->dataTable($id);
	}
	
	public function ekleGorusmeAction(){
		parent::disableMain();
		$id = $this->dispatcher->getParam("id");
		$ilan = (new ilanlar)->ilanGetir($id);
		$this->view->ilan = $ilan;
	}
	public function ekleGorusmeAjaxAction(){
		parent::ajaxForm();
		$params = $this->request->getPost();
		echo (new ilanGorusmeleri)->yeni($params);
	}
	public function ilanGorusmeDataTableAction(){
		$this->view->disable();
		$id = $this->dispatcher->getParam("id");
		echo (new ilanGorusmeleri)->dataTable($id);
	}
	
	public function kaporaGoruntuleAction(){
		parent::disableMAin();
		$id = $this->dispatcher->getParam("id");
		$kapora = (new ilanKapora)->getir($id);	
		if($kapora!= '' && $kapora->durum == 1):
			$this->view->kapora = $kapora;
		else:
			$this->view->kapora = null;
		endif;
		$this->view->id = $id;
	}
	public function kaporaDuzenleAjaxAction(){
		parent::ajaxForm();
		$params = $this->request->getPost();
		echo (new ilanKapora)->ekleDuzenle($params);
	}
	public function ekleSatisAction(){
		parent::disableMain();
		$id = $this->dispatcher->getParam("id");
		$this->view->id = $id;
	}
	public function ekleSatisAjaxAction(){
		parent::ajaxForm();
		$params = $this->request->getPost();
		echo (new satislar)->yeni($params);
	}
	public function ekleEkspertizAction(){
		parent::disableMain();
		$id = $this->dispatcher->getParam("id");
		$this->view->id = $id;
	}
	public function ekleEkspertizAjaxAction(){
		parent::ajaxForm();
		$params = $this->request->getPost();
		echo (new ilanEkspertiz)->yeni($params);
	}
	
}
?>
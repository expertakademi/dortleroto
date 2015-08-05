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
	Modules\Backend\Models\ilanResimleri,
	Modules\Backend\Models\ilanKapora,
	Modules\Backend\Models\satislar,
	Modules\Backend\Models\ilanEkspertiz,
	Modules\Backend\Models\seriler,
	Modules\Backend\Models\modeller,
	Modules\Backend\Models\kullanicilar,
    Modules\Backend\Plugins\Sahibinden;
class IlanController extends ControllerBase{
	public function ekleAction(){
        if(isset($_POST['marka'])){
            echo 'test';die;
        }
		$this->view->setVars(array(
				"title"			=> "İlan Ekle",
				"kategoriler"	=> (new kategoriler)->tumunuGetir(),
				"markalar" 		=> (new markalar)->tumunuGetir(),
				"temsilciler"	=> (new kullanicilar)->tumunuGetir(),
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
    public function publishSahibinden($params){
        // getting the names of params
        /*$kategori = new Kategoriler();
        $kategoriName = $kategori->getir($params['kategori']);*/
        $markalar = new markalar();
        $markalarName = $markalar->getir($params['marka']);
        $seriler = new seriler();
        $serilerName = $seriler->getir($params['seri']);
        $carModel = new modeller();
        $craModelName = $carModel->getir($params['model']);
        $motorHacim = new motorHacimleri();
        $motorHacimValue = $motorHacim->getir($params['hacim']);
        $motorGucu = new motorGucleri();
        $motorGucuValue = $motorGucu->getir($params['guc']);
        $yakit = new yakitlar();
        $yakitValue = $yakit->getir($params['yakit']);

        //logging in
        $sahibinden = new sahibinden();
        $user = 'sonmez_22_33';
        $pass = 'dortler987';
        $sahibinden->login($user, $pass);
        // publishing data
        print_r($params);
        $sahibinden->publish($markalarName->ad . " " . $serilerName->ad . " " . $craModelName->ad . " " . $params['yil'] , $params['baslik'], $params['aciklama'], $params['fiyat'], $params['vites'],$params['kilometre'], "/var/www/public/uploads/ilan/2015/05/554a0c3ce44ce.jpg", $params['garanti'], $params['renk'], 0, 1, 0, 3, 11, 55, $params['hacim'], $params['guc'], $params['yakit']);

    }
	public function ekleAjaxAction(){
		parent::ajaxForm();
		$params = $this->request->getPost();
        $this->publishSahibinden($params);
		$ilan = new ilanlar();
		echo $ilan->yeni($params);
        $images = new ilanlar();
        print_r($images->imageNames);exit;

    }
	public function duzenleAction(){
		$id = $this->dispatcher->getParam("id",null,null);
		$ilan = (new ilanlar)->getir($id);
		$this->view->setVars(array(
				"title"			=> "İlan Düzenle",
				"ilan"			=> $ilan,
				"kategoriler"	=> (new kategoriler)->tumunuGetir(),
				"markalar" 		=> (new markalar)->tumunuGetir(),
				"seriler"		=> (new seriler)->markayaGoreGetir($ilan->marka_id),
				"modeller"		=> (new modeller)->seriyeGoreGetir($ilan->seri_id),
				"temsilciler"	=> (new kullanicilar)->tumunuGetir(),
				"yakitlar" 		=> (new yakitlar)->tumunuGetir(),
				"renkler" 		=> (new renkler)->tumunuGetir(),
				"hacimler"		=> (new motorHacimleri)->tumunuGetir(),
				"gucler"		=> (new motorGucleri)->tumunuGetir(),
				"cekisler"		=> (new cekisler)->tumunuGetir(),
				"vitesler"		=> (new vitesler)->tumunuGetir(),
				"kasalar"		=> (new kasalar)->tumunuGetir()
		));
		$this->assets
			->addCss("backend/assets/global/plugins/summernote/dist/summernote.css");
		$this->assets
			->addJs("backend/assets/js/ilanEkle.js")
			->addJs("backend/assets/global/plugins/summernote/dist/summernote.js?ver=0.02")
			->addJs("backend/assets/global/plugins/summernote/plugin/summernote-ext-fontstyle.js")
			->addJs("backend/assets/global/plugins/summernote/lang/summernote-tr-TR.js");
	}
	public function duzenleAjaxAction(){
		parent::ajaxForm();
		$params = $this->request->getPost();
		$ilan = new ilanlar();
		echo $ilan->duzenle($params);
	}
	public function resimEkleAction(){
		parent::disableMain();
		$id = $this->dispatcher->getParam("id",null,null);
		$this->view->id = $id;
	}
	public function resimDuzenleAction(){
		$id = $this->dispatcher->getParam("id",null,null);
		$this->view->title = "Resimleri Düzenle";
		$this->view->resimler = (new ilanResimleri)->getirByIlanId($id);
		$this->view->id = $id;
		$this->assets
		->addCss('backend/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css');
		$this->assets
		->addJs('backend/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js');
	}
	public function resimEkleAjaxAction(){
		parent::ajaxForm();
		$params = $this->request->getPost();
		echo (new ilanResimleri)->yeni($params);
	}
	public function resimSilAction(){
		parent::disableMain();
		$id = $this->dispatcher->getParam("id",null,null);
		$this->view->id = $id;
	}
	public function resimSilAjaxAction(){
		parent::ajaxForm();
		$params = $this->request->getPost();
		echo (new ilanResimleri)->silTekil($params);
	}
	public function kapakDegistirAction(){
		parent::disableMain();
		$id = $this->dispatcher->getParam("id",null,null);
		$this->view->id = $id;
	}
	public function kapakDegistirAjaxAction(){
		parent::ajaxForm();
		$params = $this->request->getPost();
		echo (new ilanResimleri)->kapakDegis($params);
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
		
		$this->assets
		->addCss('backend/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')
		->addJs('backend/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')
		->addJs('backend/assets/js/pickers.js');
		
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
	public function silAction(){
		parent::disableMain();
		$id = $this->dispatcher->getParam("id",null,null);
		$this->view->id = $id;
	}
	public function silAjaxAction(){
		parent::ajaxForm();
		$params = $this->request->getPost();
		echo (new ilanlar)->sil($params);
	}
	
}
?>
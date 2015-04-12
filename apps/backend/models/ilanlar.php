<?php 
namespace Modules\Backend\Models;
use Modules\Common\Components\imageUpload,
	Modules\Backend\Models\ilanResimleri;
class ilanlar extends ModelBase{
	protected function initialize(){
		parent::initialize();
		$this->hasMany("id","Modules\Backend\Models\ilanResimleri","ilan_id",
				array(
						"alias"=>"ilanResimleri"
				));
		$this->hasMany("kategori_id","Modules\Backend\Models\kategoriler","id",
				array(
						"alias"=>"kategoriler"
				));
		$this->hasMany("marka_id","Modules\Backend\Models\markalar","id",
				array(
						"alias"=>"markalar"
				));
		$this->hasMany("model_id","Modules\Backend\Models\modeller","id",
				array(
						"alias"=>"modeller"
				));
		
	}
	public function yeni($params){
		try {
			//Transaction Başlat
			$manager = parent::diGet('transactions');
			$transaction = $manager->get();
			// İlan Ekle
			$ilan = new ilanlar();
			$ilan->baslik = $params['baslik'];
			$ilan->kategori_id = $params['kategori'];
			$ilan->marka_id= $params['marka'];
			$ilan->seri_id = $params['seri'];
			$ilan->model_id = $params['model'];
			$ilan->yil = $params['yil'];
			$ilan->fiyat = $params['fiyat'];
			$ilan->kilometre = $params['kilometre'];
			$ilan->garanti = $params['garanti'];
			$ilan->yakit_id = $params['yakit'];
			$ilan->renk_id = $params ['renk'];
			$ilan->motor_hacim_id = $params['hacim'];
			$ilan->motor_guc_id = $params['guc'];
			$ilan->cekis_id = $params['cekis'];
			$ilan->vites_id = $params['vites'];
			$ilan->kasa_id =$params['kasa'];
			$ilan->eklenme_tarihi = date('Y-m-d H:i:s');
			$ilan->aktif=1;
			if($ilan->create() == false):
				$transaction->rollback(parent::mesajParcala($ilan));
			endif;
			//İlan Log
			$ilanLog = new ilanLoglari();
			$ilanLog->ilan_id = $ilan->id;
			$ilanLog->kullanici_id = parent::diGet('sessionObj')->kullaniciId;
			$ilanLog->islem = 'ekleme';
			$ilanLog->tarih = date('Y-m-d H:i:s');
			if($ilanLog->create() == false ):
				$transaction->rollback(parent::mesajParcala($ilanLog));
			endif;
			
			// Resimler
			$files = parent::diGet('request')->getUploadedFiles();
			$kapak = $params['kapak'];
			$imageUpload = new imageUpload();
			$resimler = $imageUpload->multipleUpload($files,'ilan',array("x"=>550,"y"=>450),$kapak);
			if($resimler['list'] == false):
				$transaction->rollback("Resimler yüklenemedi.");
			endif;
			//Resimleri Ekle
			$resim = array();
			foreach ($resimler['list'] as $key=>$item){
				$resim[$key] =  new ilanResimleri();
				$resim[$key]->resim_link = $item;
			}
			$ilan->ilanResimleri = $resim;
			if($ilan->update() == false ):
				$transaction->rollback(parent::mesajParcala($ilan));
			endif;
			
			//Kapak Resmi
			if($resimler['thumb']!=""):
				$kapak = $imageUpload->thumbUpload($resimler['thumb'],'thumbnail',array("x"=>200,"y"=>200));
			else:
				$kapak = $imageUpload->thumbUpload($resimler['list'][0],'thumbnail',array("x"=>200,"y"=>200));
			endif;
			if($kapak['status']!="success"):
				$transaction->rollback("Kapak Resmi Yüklenemedi");
			else:
				$ilan->kapak_foto=$kapak['link'];
				if($ilan->update() == false ):
					$transaction->rollback(parent::mesajParcala($ilan));
				endif;
			endif;
			//Eklendi
			$transaction->commit();
			$response['status']= 'success';
			$response['message'] = parent::diGet('message')->_('succesAdd', array('name'=> 'ilan'));
			} catch (TxFailed $e) {
				//Eklenemedi
				$response['status']='error';
				$response['message']= $e->getMessage();
			}
			return json_encode($response);
	}
	public function dataTable(){
		$datatable = new ilanlarDatatable();
		return $datatable->dataTable();
	}
	
}
class ilanlarDatatable extends ModelBase {
	public function dataTable(){
		$results = self::find(array(
				"columns"=>"id, id as DT_RowId, baslik, permalink, kategori_adi, marka_adi, model_adi, aktif"
		))->toArray();
		$data = array("data"=>$results);
		return json_encode($data);
	}
}
?>
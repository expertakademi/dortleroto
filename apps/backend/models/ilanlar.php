<?php 
namespace Modules\Backend\Models;
use Modules\Common\Components\imageUpload,
	Modules\Backend\Models\ilanResimleri;
class ilanlar extends ModelBase{
    public $imageNames = array('5555');

	protected function initialize(){
		parent::initialize();
		$this->hasMany("id","Modules\Backend\Models\ilanResimleri","ilan_id",
				array(
						"alias"=>"ilanResimleri"
				));
		$this->hasOne("id","Modules\Backend\Models\ilanAciklamalari","ilan_id",
				array(
						"alias"=>"ilanAciklamalari"
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
		$this->hasOne("id","Modules\Backend\Models\ilanKapora","ilan_id",
				array(
						"alias"=>"ilanKapora"
				));
		
	}
	public function getir($id){
		return self::findFirst($id);
	}
	public function yeni($params){
		try {
            //Transaction Başlat
			$manager = parent::diGet('transactions');
			$transaction = $manager->get();
			// İlan Ekle
			$ilan = new ilanlar();
			$ilan->setTransaction($transaction);
			$ilan->baslik = $params['baslik'];
			$ilan->permalink = parent::diGet('helper')->permalink($params['baslik']);
			$ilan->kategori_id = $params['kategori'];
			$ilan->marka_id= $params['marka'];
			$ilan->seri_id = $params['seri'];
			$ilan->model_id = $params['model'];
			$ilan->temsilci_id = $params['temsilci'];
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
			$ilan->hasarsiz = $params['hasar'];
			$ilan->eklenme_tarihi = date('Y-m-d H:i:s');
			$ilan->aktif=1;
			if($ilan->create() == false):
				$transaction->rollback(parent::mesajParcala($ilan));
			endif;
			//İlan Log
			$ilanLog = new ilanLoglari();
			$ilanLog->setTransaction($transaction);
			$ilanLog->ilan_id = $ilan->id;
			$ilanLog->kullanici_id = parent::diGet('sessionObj')->kullaniciId;
			$ilanLog->islem = 'ekleme';
			$ilanLog->tarih = date('Y-m-d H:i:s');
			if($ilanLog->create() == false ):
				$transaction->rollback(parent::mesajParcala($ilanLog));
			endif;
			
			//Aciklama
			$ilanAciklama = new ilanAciklamalari();
			$ilanAciklama->setTransaction($transaction);
			$ilanAciklama->ilan_id =  $ilan->id;
			$ilanAciklama->aciklama  = $params['aciklama'];
			if($ilanAciklama->create() == false ):
				$transaction->rollback(parent::mesajParcala($ilanAciklama));
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
            $this->imageNames = $resimler;
        return json_encode($response);

	}
	public function duzenle($params){
		 try {
		 //Transaction Başlat
		 $manager = parent::diGet('transactions');
		 $transaction = $manager->get();
		 $ilan = $this->getir($params['id']);
		 $ilan->setTransaction($transaction);
		 $ilan->baslik = $params['baslik'];
		 $ilan->permalink = parent::diGet('helper')->permalink($params['baslik']);
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
		 $ilan->hasarsiz = $params['hasar'];
		 $ilan->guncellenme_tarihi = date('Y-m-d H:i:s');
		 if($ilan->update() == false):
		 	$transaction->rollback(parent::mesajParcala($ilan));
		 endif;
		 //İlan Log
		 $ilanLog = new ilanLoglari();
		 $ilanLog->setTransaction($transaction);
		 $ilanLog->ilan_id = $ilan->id;
		 $ilanLog->kullanici_id = parent::diGet('sessionObj')->kullaniciId;
		 $ilanLog->islem = 'guncelleme';
		 $ilanLog->tarih = date('Y-m-d H:i:s');
		 if($ilanLog->create() == false ):
		 	$transaction->rollback(parent::mesajParcala($ilanLog));
		 endif;
		 //Aciklama
		 $ilanAciklama = new ilanAciklamalari();
		 $ilanAciklama->setTransaction($transaction);
		 $ilanAciklama->ilan_id =  $ilan->id;
		 $ilanAciklama->aciklama  = $params['aciklama'];
		 if($ilanAciklama->update() == false ):
		 	$transaction->rollback(parent::mesajParcala($ilanAciklama));
		 endif;
		 //Güncelle
			 $transaction->commit();
			 $response['status']= 'success';
			 $response['message'] = parent::diGet('message')->_('successEdit');
		 } catch (TxFailed $e) {
		 //Güncellenemedi
		 	$response['status']='error';
		 	$response['message']= $e->getMessage();
		 }
		 return json_encode($response);
	}
	public function dataTable(){
		$datatable = new ilanlarDatatable();
		return $datatable->dataTable();
	}
	public function ilanGetir($id){
		$sql = "CALL ilan_getir({$id})";
		$ilan = new self();
		$result = (object) $ilan->getReadConnection()->query($sql)->fetch();
		return $result;
	}
	public function sil($params){
		try {
			//Transaction Başlat
			$manager = parent::diGet('transactions');
			$transaction = $manager->get();
			$ilan = $this->getir($params['id']);
			$ilan->setTransaction($transaction);
			if($ilan->delete() == false ):
				$transaction->rollback(parent::mesajParcala($ilan));
			endif;
			$iU = new imageUpload;
			$iU->deleteImage($ilan->kapak_foto);
			foreach($ilan->ilanResimleri as $resim){
				$iU->deleteImage($resim->resim_link);
			}
			//Silindi
			$transaction->commit();
			$response['status']= 'success';
			$response['message'] = parent::diGet('message')->_('successRemove');
		} catch (TxFailed $e) {
			//Silinemedi
			$response['status']='error';
			$response['message']= $e->getMessage();
		}
		return json_encode($response);
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
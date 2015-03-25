<?php 
namespace Modules\Backend\Models;
class ilanlar extends ModelBase{
	protected function initialize(){
		parent::initialize();
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
}
?>
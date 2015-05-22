<?php 
namespace Modules\Backend\Models;
class ilanKapora extends ModelBase{
	protected  function initialize(){
		parent::initialize();
	}
	public function getir($ilanId){
		return self::findFirst(array(
				"conditions"=>"ilan_id = ?1",
				"bind"=>array(
						1=>$ilanId
				)
		));
	}
	public function ekleDuzenle($params){
		$kapora = $this->getir($params['ilanId']);
		//Daha Önce Varsa
		if($kapora):
			//Sil
			if($params['durum']== 0):
				if($kapora->delete() == false ):
					$response['status'] = 'error';
					$response['message'] = parent::mesajParcala($kapora);
				else:
					$response['status'] = 'success';
					$response['message'] = parent::diGet('message')->_('successRemove');
				endif;
			//Düzenle
			else:
				$kapora->fiyat = $params['fiyat'];
				$kapora->aciklama = $params['aciklama'];
				$kapora->durum = $params['durum'];
				if($kapora->update() == false ):
					$response['status'] = 'error';
					$response['message'] = parent::mesajParcala($kapora);
				else:
					$response['status'] = 'success';
					$response['message'] = parent::diGet('message')->_('succesAdd', array('name'=> 'kapora'));
				endif;
			endif;
			//Ekle
		else:
			try {
				//Transaction Başlat
				$manager = parent::diGet('transactions');
				$transaction = $manager->get();
				//Kapora Ekle
				$kapora = new ilanKapora();
				$kapora->ilan_id =  $params['ilanId'];
				$kapora->fiyat = $params['fiyat'];
				$kapora->aciklama = $params['aciklama'];
				$kapora->durum = 1;
				if($kapora->create() == false):
					$transaction->rollback(parent::mesajParcala($kapora));
				endif;
				//Hareket Ekle
				$hareket = new hareketler();
				$hareket->tip = 'ilan';
				$hareket->hareket_tip = 'kapora';
				$hareket->label = "default";
				$hareket->icon = "fa-bell-o";
				$hareket->ilan_id = $kapora->ilan_id;
				$hareket->eklenme_tarihi = date('Y-m-d H:i:s');
				if($hareket->create() == false):
					$transaction->rollback(parent::mesajParcala($hareket));
				endif;
				//Eklendi
				$transaction->commit();
				$response['status']= 'success';
				$response['message'] = parent::diGet('message')->_('succesAdd', array('name'=> 'kapora'));
			} catch (TxFailed $e) {
				//Eklenemedi
				$response['status']='error';
				$response['message']= $e->getMessage();
			}
		endif;
		return json_encode($response);
	}
}
?>
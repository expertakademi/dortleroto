<?php 
namespace Modules\Frontend\Models;
class mesajlar extends ModelBase{
	protected function initialize(){
		parent::initialize();
	}
	public function yeni($params){
		$mesaj = self::findFirst(array(
				"conditions"=>"ilan_id=?1 AND (musteri_email=?2 OR musteri_tel = ?3)",
				"bind"=>array(
						1=>$params['ilan_id'],
						2=>$params['email'],
						3=>$params['tel']
				)
		));
		if($mesaj):
			try {
				//Transaction Başlat
				$manager = parent::diGet('transactions');
				$transaction = $manager->get();
				$mesaj->setTransaction($transaction);
				$mesaj->okundu = 0;
				if($mesaj->update() == false ):
					$transaction->rollback(parent::mesajParcala($mesaj));
				endif;
				$ileti = new iletiler();
				$ileti->mesaj_id = $mesaj->id;
				$ileti->ileti = $params['mesaj'];
				$ileti->gonderici = 0;
				$ileti->eklenme_tarihi = date('Y-m-d H:i:s');
				if($ileti->create() == false ):
					$transaction->rollback(parent::mesajParcala($ileti));
				endif;
				//Eklendi
				$transaction->commit();
				$response['status']= 'success';
				$response['message'] = parent::diGet('message')->_('succesAdd', array('name'=> 'mesaj'));
			} catch (TxFailed $e) {
				//Eklenemedi
				$response['status']='error';
				$response['message']= $e->getMessage();
			}
		else:
			try {
				//Transaction Başlat
				$manager = parent::diGet('transactions');
				$transaction = $manager->get();
				$mesaj = new self();
				$mesaj->setTransaction($transaction);
				$mesaj->ilan_id = $params['ilan_id'];
				$mesaj->musteri_adi = $params['ad'];
				$mesaj->musteri_email = $params['email'];
				$mesaj->musteri_tel = $params['tel'];
				$mesaj->tip = 'site';
				$mesaj->okundu = 0;
				if($mesaj->create() == false ):
					$transaction->rollback(parent::mesajParcala($mesaj));
				endif;
				$ileti = new iletiler();
				$ileti->setTransaction($transaction);
				$ileti->mesaj_id = $mesaj->id;
				$ileti->ileti = $params['mesaj'];
				$ileti->gonderici = 0;
				$ileti->eklenme_tarihi = date('Y-m-d H:i:s');
				if($ileti->create() == false ):
					$transaction->rollback(parent::mesajParcala($ileti));
				endif;
				//Eklendi
				$transaction->commit();
				$response['status']= 'success';
				$response['message'] = parent::diGet('message')->_('succesAdd', array('name'=> 'mesaj'));
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
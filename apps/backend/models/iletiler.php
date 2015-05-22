<?php 
namespace Modules\Backend\Models;
class iletiler extends ModelBase{
	protected function initialize(){
		parent::initialize();
	}
	public function iletileriGetir($mesajId){
		return self::find(array(
				"conditions"=>"mesaj_id=?1",
				"bind"=>array(
						1=>$mesajId
				)
				));
	}
	public function yeni($params){
		try {
			//Transaction Başlat
			$manager = parent::diGet('transactions');
			$transaction = $manager->get();
			$ileti = new iletiler();
			$ileti->setTransaction($transaction);
			$ileti->mesaj_id = $params['id'];
			$ileti->ileti = $params['mesaj'];
			$ileti->gonderici = 1;
			$ileti->eklenme_tarihi = date('Y-m-d H:i:s');
			if($ileti->create() == false ):
				$transaction->rollback($ileti);
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
		return json_encode($response);
	}
}
?>
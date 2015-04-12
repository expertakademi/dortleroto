<?php 
namespace Modules\Backend\Models;
class musteriler extends ModelBase{
	protected function initialize(){
		parent::initialize();
	}
	public function getir($id){
		return self::findFirst(array(
				"conditions"=>"id=?1",
				"bind"=> array(
						1 => $id
				)
		));
	}
	public function yeni($params){
		try {
			//Transaction Başlat
			$manager = parent::diGet('transactions');
			$transaction = $manager->get();
			//Müşteri Ekle
			$musteri = new musteriler();
			$musteri->ad = $params['ad'];
			
			$musteri->sabit_telefon = str_replace(array('(',')',' ','-'),'',$params['sabit']);
			$musteri->cep_telefon = str_replace(array('(',')',' ','-'),'',$params['cep']);
			$musteri->email = $params['email'];
			$musteri->adres = $params['adres'];
			if($musteri->create() == false):
				$transaction->rollback(parent::messageParcala($musteri));
			endif;
			//Müşteri Notu  Ekle -> Eğer boş değilse
			if($params['not']!=''):
				$not = new musteriNotlari();
				$not->musteri_id = $musteri->id;
				$not->not = $params['not'];
				if($not->create() == false):
					$transaction->rollback(parent::messageParse($not));
				endif;
			endif;
			//Eklendi
			$transaction->commit();
			$response['status']= 'success';
			$response['message'] = parent::diGet('message')->_('succesAdd', array('name'=> 'müşteri'));
							
		} catch (TxFailed $e) {
			//Eklenemedi
			$response['status']='error';
			$response['message']= $e->getMessage();
		}
		return json_encode($response);
	}
	public function duzenle($params){
		$musteri = $this->getir($params['id']);
		$musteri->ad = $params['ad'];
		$musteri->sabit_telefon = str_replace(array('(',')',' ','-'),'',$params['sabit']);
		$musteri->cep_telefon = str_replace(array('(',')',' ','-'),'',$params['cep']);
		$musteri->email = $params['email'];
		$musteri->adres = $params['adres'];
		if($musteri->update() == false ):
			$response['status'] = 'error';
			$response['message'] = parent::mesajParcala($musteri);
		else:
			$response['status'] = 'success';
			$response['message'] = parent::diGet('message')->_('succesEdit');
		endif;
		return json_encode($response);
	}
	public function dataTable(){
		$results = self::find(array(
				"columns"=>"id as DT_RowId,ad,cep_telefon,email"
		))->toArray();
		$data = array("data"=>$results);
		return json_encode($data);
	}
	public function sil($id){
		$musteri = $this->getir($id);
		if($musteri->delete() == false ):
			$response['status'] = 'error';
			$response['message'] = parent::mesajParcala($musteri);
		else:
			$response['status'] = 'success';
			$response['message'] = parent::diGet('message')->_('succesRemove');
		endif;
		return json_encode($response);
	}
	public function musteriCepTelefonları(){
		return self::find(array(
				"columns"=>"cep_telefon",
				"conditions"=>"cep_telefon IS NOT NULL",
		));
	}
}
?>
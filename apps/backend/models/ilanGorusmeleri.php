<?php 
namespace Modules\Backend\Models;
class ilanGorusmeleri extends ModelBase{
	protected function initialize(){
		parent::initialize();
	}
	public function yeni($params){
		try {
			//Transaction Başlat
			$manager = parent::diGet('transactions');
			$transaction = $manager->get();
			//Görüşme Ekle
			$ilanGorusme = new ilanGorusmeleri();
			$ilanGorusme->ad = $params['ad'];
			$ilanGorusme->telefon = str_replace(array('(',')',' ','-'),'',$params['telefon']);
			$ilanGorusme->aciklama = $params['aciklama'];
			$ilanGorusme->ilan_id = $params['ilan_id'];
			$ilanGorusme->tarih = parent::dateTimePicker($params['tarih']);
			if($ilanGorusme->create() == false):
				$transaction->rollback(parent::mesajParcala($ilanGorusme));
			endif;
			//Hareket Ekle
			$hareket = new hareketler();
			$hareket->tip = 'ilan';
			$hareket->hareket_tip = 'gorusme';
			$hareket->label = "info";
			$hareket->icon = "fa-shopping-cart";
			$hareket->ilan_id = $ilanGorusme->ilan_id;
			$hareket->eklenme_tarihi = date('Y-m-d H:i:s');
			if($hareket->create() == false):
				$transaction->rollback(parent::mesajParcala($hareket));
			endif;
			//Eklendi
			$transaction->commit();
			$response['status']= 'success';
			$response['message'] = parent::diGet('message')->_('succesAdd', array('name'=> 'görüşme'));
		} catch (TxFailed $e) {
			//Eklenemedi
			$response['status']='error';
			$response['message']= $e->getMessage();
		}
		return json_encode($response);
	}

	public function dataTable($ilanId){
		$results = self::find(array(
				"columns"=>"id as DT_RowId,ad,telefon,aciklama,tarih",
				"conditions"=> "ilan_id = ?1",
				"order"=>"id DESC",
				"bind"=> array(
						1 => $ilanId
				)
		))->toArray();
		$data = array("data"=>$results);
		return json_encode($data);
	}
	public function gorusmeSayi($minDate,$maxDate){
		if($minDate == null ):
			$gorusme = self::count(array(
				"conditions"=>"DATE(tarih) = CURDATE()"	
			));
			if($gorusme):
				return $gorusme;
			else:
				return 0;
			endif;
		else:
			$minDate = "{$minDate} 00:00";
			$maxDate = "{$maxDate} 23:59";
			$gorusme = self::count(array(
					"conditions"=>"tarih BETWEEN '{$minDate}' AND '{$maxDate}'"
			));
			if($gorusme):
				return $gorusme;
			else:
				return 0;
			endif;
		endif;
	}
	public function gorusmeOrtalama(){
		$ortalama = self::findFirst(array(
				"columns"=>"count(*) / count(distinct date(tarih)) as ortalama"	
		));
		if($ortalama->ortalama):
			return $ortalama->ortalama;
		else:
			return 0;
		endif;
	}
}
?>
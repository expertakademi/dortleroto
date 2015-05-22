<?php 
namespace Modules\Backend\Models;
use Modules\Backend\Models\ilanlar;
class satislar extends ModelBase{
	protected function initialize(){
		parent::initialize();
	}
	public function yeni($params){
		try {
			//Transaction Başlat
			$manager = parent::diGet('transactions');
			$transaction = $manager->get();
			//Satış Ekle
			$satis = new satislar();
			$satis->ilan_id = $params['ilan_id'];
			$satis->fiyat = $params['fiyat'];
			$satis->aciklama = $params['aciklama'];
			$satis->eklenme_tarihi = parent::dateTimePicker($params['tarih']);
			if($satis->create() == false ):
				$transaction->rollback(parent::mesajParcala($satis));
			endif;
			//İlan Satıldı
			$ilan = ilanlar::findFirst(array(
					"conditions"=>"id = ?1",
					"bind"=>array(
							1=>$params['ilan_id']
					)
			));
			$ilan->aktif = 2;
			if($ilan->update() == false ):
				$transaction->rollback(parent::mesajParcala($ilan));
			endif;
			//Hareket Ekle
			$hareket = new hareketler();
			$hareket->tip = 'ilan';
			$hareket->hareket_tip = 'satis';
			$hareket->label = "success";
			$hareket->icon = "fa-bar-chart-o";
			$hareket->ilan_id = $satis->ilan_id;
			$hareket->eklenme_tarihi = date('Y-m-d H:i:s');
			if($hareket->create() == false):
				$transaction->rollback(parent::mesajParcala($hareket));
			endif;
			//Eklendi
			$transaction->commit();
			$response['status']= 'success';
			$response['message'] = parent::diGet('message')->_('succesAdd', array('name'=> 'satış'));
		} catch (TxFailed $e) {
			//Eklenemedi
			$response['status']='error';
			$response['message']= $e->getMessage();
		}
		return json_encode($response);
		
	}
	public function getir($ilanId){
		return self::findFirst(array(
				"conditions"=>"ilan_id = ?1",
				"bind"=>array(
						1=>$ilanId
				)
		));
	}
	
	public function chart($minDate,$maxDate){
		if($minDate != null ):
			$minDate = "{$minDate} 00:00";
			$maxDate = "{$maxDate} 23:59";
			$sql = "CALL satislar_chart('{$minDate}','{$maxDate}')";
		else:
			$sql = "CALL satislar_chart(null,null)";
		endif;
		//Veriyi Getir
		$satis = new self();
		$result = $satis->getReadConnection()->query($sql)->fetchAll();
		//chart verisi
		$data = array();
		//diğer veriler
		$minimum = $result[0][2];
		$maximum = $result[0][2];
		$adet = 0;
		$toplam = 0;
		foreach($result as $item){
			$data[]= array($item[0],$item[1]);
			if($minimum>$item[2]):
				$minimum = $item[2];
			endif;
			if($maximum<$item[3]):
				$maximum = $item[3];
			endif;
			$adet += $item[4];
			$toplam += $item[1];
		}
		$response['veri']= $data;
		if($minDate != null):
			$response['min'] = $minimum;
			$response['max'] = $maximum;
			$response['adet'] = $adet;
			$response['toplam'] = $toplam;
		else:
			$key = end(array_keys($result));
			$response['min'] = $result[$key][2];
			$response['max'] = $result[$key][3];
			$response['adet'] = $result[$key][4];
			$response['toplam'] = $result[$key][1];
		endif;

		return $response;
	}
	public function satisMiktariToplam($minDate,$maxDate){
		if($minDate == null):
			$miktar =  self::sum(array(
					"column"=>"fiyat",
					"conditions"=>"DATE(eklenme_tarihi) = CURDATE()"
			));
			if($miktar):
				return $miktar;
			else:
				return 0;
			endif;
		else:
			$minDate = "{$minDate} 00:00";
			$maxDate = "{$maxDate} 23:59";
			$miktar =  self::sum(array(
					"column"=>"fiyat",
					"conditions"=>"eklenme_tarihi BETWEEN '{$minDate}' AND '{$maxDate}'"
			));
			if($miktar):
				return $miktar;
			else:
				return 0;
			endif;
		endif;
	}
	public function satisMiktariOrtalama(){
			$miktar =  self::average(array(
					"column"=>"fiyat",
			));
			if($miktar):
				return $miktar;
			else:
				return 0;
			endif;
	}
}
?>
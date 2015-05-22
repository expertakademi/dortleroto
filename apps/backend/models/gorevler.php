<?php 
namespace Modules\Backend\Models;
class gorevler extends ModelBase{
	protected function initialize(){
		parent::initialize();
	}
	public function getir($id){
		return self::findFirst(array(
				"conditions"=>"id=?1",
				"bind"=>array(
						1 => $id
				)
		));
	}
	public function sil($id){
		$gorev = $this->getir($id);
		if($gorev->delete() == false ):
			$response['status'] = 'error';
			$response['message'] = parent::mesajParcala($marka);
		else:
			$response['status'] = 'success';
			$response['message'] = parent::diGet('message')->_('succesRemove');
		endif;
		return json_encode($response);
	}
	public function tamamla($id){
		$gorev = $this->getir($id);
		$gorev->durum = 1;
		if($gorev->update() == false ):
			$response['status'] = 'error';
			$response['message'] = parent::mesajParcala($marka);
		else:
			$response['status'] = 'success';
			$response['message'] = parent::diGet('message')->_('succesEdit');
		endif;
		return json_encode($response);
	}
	public function yeni($params){
		$this->aciklama = $params['aciklama'];
		$this->tip = $params['tip'];
		$this->tarih = parent::dateTimePicker($params['tarih']);
		$this->durum = 0;
		if($this->create() == false ):
			$response['status'] = 'error';
			$response['message'] = parent::mesajParcala($this);
		else:
			$response['status'] = 'success';
			$response['message'] = parent::diGet('message')->_('succesAdd', array('name'=> 'görev'));
		endif;
		return json_encode($response);
	}
	public function duzenle($params){
		$gorev = $this->getir($params['id']);		
		$gorev->aciklama = $params['aciklama'];
		$gorev->tip = $params['tip'];
		$gorev->tarih = parent::dateTimePicker($params['tarih']);
		if($gorev->update() == false ):
			$response['status'] = 'error';
			$response['message'] = parent::mesajParcala($this);
		else:
			$response['status'] = 'success';
			$response['message'] = parent::diGet('message')->_('succesEdit');
		endif;
		return json_encode($response);
	}

	public function listele($type=null,$minDate=null,$maxDate=null){
		if($minDate == null || $maxDate == null):
			if($type == null):
				return self::find(array(
						"conditions"=>"DATE(tarih) = CURDATE()",
				));
			elseif ($type == 'tamamlanmis'):
				return self::find(array(
						"conditions"=>"durum = 1 AND DATE(tarih) = CURDATE()",
				));
			elseif ($type == 'gecmis'):
				$timeRange =date('Y-m-d H:i:s', strtotime("-50 days"));
				return self::find(array(
						"conditions"=>"tarih >= ?1 AND durum =?2",
						"bind"=>array(
								1 => $timeRange,
								2 => 0
						)
				));
			elseif ($type == 'bekleyen'):
				return self::find(array(
						"conditions"=>"durum = 0 AND DATE(tarih) = CURDATE()",
				));
			endif;
		else:
			$minDate = "{$minDate} 00:00";
			$maxDate = "{$maxDate} 23:59";
			if($type == null):
				return self::find(array(
						"conditions"=>"tarih BETWEEN '{$minDate}' AND '{$maxDate}'",
				));
			elseif ($type == 'tamamlanmis'):
				return self::find(array(
						"conditions"=>"durum = 1 AND tarih BETWEEN '{$minDate}' AND '{$maxDate}'",
				));
			elseif ($type == 'gecmis'):
				$timeRange =date('Y-m-d H:i:s', strtotime("-50 days"));
				return self::find(array(
						"conditions"=>"tarih >= ?1 AND durum =?2",
						"bind"=>array(
								1 => $timeRange,
								2 => 0
						)
				));
			elseif ($type == 'bekleyen'):
				return self::find(array(
						"conditions"=>"durum = 0 AND tarih BETWEEN '{$minDate}' AND '{$maxDate}'",
				));
			endif;
			
		endif;
		
		


	}
	
	public function dataTable(){
		$results = self::find(array(
				"columns"=>"id as DT_RowId,aciklama,tip,tarih,durum"
		))->toArray();
		$data = array("data"=>$results);
		return json_encode($data);
	}
}
?>
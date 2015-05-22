<?php 
namespace Modules\Backend\Models;
class yazismalar extends ModelBase{
	protected function initialize(){
		parent::initialize();
	}
	public function getir($minDate,$maxDate){
	if($minDate == null || $maxDate == null):
		return yazismalarView::find(array(
			"conditions"=>"DATE(tarih) = CURDATE()",
			"order"=>"tarih asc"
		));	
	else:
		$minDate = "{$minDate} 00:00";
		$maxDate = "{$maxDate} 23:59";
		return yazismalarView::find(array(
				"conditions"=>"tarih BETWEEN '{$minDate}' AND '{$maxDate}'",
				"order"=>"tarih asc"
		));
	endif;
	}
	public function yeni($params){
		$this->kullanici_id = parent::diGet('sessionObj')->kullaniciId;
		$this->mesaj = $params['mesaj'];
		$this->tarih = date('Y-m-d H:i:s');
		if($this->create() == false ):
			$response['status'] = 'error';
			$response['message'] = parent::mesajParcala($this);
		else:
			$response['status'] = 'success';
			$response['message'] = parent::diGet('message')->_('succesAdd', array('name'=> 'mesaj'));
		endif;
		return json_encode($response);
	}
}
class yazismalarView extends ModelBase{

}
?>
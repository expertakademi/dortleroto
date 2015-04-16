<?php 
namespace Modules\Backend\Models;
use Modules\Backend\Models\ilanlar;
class satislar extends ModelBase{
	protected function initialize(){
		parent::initialize();
	}
	public function yeni($params){
		$this->ilan_id = $params['ilan_id'];
		$this->fiyat = $params['fiyat'];
		$this->aciklama = $params['aciklama'];
		$this->eklenme_tarihi = date('Y-m-d H:i:s');
		if($this->create() == false ):
			$response['status'] = 'error';
			$response['message'] = parent::mesajParcala($this);
		else:
			$ilan = ilanlar::findFirst(array(
					"conditions"=>"id = ?1",
					"bind"=>array(
							1=>$params['ilan_id']
					)
			));
			$ilan->aktif = 2;
			$ilan->update();
			$response['status'] = 'success';
			$response['message'] = parent::diGet('message')->_('succesAdd', array('name'=> 'satis'));
		endif;
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
}
?>
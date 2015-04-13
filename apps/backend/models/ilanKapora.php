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
		if($kapora):
			if($params['durum']== 0):
				if($kapora->delete() == false ):
					$response['status'] = 'error';
					$response['message'] = parent::mesajParcala($kapora);
				else:
					$response['status'] = 'success';
					$response['message'] = parent::diGet('message')->_('successRemove');
				endif;
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
		else:
			$this->ilan_id =  $params['ilanId'];
			$this->fiyat = $params['fiyat'];
			$this->aciklama = $params['aciklama'];
			$this->durum = 1;
			if($this->create() == false ):
				$response['status'] = 'error';
				$response['message'] = parent::mesajParcala($this);
			else:
				$response['status'] = 'success';
				$response['message'] = parent::diGet('message')->_('succesAdd', array('name'=> 'kapora'));
			endif;
		endif;
		return json_encode($response);
	}
}
?>
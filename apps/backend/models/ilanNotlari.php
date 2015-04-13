<?php 
namespace Modules\Backend\Models;
class ilanNotlari extends ModelBase{
	protected function initialize(){
		parent::initialize();
	}
	public function yeni($params){
		$this->aciklama = $params['aciklama'];
		$this->ilan_id = $params['ilan_id'];
		if($this->create() == false ):
			$response['status'] = 'error';
			$response['message'] = parent::mesajParcala($this);
		else:
			$response['status'] = 'success';
			$response['message'] = parent::diGet('message')->_('succesAdd', array('name'=> 'not'));
		endif;
		return json_encode($response);
	}
	public function dataTable($ilanId){
		$results = self::find(array(
				"columns"=>"id as DT_RowId,aciklama",
				"conditions"=> "ilan_id = ?1",
				"order"=>"id DESC",
				"bind"=> array(
						1 => $ilanId
				)
		))->toArray();
		$data = array("data"=>$results);
		return json_encode($data);
	}
}
?>
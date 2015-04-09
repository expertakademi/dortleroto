<?php 
namespace Modules\Backend\Models;
class musteriNotlari extends ModelBase{
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
		$this->aciklama = $params['aciklama'];
		$this->musteri_id = $params['musteri_id'];
		if($this->create() == false ):
			$response['status'] = 'error';
			$response['message'] = parent::mesajParcala($this);
		else:
			$response['status'] = 'success';
			$response['message'] = parent::diGet('message')->_('succesAdd', array('name'=> 'not'));
		endif;
		return json_encode($response);
	}
	public function duzenle($params){
		$musteriNot = $this->getir($params['id']);
		$musteriNot->aciklama = $params['aciklama'];
		if($musteriNot->update() == false ):
			$response['status'] = 'error';
			$response['message'] = parent::mesajParcala($musteriNot);
		else:
			$response['status'] = 'success';
		$response['message'] = parent::diGet('message')->_('succesEdit');
			endif;
		return json_encode($response);
	}
	public function sil($id){
		$musteriNot = $this->getir($id);
		if($musteriNot->delete() == false ):
			$response['status'] = 'error';
			$response['message'] = parent::mesajParcala($musteriNot);
		else:
		$response['status'] = 'success';
		$response['message'] = parent::diGet('message')->_('succesRemove');
		endif;
		return json_encode($response);
	}
	public function dataTable($musteriId){
		$results = self::find(array(
				"columns"=>"id as DT_RowId,aciklama",
				"conditions"=> "musteri_id = ?1",
				"order"=>"id DESC",
				"bind"=> array(
						1 => $musteriId
				)
		))->toArray();
		$data = array("data"=>$results);
		return json_encode($data);
	}
}
?>
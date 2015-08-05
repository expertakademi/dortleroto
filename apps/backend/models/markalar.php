<?php
namespace Modules\Backend\Models;
use Phalcon\Mvc\Model\Validator\StringLength;
class markalar extends ModelBase{
	protected function initialize(){
		parent::initialize();
		$this->hasMany("id", "Modules\Backend\Models\ilanlar", "marka_id", array(
				"foreignKey" => array(
						"message" => parent::diGet('message')->_("foreignKeyDelete",array("name"=>"marka","table"=>"ilanlar"))
				)
		));
		$this->hasMany("id", "Modules\Backend\Models\seriler", "marka_id", array(
				"foreignKey" => array(
						"message" => parent::diGet('message')->_("foreignKeyDelete",array("name"=>"marka","table"=>"seriler"))
				)
		));
	}
	public function getir($id){
		return self::findFirst(array(
				"conditions"=>"id = ?1",
				"bind" => array(
						1 => $id
				)
		));
	}
	public function tumunuGetir(){
		return self::find();
	}
	public function yeni($params){
	
		$this->ad = $params['markaAdi'];
		$this->siralama = $params['siralama'];
		if($this->create() == false ):
			$response['status'] = 'error';
			$response['message'] = parent::mesajParcala($this);
		else:
			$response['status'] = 'success';
			$response['message'] = parent::diGet('message')->_('succesAdd', array('name'=> 'marka'));
		endif;
		return json_encode($response);
	}
	public function duzenle($params){
		$marka = $this->getir($params['id']);
		$marka->ad = $params['markaAdi'];
		$marka->siralama = $params['siralama'];
		if($marka->update() == false ):
			$response['status'] = 'error';
			$response['message'] = parent::mesajParcala($marka);
		else:
			$response['status'] = 'success';
			$response['message'] = parent::diGet('message')->_('succesEdit');
		endif;
		return json_encode($response);
	}
	public function sil($id){
		$marka = $this->getir($id);
		if($marka->delete() == false ):
			$response['status'] = 'error';
			$response['message'] = parent::mesajParcala($marka);
		else:
			$response['status'] = 'success';
			$response['message'] = parent::diGet('message')->_('succesRemove');
		endif;
		return json_encode($response);
	}
	public function dataTable(){
		$results = self::find(array(
				"columns"=>"id as DT_RowId,ad,siralama",
				"order"=>"siralama"
		))->toArray();
		$data = array("data"=>$results);
		return json_encode($data);
	}
	
	## validate ##
	private function validation(){
		$this->validate(new StringLength(array(
			"field" => "ad",
			"max"	=> 200,
			"min"	=> 3,
			"messageMaximum" => parent::diGet('message')->_('stringMax', array('name'=> 'Marka adı', 'max'=>'200')),
			"messageMinimum" => parent::diGet('message')->_('stringMin', array('name'=> 'Marka adı', 'min'=>'3'))
		)));
		
		if($this->validationHasFailed() || isset($error)):
			return false;
		endif;
	}
	private function afterValidationOnCreate(){
		$this->permalink = parent::diGet('helper')->permalink($this->ad);
	}

}
?>
<?php 
namespace Modules\Backend\Models;
use Phalcon\Mvc\Model\Validator\StringLength;
class modeller extends ModelBase{
	protected function initialize(){
		parent::initialize();
		$this->belongsTo('seri_id', 'Modules\Backend\Models\seriler', 'id', array(
				'alias' 	 => 'seriler',
				'foreignKey' => true
		));
		$this->hasMany("id", "Modules\Backend\Models\ilanlar", "model_id", array(
				"foreignKey" => array(
						"message" => parent::diGet('message')->_("foreignKeyDelete",array("name"=>"model","table"=>"ilanlar"))
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
	public function yeni($params){
		$this->ad = $params['modelAdi'];
		$this->seri_id = $params['seri'];
		if($this->create() == false ):
			$response['status'] = 'error';
			$response['message'] = parent::mesajParcala($this);
		else:
			$response['status'] = 'success';
			$response['message'] = parent::diGet('message')->_('succesAdd', array('name'=> 'model'));
		endif;
		return json_encode($response);
	}
	public function duzenle($params){
		$model = $this->getir($params['id']);
		$model->ad = $params['modelAdi'];
		$model->seri_id = $params['seri'];
		if($model->update() == false ):
			$response['status'] = 'error';
			$response['message'] = parent::mesajParcala($model);
		else:
			$response['status'] = 'success';
			$response['message'] = parent::diGet('message')->_('succesEdit');
		endif;
		return json_encode($response);
	}
	public function sil($id){
		$model = $this->getir($id);
		if($model->delete() == false ):
			$response['status'] = 'error';
			$response['message'] = parent::mesajParcala($model);
		else:
			$response['status'] = 'success';
			$response['message'] = parent::diGet('message')->_('succesRemove');
		endif;
		return json_encode($response);
	}
	/**
	 * Girilen seriye ait araç modellerini getirir
	 * @param int $seriId
	 * @return phalcon result
	 */
	public function seriyeGoreGetir($seriId){
		return self::find(array(
				"conditions"=>"seri_id=?1",
				"bind" => array(
						1=>$seriId
				)
		));
	}
	public function dataTable(){
		$dt = new modellerDatatable();
		return $dt->dataTable();
	}
	## validate ##
	private function validation(){
		$this->validate(new StringLength(array(
				"field" => "ad",
				"max"	=> 200,
				"min"	=> 3,
				"messageMaximum" => parent::diGet('message')->_('stringMax', array('name'=> 'Model adı', 'max'=>'200')),
				"messageMinimum" => parent::diGet('message')->_('stringMin', array('name'=> 'Model adı', 'min'=>'3'))
		)));
	
		if($this->validationHasFailed() || isset($error)):
		return false;
		endif;
	}
	private function afterValidationOnCreate(){
		$this->permalink = parent::diGet('helper')->permalink($this->ad);
	}
}
class modellerDatatable extends ModelBase{
	public function dataTable(){
		$results = self::find(array(
				"columns"=>"id as DT_RowId,ad,seri_adi,marka_adi"
		))->toArray();
		$data = array("data"=>$results);
		return json_encode($data);
	}
}
?>
<?php
namespace Modules\Backend\Models;
use Phalcon\Mvc\Model\Validator\StringLength;
class seriler extends ModelBase{
	public function initialize(){
		parent::initialize();
		$this->belongsTo('marka_id', 'Modules\Backend\Models\markalar', 'id', array(
			'alias' 	 => 'markalar',
			'foreignKey' => true
		));
		$this->hasMany("id", "Modules\Backend\Models\ilanlar", "seri_id", array(
				"foreignKey" => array(
						"message" => parent::diGet('message')->_("foreignKeyDelete",array("name"=>"seri","table"=>"ilanlar"))
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
	/**
	 * Yeni bir araç serisi ekler
	 * @param array $params -- posttan gelen data
	 * @return json
	 */
	public function yeni($params){

		$this->ad = $params['seriAdi'];
		$this->marka_id = $params['marka'];
		if($this->create() == false ):
			$response['status'] = 'error';
			$response['message'] = parent::mesajParcala($this);
		else:
			$response['status'] = 'success';
			$response['message'] = parent::diGet('message')->_('succesAdd', array('name'=> 'seri'));
		endif;
		return json_encode($response);
	}
	public function duzenle($params){
		$seri = $this->getir($params['id']);
		$seri->ad = $params['seriAdi'];
		$seri->marka = $params['marka'];
		if($seri->update() == false ):
			$response['status'] = 'error';
			$response['message'] = parent::mesajParcala($seri);
		else:
			$response['status'] = 'success';
			$response['message'] = parent::diGet('message')->_('succesEdit');
		endif;
		return json_encode($response);
	}
	public function sil($id){
		$seri = $this->getir($id);
		if($seri->delete() == false ):
			$response['status'] = 'error';
			$response['message'] = parent::mesajParcala($seri);
		else:
			$response['status'] = 'success';
			$response['message'] = parent::diGet('message')->_('succesRemove');
		endif;
		return json_encode($response);
	}
	/**
	 * Girilen markaya ait araç serilerini getirir
	 * @param int $markaId
	 * @return phalcon result
	 */
	public function markayaGoreGetir($markaId){
		return self::find(array(
				"conditions"=>"marka_id=?1",
				"bind" => array(
						1=>$markaId
				)	
		));
	}
	public function dataTable(){
		$dt = new serilerDatatable();
		return $dt->dataTable();
	}
	## validate ##
	private function validation(){
		$this->validate(new StringLength(array(
			"field" => "ad",
			"max"	=> 200,
			"min"	=> 3,
			"messageMaximum" => parent::diGet('message')->_('stringMax', array('name'=> 'Seri adı', 'max'=>'200')),
			"messageMinimum" => parent::diGet('message')->_('stringMin', array('name'=> 'Seri adı', 'min'=>'3'))
		)));
		
		if($this->validationHasFailed() || isset($error)):
			return false;
		endif;
	}
	private function afterValidationOnCreate(){
		$this->permalink = parent::diGet('helper')->permalink($this->ad);
	}

}
class serilerDatatable extends ModelBase{
	public function dataTable(){
		$results = self::find(array(
				"columns"=>"id as DT_RowId,ad,marka_adi"
		))->toArray();
		$data = array("data"=>$results);
		return json_encode($data);
	}
}	
?>
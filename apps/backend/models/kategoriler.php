<?php
namespace Modules\Backend\Models;
use Phalcon\Mvc\Model\Validator\StringLength;
class kategoriler extends ModelBase{
	protected function initialize(){
		parent::initialize();
		$this->hasMany("id", "Modules\Backend\Models\ilanlar", "kategori_id", array(
				"foreignKey" => array(
						"message" => parent::diGet('message')->_("foreignKeyDelete",array("name"=>"kategori","table"=>"ilanlar"))
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

		$this->ad = $params['kategoriAdi'];
		if($this->create() == false ):
			$response['status'] = 'error';
			$response['message'] = parent::mesajParcala($this);
		else:
			$response['status'] = 'success';
			$response['message'] = parent::diGet('message')->_('succesAdd', array('name'=> 'kategori'));
		endif;
		return json_encode($response);
	}
	public function duzenle($params){
		$kategori = $this->getir($params['id']);
		$kategori->ad = $params['kategoriAdi'];
		if($kategori->update() == false ):
			$response['status'] = 'error';
			$response['message'] = parent::mesajParcala($kategori);
		else:
			$response['status'] = 'success';
			$response['message'] = parent::diGet('message')->_('succesEdit');
		endif;
		return json_encode($response);
	}
	public function sil($id){
		$kategori = $this->getir($id);
		if($kategori->delete() == false ):
			$response['status'] = 'error';
			$response['message'] = parent::mesajParcala($kategori);
		else:
			$response['status'] = 'success';
			$response['message'] = parent::diGet('message')->_('succesRemove');
		endif;
		return json_encode($response);
	}
	public function dataTable(){
		$results = self::find(array(
				"columns"=>"id as DT_RowId,ad"
		))->toArray();
		$data = array("data"=>$results);
		return json_encode($data);
	}
	## validate ##
	private function validation(){
		$this->validate(new StringLength(array(
			"field" => "ad",
			"max"	=> 200,
			"min"	=> 5,
			"messageMaximum" => parent::diGet('message')->_('stringMax', array('name'=> 'Kategori adı', 'max'=>'200')),
			"messageMinimum" => parent::diGet('message')->_('stringMin', array('name'=> 'Kategori adı', 'min'=>'5'))
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
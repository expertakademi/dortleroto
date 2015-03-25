<?php
namespace Modules\Backend\Models;
use Phalcon\Mvc\Model\Validator\StringLength;
class kategoriler extends ModelBase{
	protected function initialize(){
		parent::initialize();
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
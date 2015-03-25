<?php
namespace Modules\Backend\Models;
use Phalcon\Mvc\Model\Validator\StringLength;
class markalar extends ModelBase{
	protected function initialize(){
		parent::initialize();
	}
	public function yeni($params){

		$this->ad = $params['markaAdi'];
		if($this->create() == false ):
			$response['status'] = 'error';
			$response['message'] = parent::mesajParcala($this);
		else:
			$response['status'] = 'success';
			$response['message'] = parent::diGet('message')->_('succesAdd', array('name'=> 'marka'));
		endif;
		return json_encode($response);
	}
	public function tumunuGetir(){
		return self::find();
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
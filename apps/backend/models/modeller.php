<?php 
namespace Modules\Backend\Models;
use Phalcon\Mvc\Model\Validator\StringLength;
class modeller extends ModelBase{
	protected function initialize(){
		parent::initialize();
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
?>
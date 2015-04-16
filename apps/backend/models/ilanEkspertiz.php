<?php 
namespace Modules\Backend\Models;
use Modules\Common\Components\imageUpload;
class ilanEkspertiz extends ModelBase{
	public function initialize(){
		parent::initialize();
	}
	public function getir($ilanId){
		return self::findFirst(array(
				"conditions"=>"ilan_id = ?1",
				"bind" => array(
						1 => $ilanId
				)
		));
	}
	public function yeni($params){
		$files = parent::diGet('request')->getUploadedFiles();
		$image = (new imageUpload)->singleUpload($files,'ekspertiz');
		if($image == false):
			$response['status'] = 'error';
			$response['message'] = 'hata';
		else:
			$this->ilan_id = $params['ilan_id'];
			$this->link = $image->link;
			if($this->create() == false):
				$response['status'] = "error";
				$response['status'] = parent::mesajParcala($this);
			else:
				$response['status']='success';
				$response['message'] = parent::diGet('message')->_('succesAdd', array('name'=> 'ekspertiz'));
			endif;	
		endif;
		return json_encode($response);
	}
	
}
?>
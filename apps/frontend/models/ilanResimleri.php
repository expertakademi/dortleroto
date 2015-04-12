<?php 
namespace Modules\Frontend\Models;
class ilanResimleri extends ModelBase{
	protected function initialize(){
		parent::initialize();
	}
	public function ilanaGoreGetir($ilanId){
		return self::find(array(
				"conditions"=>"ilan_id = ?1",
				"bind"=>array(
						1 => $ilanId
				)
		));
	}
}

?>
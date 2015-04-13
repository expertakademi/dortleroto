<?php 
namespace Modules\Backend\Models;
class satislar extends ModelBase{
	protected function initialize(){
		parent::initialize();
	}
	public function getir($ilanId){
		return self::findFirst(array(
				"conditions"=>"ilan_id = ?1",
				"bind"=>array(
						1=>$ilanId
				)
		));
	}
}
?>
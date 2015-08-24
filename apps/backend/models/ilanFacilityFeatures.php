<?php 
namespace Modules\Backend\Models;
use Phalcon\Mvc\Model\Validator\StringLength;
class ilanFacilityFeatures extends ModelBase{
	protected function initialize(){
		parent::initialize();
        $this->belongsTo("ilan_id","Modules\Backend\Models\ilanlar","id",
				array(
					"alias"=>"ilan"	
				));
        $this->belongsTo("facility_feature_id","Modules\Backend\Models\facilityFeatures","id",
				array(
					"alias"=>"facilityFeatures"	
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
}
?>
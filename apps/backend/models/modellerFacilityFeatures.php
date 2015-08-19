<?php 
namespace Modules\Backend\Models;
use Phalcon\Mvc\Model\Validator\StringLength;
class modellerFacilityFeatures extends ModelBase{
	protected function initialize(){
		parent::initialize();
        $this->belongsTo("modeller_id","Modules\Backend\Models\modeller","id",
				array(
					"alias"=>"modeller"	
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
    
    public function getList() {
        $facilites = self::find();
        //print_r($facilites);
        $finalFeatures = array();
        foreach($facilites as $facility) {
            $finalFeatures[$facility->code][$facility->id] = $facility->feature;
        }
        return $finalFeatures;
    }
	
}
?>
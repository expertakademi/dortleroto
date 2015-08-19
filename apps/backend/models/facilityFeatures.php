<?php 
namespace Modules\Backend\Models;
use Phalcon\Mvc\Model\Validator\StringLength;
class facilityFeatures extends ModelBase{
	protected function initialize(){
		parent::initialize();
        
        $this->hasMany("id","Modules\Backend\Models\modellerFacilityFeatures", "facility_feature_id",
            array(
                "alias" => "modellerFacilityFeatures"
            )
        );
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
<?php 
namespace Modules\Frontend\Models;
class ilanFacilityFeatures extends ModelBase{
	protected function initialize(){
		parent::initialize();
        $this->belongsTo("facility_feature_id","Modules\Frontend\Models\facilityFeatures","id",
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
    
    public function getSelectFacilites($ilanId) {
        $facilityRowset = self::find(array(
				"conditions" => "ilan_id = ?1",
				"bind"=>array(
						1 => $ilanId
				)
		));
        
        $facilitesIds = array();
        foreach($facilityRowset as $facilityRow) {
            $facilitesIds[$facilityRow->facility_feature_id] = $facilityRow->facility_feature_id;
        }
        
        return $facilitesIds;
    }
}
?>
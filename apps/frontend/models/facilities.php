<?php 
namespace Modules\Frontend\Models;
use Phalcon\Mvc\Model\Validator\StringLength;
class facilities extends ModelBase{
	protected function initialize(){
		parent::initialize();
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
            $finalFeatures[$facility->code] = $facility->value;
        }
        return $finalFeatures;
    }
	
}
?>
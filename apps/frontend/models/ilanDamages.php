<?php 
namespace Modules\Frontend\Models;
use Modules\Frontend\Models\ilanlar;
class ilanDamages extends ModelBase{
    public function getDamageValues() {
        return array(
            '1' => 'Boyalı',
            '2' => 'Değişmiş'
        );
    }
    
    public function getSelectedDamagesById($ilanId) {
        $damagesRowset = self::find(array(
				"conditions" => "ilan_id = ?1",
				"bind"=>array(
						1 => $ilanId
				)
		));
        
        $damages = array();
        foreach($damagesRowset as $damagesRow) {
            $damages[$damagesRow->area_no] = $damagesRow->value;
        }
        //print_r($damages);exit;
        return $damages;
        
        return $damages;
    }
}
?>
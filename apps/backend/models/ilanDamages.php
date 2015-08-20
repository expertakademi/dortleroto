<?php 
namespace Modules\Backend\Models;
use Modules\Common\Components\imageUpload,
	Modules\Backend\Models\ilanlar;
class ilanDamages extends ModelBase{
	protected function  initialize(){
		parent::initialize();
		$this->belongsTo("ilan_id","Modules\Backend\Models\ilanlar","id",
				array(
					"alias"=>"ilanlar"	
				));
	}
	public function getir($id){
		return self::findFirst($id);
	}
	public function getirByIlanId($id){
		return self::find(array(
				"conditions"=>"ilan_id=?1",
				"bind"=>array(
						1 => $id
				)
		));
	}
	
    public function getDamageValues() {
        return array(
            '1' => 'Boyalı',
            '2' => 'Değişmiş'
        );
    }
}
?>
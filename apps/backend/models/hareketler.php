<?php 
namespace Modules\Backend\Models;
class hareketler extends ModelBase{
	protected function initialize(){
		parent::initialize();
		$this->belongsTo("ilan_id", "Modules\Backend\Models\ilanlar", "id",array(
				'alias'=>"ilanlar"
		));
	}
	public function listele($type,$minDate,$maxDate){
		if($minDate == null):
			if($type != null ):
				return self::find(array(
						"conditions"=>"DATE(eklenme_tarihi) =  CURDATE() AND hareket_tip IN ({$type})"
				));
			else:
				return self::find(array(
						"conditions"=>"DATE(eklenme_tarihi) =  CURDATE()"
				));
			endif;
		else:
			$minDate = "{$minDate} 00:00";
			$maxDate = "{$maxDate} 23:59";
			if($type != null ):
				return self::find(array(
						"conditions"=>"eklenme_tarihi BETWEEN '{$minDate}' AND '{$maxDate}' AND hareket_tip IN ({$type}) "
				));
			else:
				return self::find(array(
						"conditions"=>"eklenme_tarihi BETWEEN '{$minDate}' AND '{$maxDate}'"
				));
			endif;
		endif;
	}
	
}
?>
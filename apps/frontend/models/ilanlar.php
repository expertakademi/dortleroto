<?php 
namespace Modules\Frontend\Models;
class ilanlar extends ModelBase{
	protected function initialize(){
		parent::initialize();
	}
	
	public function anaSayfaSon($offset,$number){
		return self::find(array(
				"columns"  	 => "id, baslik, permalink, fiyat, kilometre",
				"conditions" => "aktif = 1",
				"order"		 => "eklenme_tarihi DESC",
				"limit"		 => array(
						"number" =>  $number,
						"offset" => $offset
				)
					
		));
	}
}
?>
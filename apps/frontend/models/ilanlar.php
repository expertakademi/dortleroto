<?php 
namespace Modules\Frontend\Models;
class ilanlar extends ModelBase{
	protected function initialize(){
		parent::initialize();
	}
	
	public function anaSayfaSon($offset,$number){
		return self::find(array(
				"columns"  	 => "id, baslik, permalink, fiyat, kilometre,kapak_foto",
				"conditions" => "aktif = 1",
				"order"		 => "eklenme_tarihi DESC",
				"limit"		 => array(
						"number" =>  $number,
						"offset" => $offset
				)
					
		));
	}
	public function hasarsizSon($offset,$number){
		return self::find(array(
				"columns"  	 => "id, baslik, permalink, fiyat, kilometre,kapak_foto",
				"conditions" => "aktif = 1 AND hasarsiz = 1",
				"order"		 => "eklenme_tarihi DESC",
				"limit"		 => array(
						"number" =>  $number,
						"offset" => $offset
				)
					
		));
	}
	public function ilanGetir($permalink,$id){
		$sql = "CALL ilan_getir({$id})";
		$ilan = new self();
		$result = (object) $ilan->getReadConnection()->query($sql)->fetch();
		if($result):
			if($result->permalink != $permalink):
				parent::diGet('helper')->goUrl("ilan/{$result->permalink}-{$id}");
			endif;
		else:
			parent::diGet('helper')->goBase();
		endif;
		return $result;
	}
    
    
}
?>
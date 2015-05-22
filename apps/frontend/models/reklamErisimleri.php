<?php 
namespace Modules\Frontend\Models;
class reklamErisimleri extends ModelBase{
	protected function initialize(){
		parent::initialize();
	}
	public function getir($type){
		return self::findFirst(array(
				"conditions"=>"tip=?1 AND DATE(tarih) = CURDATE() ",
				"bind"	=> array(
						1 => $type
				)
		));
	}
	public function yeni($type){
		$this->tip = $type;
		$this->ziyaret = 1;
		$this->tarih = date('Y-m-d');
		$this->create();
	}
	public function arttir ($erisim){
		$erisim->ziyaret += 1;
		$erisim->update();
	}
	public function yeniErisim(){
		$request = new \Phalcon\Http\Request();
		$source = $request->getQuery("utm_source", null, null);
		if($source != null):
			$erisim = $this->getir($source);
			if($erisim):
				$this->arttir($erisim);
			else:
				$this->yeni($source);
			endif;
		else:
			return;
		endif;		
	}
}
?>
<?php 
namespace Modules\Frontend\Models;
class sosyalMedyaZiyaretleri extends ModelBase{
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
	public function arttir ($ziyaret){
		$ziyaret->ziyaret += 1;
		$ziyaret->update();
	}
	public function yeniZiyaret(){
		//İsteği belirler
		$request = new \Phalcon\Http\Request();
		$referer = $request->getHTTPReferer ();
		//Domaini Belirle
		$domain = parse_url($referer, PHP_URL_HOST);
		$domain = str_replace("www.","",$domain);
		//Tipini Belirle
		$type = '';
		if($domain == parent::diGet('domain')):
			return;
		elseif($domain == 'facebook.com' ):
			$type= 'facebook';
		elseif($domain == 'twitter.com'):
			$type = 'twitter';
		else:
			$type='diger';
		endif;
		//İşle
		$ziyaret = $this->getir($type);
		if($ziyaret):
			$this->arttir($ziyaret);
		else:
			$this->yeni($type);
		endif;
	}
}
?>
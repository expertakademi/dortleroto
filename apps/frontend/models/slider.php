<?php 
namespace Modules\Frontend\Models;
class slider extends ModelBase{
	protected function initialize(){
		parent::initialize();
	}
	public function anaSayfaSlider(){
		return self::find(array(
				"conditions"=>"aktif = 1 ",
				"order" => "id DESC, siralama DESC",
				"limit" => 4
		));
	}
}
?>
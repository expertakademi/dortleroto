<?php 
namespace Modules\Frontend\Models;
class kategoriler extends ModelBase{
	protected function initialize(){
		parent::initialize();
	}
	
	public function tumunuGetir(){
		return self::find();
	}
}
?>
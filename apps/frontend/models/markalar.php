<?php 
namespace Modules\Frontend\Models;
class markalar extends ModelBase{
	protected function initialize(){
		parent::initialize();
	}
	public function tumunuGetir(){
		return self::find();
	}
}
?>
<?php 
namespace Modules\Backend\Models;
class motorHacimleri extends ModelBase{
	protected function initialize(){
		parent::initialize();
	}
	public function tumunuGetir(){
		return self::find();
	}
}
?>
<?php 
namespace Modules\Backend\Models;
class kasalar extends ModelBase{
	protected function initialize(){
		parent::initialize();
	}
	public function tumunuGetir(){
		return self::find();
	}
}
?>
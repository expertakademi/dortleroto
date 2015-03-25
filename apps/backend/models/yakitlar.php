<?php 
namespace Modules\Backend\Models;
class yakitlar extends ModelBase{
	protected function initialize(){
		parent::initialize();
	}
	public function tumunuGetir(){
		return self::find();
	}
}
?>
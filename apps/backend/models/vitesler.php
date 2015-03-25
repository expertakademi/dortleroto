<?php 
namespace Modules\Backend\Models;
class vitesler extends ModelBase{
	protected function initialize(){
		parent::initialize();
	}
	public function tumunuGetir(){
		return self::find();
	}
}
?>
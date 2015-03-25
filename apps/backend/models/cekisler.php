<?php 
namespace Modules\Backend\Models;
class cekisler extends ModelBase{
	protected function initialize(){
		parent::initialize();
	}
	public function tumunuGetir(){
		return self::find();
	}
}
?>
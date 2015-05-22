<?php 
namespace Modules\Frontend\Models;
class yakitlar extends ModelBase{
	public function tumunuGetir(){
		return self::find();
	}
}
?>
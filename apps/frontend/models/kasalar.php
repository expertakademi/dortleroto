<?php 
namespace Modules\Frontend\Models;
class kasalar extends ModelBase{
	public function tumunuGetir(){
		return self::find();
	}
}
?>
<?php 
namespace Modules\Frontend\Models;
class motorHacimleri extends ModelBase{
	public function tumunuGetir(){
		return self::find();
	}
}
?>
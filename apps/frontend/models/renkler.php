<?php 
namespace Modules\Frontend\Models;
class renkler extends ModelBase{
	public function tumunuGetir(){
		return self::find();
	}
}
?>
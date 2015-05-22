<?php 
namespace Modules\Frontend\Models;
class cekisler extends ModelBase{
	public function tumunuGetir(){
		return self::find();
	}
}
?>
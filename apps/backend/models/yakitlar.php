<?php 
namespace Modules\Backend\Models;
class yakitlar extends ModelBase{
	protected function initialize(){
		parent::initialize();
	}
	public function tumunuGetir(){
		return self::find();
	}
    public function getir($id){
        return self::findFirst(array(
            "conditions"=>"id = ?1",
            "bind" => array(
                1 => $id
            )
        ));
    }
}
?>
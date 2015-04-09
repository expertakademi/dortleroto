<?php 
namespace Modules\Backend\Models;
class slider extends ModelBase{
	public function initialize(){
		parent::initialize();
	}
	public function dataTable(){
		$results = self::find(array(
				"columns"=>"id as DT_RowId,aciklama,link,siralama,aktif",
				"order"=>"aktif DESC, siralama ASC "
		))->toArray();
		$data = array("data"=>$results);
		return json_encode($data);
	}
}
?>
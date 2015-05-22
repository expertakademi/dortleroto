<?php 
namespace Modules\Backend\Models;
class reklamErisimleri extends ModelBase{
	protected function initialize(){
		parent::initialize();
	}
	public function oranlar($type,$minDate,$maxDate){
		if($maxDate == null || $maxDate == null):
			$timeRange =date('Y-m-d', strtotime("-30 days"));
			$sonuc =  self::find(array(
					"columns"=>"ziyaret",
					"conditions"=>"tarih >= ?1 AND tip=?2",
					"order"=>"tarih ASC",
					"bind"=>array(
							1=>$timeRange,
							2=>$type
					)
			))->toArray();
		else:
			$sonuc =  self::find(array(
					"columns"=>"SUM(ziyaret) as ziyaret",
					"conditions"=>"tarih BETWEEN '{$minDate}' AND '{$maxDate}' AND tip=?1",
					"order"=>"tarih DESC",
					"bind"=>array(
							1=>$type
					)
			))->toArray();
		endif;
		return array_column($sonuc,'ziyaret');
	}
	public function dataTable($type){
		$timeRange =date('Y-m-d H:i:s', strtotime("-30 days"));
		$results = self::find(array(
				"columns"=>"id as DT_RowId,ziyaret,tarih",
				"conditions"=>"tip=?1 AND tarih >= ?2",
				"order"=>"tarih DESC",
				"bind"=> array(
						1=>$type,
						2=>$timeRange
				)
		))->toArray();
		$data = array("data"=>$results);
		return json_encode($data);
	}

}
?>
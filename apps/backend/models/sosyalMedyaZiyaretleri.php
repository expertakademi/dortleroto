<?php 
namespace Modules\Backend\Models;
class sosyalMedyaZiyaretleri extends  ModelBase{
	protected function initialize(){
		parent::initialize();
	}
	public function oranlar($minDate,$maxDate){
		if($minDate == null):
			$sonuclar = self::find(array(
					"columns"=>"tip,ziyaret",
					"conditions"=>"DATE(tarih)  = CURDATE()",
					"group"=>"tip"
			));
		else:
			$minDate = "{$minDate} 00:00";
			$maxDate = "{$maxDate} 23:59";
			$sonuclar = self::find(array(
					"columns"=>"tip,ziyaret",
					"conditions"=>"tarih BETWEEN '{$minDate}' AND '{$maxDate}'",
					"group"=>"tip"
			));
		endif;

		$toplam = 0;
		foreach ($sonuclar as $item){
			$toplam += $item->ziyaret;
		}
		$response['toplam'] = $toplam;
		$response['sonuclar'] = $sonuclar;
		return (object) $response;
	}
	public function erisimler($type,$minDate,$maxDate){
		if($minDate == null):
			$timeRange =date('Y-m-d H:i:s', strtotime("-15 days"));
			if($type == null):
				$sonuclar = self::find(array(
					"columns"=>"tarih,SUM(ziyaret) as ziyaret",
					"conditions"=>"tarih >= '{$timeRange}' ",
					"group"=>"tarih"
				));
			else:
				$sonuclar = self::find(array(
					"columns"=>"tarih,SUM(ziyaret) as ziyaret",
					"conditions"=>"tip=?1 AND tarih >= '{$timeRange}' ",
					"group"=>"tarih",
					"bind"=> array(
							1=>$type
					)
				 ));
			endif;
		else:
			if($type == null ):
				$sonuclar = self::find(array(
					"columns"=>"tarih,SUM(ziyaret) as ziyaret",
					"conditions"=>"tarih BETWEEN '{$minDate}' AND '{$maxDate}'",
					"group"=>"tarih"
				));
			else:
				$sonuclar = self::find(array(
					"columns"=>"tarih,SUM(ziyaret) as ziyaret",
					"conditions"=>"tip=?1 AND tarih BETWEEN '{$minDate}' AND '{$maxDate}'",
					"group"=>"tarih",
					"bind"=> array(
							1=>$type
					)
				));
			endif;
		endif;
		$sonuclar = $sonuclar->toArray();
		$data = array();
		foreach($sonuclar as $item){
			$data[]= array($item['tarih'],$item['ziyaret']);
		}
		return $data;
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
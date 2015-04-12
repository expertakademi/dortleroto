<?php 
namespace Modules\Backend\Models;
use Modules\Common\Components\imageUpload;
class slider extends ModelBase{
	public function initialize(){
		parent::initialize();
	}
	public function getir($id){
		return self::findFirst(array(
				"conditions"=>"id = ?1",
				"bind" => array(
						1 => $id
				)
		));
	}
	public function yeni($params){
		$files = parent::diGet('request')->getUploadedFiles();
		$image = (new imageUpload)->singleUpload($files,'slider',array("x"=>550,"y"=>450));
		if($image == false):
			$response['status'] = 'error';
			$response['message'] = 'hata';
		else:
			$this->aciklama = $params['aciklama'];
			$this->link = $params['link'];
			$this->resim_link = $image->link;
			$this->siralama = $params['siralama'];
			$this->aktif = 1;
			if($this->create() == false):
				$response['status'] = "error";
				$response['status'] = parent::mesajParcala($this);
			else:
				$response['status']='success';
				$response['message'] = parent::diGet('message')->_('succesAdd', array('name'=> 'slider'));
			endif;	
		endif;
		return json_encode($response);
	}
	public function duzenle($params){
		$slider = $this->getir($params['id']);
		$slider->aciklama = $params['aciklama'];
		$slider->link = $params['link'];
		$slider->siralama = $params['siralama'];
		$slider->aktif = $params['aktif'];
		if($slider->update() == false):
			$response['status'] = "error";
			$response['status'] = parent::mesajParcala($slider);
		else:
			$response['status']='success';
			$response['message'] = parent::diGet('message')->_('succesEdit');
		endif;
		return json_encode($response);
	}
	public function sil($id){
		$slider = $this->getir($id);
		$sil = (new imageUpload)->deleteImage($slider->resim_link);
		if($sil):
			if($slider->delete() == false ):
				$response['status'] = 'error';
				$response['message'] = parent::mesajParcala($slider);
			else:
				$response['status'] = 'success';
				$response['message'] = parent::diGet('message')->_('succesRemove');
			endif;
		else:
			$response['status'] = 'error';
			$response['message'] = 'Dosya silinemedi';
		endif;
		return json_encode($response);
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
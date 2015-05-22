<?php 
namespace Modules\Backend\Models;
use Modules\Common\Components\imageUpload,
	Modules\Backend\Models\ilanlar;
class ilanResimleri extends ModelBase{
	protected function  initialize(){
		parent::initialize();
		$this->belongsTo("ilan_id","Modules\Backend\Models\ilanlar","id",
				array(
					"alias"=>"ilanlar"	
				));
	}
	public function getir($id){
		return self::findFirst($id);
	}
	public function getirByIlanId($id){
		return self::find(array(
				"conditions"=>"ilan_id=?1",
				"bind"=>array(
						1 => $id
				)
		));
	}
	public function yeni($params){
		$files = parent::diGet('request')->getUploadedFiles();
		$image = (new imageUpload)->singleUpload($files,'ilan',array("x"=>550,"y"=>450));
		if($image == false):
			$response['status'] = 'error';
			$response['message'] = 'hata';
		else:
			$this->ilan_id = $params['id'];
			$this->resim_link = $image->link;
			if($this->create() == false):
				$response['status'] = "error";
				$response['status'] = parent::mesajParcala($this);
			else:
				$response['status']='success';
				$response['message'] = parent::diGet('message')->_('succesAdd', array('name'=> 'resim'));
			endif;
		endif;
		return json_encode($response);
	}
	public function silTekil($params){
		$resim = $this->getir($params['id']);
		$sonuc = (new imageUpload)->deleteImage($resim->resim_link);
		if($sonuc):
			$resim->delete();
			$response['status']="success";
			$response['message'] = parent::diGet('message')->_('successRemove');
		else:
			$response['status']="error";
			$response['message'] = "Diskten silinemedi.";
		endif;
		return json_encode($response);
	}
	public function kapakDegis($params){
		$resim = $this->getir($params['id']);
		$iU = new imageUpload;
		$yeniKapak = $iU->thumbUpload($resim->resim_link,'thumbnail',array("x"=>200,"y"=>200));
		$ilan = (new ilanlar)->getir($resim->ilan_id);
		$iU->deleteImage($ilan->kapak_foto);
		$ilan->kapak_foto = $yeniKapak['link'];
		if($ilan->update () == false ):
			$response['status'] = "error";
			$response['message'] = "Güncellenemedi";
		else:
			$response['status'] = "success";
			$response['message'] 	= parent::diGet('message')->_("successEdit");
		endif;
		
		return json_encode($response);
	}
}
?>
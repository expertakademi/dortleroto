<?php 
namespace Modules\Backend\Models;
class takvim extends ModelBase{
	protected function initialize(){
		parent::initialize();
	}
	public function getir($id){
		return self::findFirst($id);
	}
	public function yeni($params){
		$this->olay= $params['olay'];
		$this->kullanici_id = parent::diGet('sessionObj')->kullaniciId;
		$this->baslangic_tarihi = parent::dateTimePicker($params['baslangic']);
		$this->bitis_tarihi = parent::dateTimePicker($params['bitis']);
		if($this->create() == false ):
			$response['status']='error';
			$response['message']= parent::mesajParcala($this);
		else:
			$response['status'] = 'success';
			$response['message']= parent::diGet('message')->_('successAdd',array('name'=> 'olay'));
		endif;
		return json_encode($response);
	}
	public function listele(){
		$olaylar = self::find(array(
				"columns"=>"id,olay as title,baslangic_tarihi as start,bitis_tarihi as end"
		));
		$olaylar = $olaylar->toArray();
		return json_encode($olaylar);
	}
	public function tasi($params){
		$olay = $this->getir($params['id']);
		if($olay->kullanici_id != parent::diGet('sessionObj')->kullaniciId):
			return "Bu olay sizin tarafınızdan oluşturulmamış.";
		endif;
		$olay->baslangic_tarihi = str_replace('T',' ',$params['start']);
		$olay->bitis_tarihi = str_replace('T',' ',$params['end']);
		if($olay->update()):
			return "success";
		else:
			return "Bir hata oluştu";
		endif;
	}

}
?>
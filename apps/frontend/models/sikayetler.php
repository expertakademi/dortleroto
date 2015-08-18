<?php 
namespace Modules\Frontend\Models;
class sikayetler extends ModelBase {
	 public function yeni($params){
        $this->mesaj = $params['mesaj'];
        $this->ilan_id = $params['ilan_id'];
        $this->tarih = date('Y-m-d H:i:s');
        
		if($this->create() == false ):
			$response['status'] = 'error';
			$response['message'] = parent::mesajParcala($this);
		else:
			$response['status'] = 'success';
			$response['message'] = parent::diGet('message')->_('succesAdd', array('name'=> 'kategori'));
		endif;
		return json_encode($response);
	}
    
    
}
?>
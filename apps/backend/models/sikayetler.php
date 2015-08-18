<?php 
namespace Modules\Backend\Models;
class sikayetler extends ModelBase{
	protected function initialize(){
		parent::initialize();
	}
	public function tumunuGetir(){
		return self::find();
	}
    
    public function getir($id){
        return self::findFirst(array(
            "conditions" => "id = ?1",
            "bind" => array(
                1 => $id
            )
        ));
    }
    
    public function dataTable(){
		$datatable = new sikayetlerDatatable();
		return $datatable->dataTable();
	}
    
    public function sil($params){
		try {
			//Transaction Başlat
			$manager = parent::diGet('transactions');
			$transaction = $manager->get();
			$ilan = $this->getir($params['id']);
			$ilan->setTransaction($transaction);
			if($ilan->delete() == false ):
				$transaction->rollback(parent::mesajParcala($ilan));
			endif;
			$transaction->commit();
			$response['status']= 'success';
			$response['message'] = parent::diGet('message')->_('successRemove');
		} catch (TxFailed $e) {
			//Silinemedi
			$response['status']='error';
			$response['message']= $e->getMessage();
		}
		return json_encode($response);
	}
}

class sikayetlerDatatable extends ModelBase {
	public function dataTable(){
		$results = self::find(array(
				"columns"=>"id, ilan_id, mesaj,tarih, baslik"
		))->toArray();
		$data = array("data" => $results);
		return json_encode($data);
	}
}
?>
<?php 
namespace Modules\Backend\Models;

class ModelBase extends \Phalcon\Mvc\Model{
	protected function initialize(){
		$this->useDynamicUpdate(true);
		$this->setup([
				'notNullValidations'=>false,
		]);
	}
	public function mesajParcala($model){
		$output= array();
		foreach($model->getMessages () as $message):
		$output[]= $message;
		endforeach;
		$output=implode('<br/>',$output);
		return $output;
	}
	protected function diGet($name){
		return \Phalcon\DI::getDefault()->get($name);
	}
	protected function dateTimePicker($date){
		$date = preg_split('/[-]/', str_replace(" ","",$date));
		return "{$date[2]}-{$date[1]}-{$date[0]} {$date[3]}:00";
	}
	/* Transaction Örnek
	 	try {
			//Transaction Başlat
			$manager = parent::diGet('transactions');
			$transaction = $manager->get();
			$model = new Model();
			$model->setTransaction($transaction);
			if($model->create() == false ):
				$transaction->rollback(mesaj);
			endif;
			//Eklendi
			$transaction->commit();
			$response['status']= 'success';
			$response['message'] = parent::diGet('message')->_('succesAdd', array('name'=> 'eklenen'));
		} catch (TxFailed $e) {
			//Eklenemedi
			$response['status']='error';
			$response['message']= $e->getMessage();
		}
	 * */
}
?>
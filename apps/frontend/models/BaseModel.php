<?php 
namespace Modules\Frontend\Models;
class BaseModel extends \Phalcon\Mvc\Model{
	protected function initialize(){
		$this->useDynamicUpdate(true);
		$this->setup([
				'notNullValidations'=>false,
		]);
	}
	public function messagesLineByLine($model){
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
}
?>
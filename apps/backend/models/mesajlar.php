<?php 
namespace Modules\Backend\Models;
class mesajlar extends ModelBase{
	protected function initialize(){
		parent::initialize();
	}
	public function mesajGetir($mesajId){
		return self::findFirst(array(
				"conditions"=>"id=?1",
				"bind"=>array(
						1=>$mesajId
				)
		));
	}
	public function getir($mesajId){
		return inboxView::findFirst(array(
				"conditions"=>"id=?1",
				"bind"=>array(
						1=>$mesajId
				)
		));
	}
	public function listele($page){
		$builder = parent::diGet('modelsManager')
					->createBuilder()
					->from('Modules\Backend\Models\inboxView');
		$paginator = new \Phalcon\Paginator\Adapter\QueryBuilder(array(
				"builder" => $builder,
				"limit"   => 30,
				"page"    => $page
		));
		return $paginator->getPaginate();
	}
	public function okundu($mesajId){
		$mesaj = $this->mesajGetir($mesajId);
		$mesaj->okundu= 1;
		$mesaj->update();
	}
}
class inboxView extends ModelBase{
	
}
?>
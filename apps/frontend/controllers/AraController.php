<?php 
namespace Modules\Frontend\Controllers;
use Modules\Frontend\Models\ilanlarAra,
	Modules\Frontend\Models\ilanlar;
class AraController extends ControllerBase{
	public function aramaYapAction(){
		$this->view->disable();
		$params = $this->request->getPost();
		$query = "";
		foreach($params as $name=>$item):
			if($item != ""):
				if($name == "fiyat"):
					$item = str_replace(array("TL"," "),"",$item);
					$temp = split("-",$item);
					$min = $temp['0'];
					$max = $temp['1'];
					$minName = "min". ucfirst($name);
					$maxName = "max". ucfirst($name);
					$query .="{$minName}:{$min}/";
					$query .="{$maxName}:{$max}/";
				else:
					$query .="{$name}:{$item}/";
				endif;
			endif;
		endforeach;
		$this->response->redirect('ara/listele/'. $query);
	}
	public function ustAraAction(){
		$this->view->disable();
		$aranan = $this->request->getPost("aranan");
		if(is_numeric($aranan)):
			$ilan = (new ilanlar)->ilanGetir(null,$aranan);
			if($ilan):
				$this->response->redirect("ilan/{$ilan->permalink}-{$ilan->id}");
			else:
				$aranan = urlencode($aranan);
				$this->response->redirect('ara/listele/kelime:'. $aranan);
			endif;
		else:
			$aranan = urlencode($aranan);
			$this->response->redirect('ara/listele/kelime:'. $aranan);
		endif;
		
	}
	public function listeleAction(){
		$params = $this->dispatcher->getParams();
		$ilanAra = new ilanlarAra();
		$page = $ilanAra->listele($params);
		$this->view->page = $page;
		$this->view->params = $params;
	}
}
?>
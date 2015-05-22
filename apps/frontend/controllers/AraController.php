<?php 
namespace Modules\Frontend\Controllers;
use Modules\Frontend\Models\ilanlarAra,
	Modules\Frontend\Models\ilanlar,
	Modules\Frontend\Models\vitesler,
	Modules\Frontend\Models\kasalar,
	Modules\Frontend\Models\yakitlar,
	Modules\Frontend\Models\motorHacimleri,
	Modules\Frontend\Models\motorGucleri,
	Modules\Frontend\Models\renkler,
	Modules\Frontend\Models\cekisler
	;
class AraController extends ControllerBase{
	public function aramaYapAction(){
		$this->view->disable();
		$params = $this->request->getPost();
		$query = "";
		foreach($params as $name=>$item):
			if($item != ""):
				//SliderRange
				if(($name == "fiyat") or ($name=="yil") or ($name=="km")):
					$item = str_replace(array("TL"," "),"",$item);
					$temp = split("-",$item);
					$min = $temp['0'];
					$max = $temp['1'];
					$minName = "min". ucfirst($name);
					$maxName = "max". ucfirst($name);
					$query .="{$minName}:{$min}/";
					$query .="{$maxName}:{$max}/";
				//Text
				else:				
					//Multiple
					if(is_array($item)):
						//Hepsi
						if($item[0] == ""):
							continue;
						endif;
						$item = implode(",",$item);
					endif;
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
		$this->view->setVars(array(
				'page' => $page,
				'params' => $params,
				'yakitlar'=> (new yakitlar)->tumunuGetir(),
				'vitesler'=> (new vitesler)->tumunuGetir(),
				'kasalar'=> (new kasalar)->tumunuGetir(),
				'hacimler'=> (new motorHacimleri)->tumunuGetir(),
				'gucler'=> (new motorGucleri)->tumunuGetir(),
				'renkler'=> (new renkler)->tumunuGetir(),
				'cekisler'=> (new cekisler)->tumunuGetir()
		));
		$this->assets
			->addJs('frontend/assets/js/ara.js');
	}
}
?>
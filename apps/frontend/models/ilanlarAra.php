<?php 
namespace  Modules\Frontend\Models;
class ilanlarAra extends ModelBase{
	public function listele($params){
		$builder = $this->getModelsManager()->createBuilder();
		$builder->from("Modules\Frontend\Models\ilanlarAra");
		//Kategori
		if(isset($params["kelime"])):
			$kelime = urldecode($params['kelime']);
			$builder->andWhere("baslik LIKE '%{$kelime}%'");
		endif;
		//Kategori
		if(isset($params["kategori"])):
			$kategoriler = explode(",",$params['kategori']);
			$builder->inWhere('kategori_permalink', $kategoriler);
		endif;
		//Marka
		if(isset($params['marka'])):
			$markalar = explode(",",$params['marka']);
			$builder->inWhere('marka_permalink', $markalar);
		endif;
		//Seri
		if(isset($params['seri'])):
			$seriler = explode(",",$params['seri']);
			$builder->inWhere('seri_permalink', $seriler);
		endif;
		//Model
		if(isset($params["model"])) :
			$modeller = explode(",",$params['model']);
			$builder->inWhere('model_permalink', $modeller);
		endif;
		//Min Fiyat
		if(isset($params['minFiyat'])):
			$builder->andWhere('fiyat >=:minFiyat: ', array("minFiyat"=>$params['minFiyat']));
		endif;
		//Max Fiyat
		if(isset($params['maxFiyat'])):
			$builder->andWhere('fiyat <= :maxFiyat: ', array("maxFiyat"=>$params['maxFiyat']));
		endif;
		//Min Yıl
		if(isset($params['minYil'])):
			$builder->andWhere('yil >=:minYil: ', array("minYil"=>$params['minYil']));
		endif;
		//Max Yıl
		if(isset($params['maxYil'])):
			$builder->andWhere('yil <= :maxYil: ', array("maxYil"=>$params['maxYil']));
		endif;
		//Min Yıl
		if(isset($params['minKm'])):
			$builder->andWhere('kilometre >=:minKm: ', array("minKm"=>$params['minKm']));
		endif;
		//Max Yıl
		if(isset($params['maxKm'])):
			$builder->andWhere('kilometre <= :maxKm: ', array("maxKm"=>$params['maxKm']));
		endif;
		//Garanti
		if(isset($params['garanti'])):
			$builder->andWhere('garanti = :garanti: ', array("garanti"=>$params['garanti']));
		endif;
		//Yakıt
		if(isset($params["yakit"])) :
			$yakitlar = explode(",",$params['yakit']);
			$builder->inWhere('yakit_permalink', $yakitlar);
		endif;
		//Renk
		if(isset($params["renk"])) :
			$renkler = explode(",",$params['renk']);
			$builder->inWhere('renk_permalink', $renkler);
		endif;
		//Güç
		if(isset($params["guc"])) :
			$gucler = explode(",",$params['guc']);
			$builder->inWhere('motor_guc_permalink', $gucler);
		endif;
		//Hacim
		if(isset($params["hacim"])) :
			$hacimler = explode(",",$params['hacim']);
			$builder->inWhere('motor_hacim_permalink', $hacimler);
		endif;
		//Çekiş
		if(isset($params["cekis"])) :
			$cekisler = explode(",",$params['cekis']);
			$builder->inWhere('cekis_permalink', $cekisler);
		endif;
		//Vites
		if(isset($params["vites"])) :
			$vitesler = explode(",",$params['vites']);
			$builder->inWhere('vites_permalink', $vitesler);
		endif;
		//Kasa
		if(isset($params["kasa"])) :
			$kasalar = explode(",",$params['kasa']);
			$builder->inWhere('kasa_permalink', $kasalar);
		endif;
		//Tarih
		if(isset($params['tarih'])):
			$timeRange =date('Y-m-d H:i:s', strtotime("-{$params['tarih']} days"));
			$builder->andWhere('eklenme_tarihi >= :tarih:', array("tarih"=>$timeRange));
		endif;
		if(!isset($params['sayfa'])){
			$params['sayfa']=1;
		}
		
		$paginator = new \Phalcon\Paginator\Adapter\QueryBuilder(array(
				"builder" => $builder,
				"limit"=> 20,
				"page" => $params['sayfa']
		));
		return $paginator->getPaginate();
	}
}
?>
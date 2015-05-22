<?php
namespace Modules\Backend\Models;
class kullanicilar extends ModelBase{
	protected function initialize(){
		parent::initialize();
	}
	/**
	 * Kullanıcı için yeni bir oturum başlatır
	 */
	private function yeniOturum($kullanici){
		$sessionObj = parent::diGet('sessionObj');
		$sessionObj->giris = true;
		$sessionObj->kullaniciId = $kullanici->id;
		$sessionObj->kullaniciAdi = $kullanici->kullanici_adi;
		$sessionObj->rol = $kullanici->rol;
			
	}
	public function tumunuGetir(){
		return self::find();	
	}
	public function girisYap($params){

		$kullaniciAdi = $params['kullaniciAdi'];
		$sifre = $params['sifre'];
		$kullanici = self::findFirst([
				"conditions"=>"(rol=?1 OR rol=?2) AND kullanici_adi=?3",
				"bind"=>array(
						1 => "admin",
						2 => "editor",
						3 => $kullaniciAdi
				)
		]);
		//Kullanıcı adı bulundu ise
		if($kullanici):
			if(parent::diGet('security')->checkHash($sifre,$kullanici->sifre)):
				$response['status'] = 'success';
				$response['message'] = parent::diGet('message')->_('successLogin') . parent::diGet('message')->_('redirecting');
				$this->yeniOturum($kullanici);
			else:
				$response['status'] = 'error';
				$response['message'] =parent::diGet('message')->_('errorLogin'). parent::diGet('message')->_('check');
			endif;
		//Kullanıcı adı bulunamadıysa
		else:
			$response['status'] = 'error';
			$response['message'] =parent::diGet('message')->_('errorLogin'). parent::diGet('message')->_('check');
		endif;
		return json_encode($response);
	}
}
?>
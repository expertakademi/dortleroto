<?php 
namespace Modules\Common\Components;
use Phalcon\Mvc\User\Component;
class topluSms extends Component{
	protected $baslik = 'EXPERT AKDM';
	protected $kadi = '8503039216';
	protected $sifre = '6N1N4B3';
	protected $address = 'http://api.netgsm.com.tr/xmlbulkhttppost.asp';
	

	protected function gsmtemizle($icerik) {
		$icerik = str_replace(' ', '', $icerik);
		$icerik = str_replace('-', '', $icerik);
		$icerik = str_replace('(', '', $icerik);
		$icerik = str_replace(')', '', $icerik);
	
		if (strlen($icerik) < 11)
			$icerik = '0'. $icerik;
	
		if (strlen($icerik) < 12)
			$icerik = '9'. $icerik;
	
		return $icerik;
	
	}
	public function gonder($mesaj,$gsmArray) {
		$xml = $this->buildxml($mesaj,$gsmArray);
		/*header('Content-type: text/xml');
		echo $xml;
		exit;*/
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$this->address);
		//curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: text/xml"));
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
		$response = curl_exec($ch);
	
		$this->response = $response;
		var_dump($response);
	
	}
	
	protected function buildxml($mesaj, $gsmArray) {
		$gsmList = "";
		foreach ($gsmArray as $gsm):
			$temp = $this->gsmtemizle($gsm['cep_telefon']);
			$gsmList .= "<no>{$temp}</no>";
		endforeach;
		$xml = '<?xml version="1.0" encoding="utf-8" ?>';
		$xml .= '<mainbody>';
		$xml .= '<header>';
		$xml .= '<company dil="TR">Netgsm</company>';
		$xml .= "<usercode>{$this->kadi}</usercode>";
		$xml .= "<password>{$this->sifre}</password>";
		$xml .= '<startdate> </startdate>';
		$xml .= '<stopdate> </stopdate>';
		$xml .= '<type>1:n</type>';
		$xml .= "<msgheader>{$this->baslik}</msgheader>";
		$xml .= '</header>';
		$xml .= '<body>';
		$xml .= "<msg><![CDATA[{$mesaj}]]></msg>";
		$xml .= "{$gsmList}";
		$xml .= '</body>';
		$xml .= '</mainbody>';
		
	
		return $xml;
	
	
	}
}
?>
<?php 
namespace Modules\Common\Components;
use Phalcon\Mvc\User\Component,
	Phalcon\Http\Request,
	Phalcon\Http\Response;
class helper extends Component  {
	public function goBase(){
		$response = new Response();
		$response->redirect("");
		$response->send();
		exit;
	}
	public function goBaseAdmin(){
		$response = new Response();
		$response->redirect("admin/index");
		$response->send();
		exit;
	}
	public function resultToJson($phalconResult){
		return json_encode($phalconResult->toArray(), JSON_NUMERIC_CHECK);
	}
	/**
	*	Yazılabilir utf8 karakter kontrolü
	*/
	public function ctype_print_unicode($string){
		define("CTYPE_PRINT_UNICODE_PATTERN", "~^[\pL\pN\s\"\~". preg_quote("!#$%&'()*+,-./:;<=>?@[\]^_`{|}´") ."]+$~u");
		return preg_match(CTYPE_PRINT_UNICODE_PATTERN, $input);
	}
	
    /**
    * Seo için link oluşturur
    * @param string $string
    * @return string
    */
    public function permalink($string){
      $find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
      $replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
      $string = strtolower(str_replace($find, $replace, $string));
      $string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
      $string = trim(preg_replace('/\s+/', ' ', $string));
      $string = str_replace(' ', '-', $string);
      return $string;  
    }
    
    public function formatPhoneNumber($phoneNumber) {
    	$phoneNumber = preg_replace('/[^0-9]/','',$phoneNumber);
    
    	if(strlen($phoneNumber) > 10) {
    		$countryCode = substr($phoneNumber, 0, strlen($phoneNumber)-10);
    		$areaCode = substr($phoneNumber, -10, 3);
    		$nextThree = substr($phoneNumber, -7, 3);
    		$lastFour = substr($phoneNumber, -4, 4);
    
    		$phoneNumber = '+'.$countryCode.' ('.$areaCode.') '.$nextThree.'-'.$lastFour;
    	}
    	else if(strlen($phoneNumber) == 10) {
    		$areaCode = substr($phoneNumber, 0, 3);
    		$nextThree = substr($phoneNumber, 3, 3);
    		$lastFour = substr($phoneNumber, 6, 4);
    
    		$phoneNumber = '('.$areaCode.') '.$nextThree.'-'.$lastFour;
    	}
    	else if(strlen($phoneNumber) == 7) {
    		$nextThree = substr($phoneNumber, 0, 3);
    		$lastFour = substr($phoneNumber, 3, 4);
    
    		$phoneNumber = $nextThree.'-'.$lastFour;
    	}
    
    	return $phoneNumber;
    }
}
?>
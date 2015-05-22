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
	public function goUrl($url){
		$response = new Response();
		$response->redirect($url);
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
      $find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#', ',', '.');
      $replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp','', '');
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
    
    public function formatPicker($dateTime){
    	$date = $parts = preg_split('/\s+/', $dateTime);
    	$date2 = preg_split('/[-]/', str_replace(" ","",$date[0]));
    	return "{$date2[2]}-{$date2[1]}-{$date2[0]} - {$date[1]}";
    }
    public function turkishLirasFormat($number,$ondalik=true){
    	if($ondalik):
			return number_format($number, 2, ',', '.');
    	else:
 			return $number = number_format($number);
    	endif;
    }
    public function yuzdeKac($a,$b){
    	$c = $a / 100;
    	return round($b / $c);
    }
    public function yuzdeOrtalama($a,$b){
    	if($a == 0 ):
    		return (100 * $b);
    	elseif($b == 0 ):
    		return -1 * ($a * 100);
    	else:
    		if($a > $b):
				return ($b * 100)/$a * -1;
    		elseif($b > $a):
    			return (100 * $b)/$a - 100 ;
    		endif;
    	endif;
    }
    
    /**
     * Datetime biçiminde verilen tarihin ne kadar zaman önce olduğunu hesaplar.
     * @param datetime $datetime
     * @param boolean $full eğer true olursa tüm ayrıntısını dönderir false olursa en büyük zamanı.
     * @retun string
     */
    public function timeAgo($datetime, $full = false) {
    	$now = new \DateTime;
    	$ago = new \DateTime($datetime);
    	$diff = $now->diff($ago);
    
    	$diff->w = floor($diff->d / 7);
    	$diff->d -= $diff->w * 7;
    
    	$string = array(
    			'y' => 'yıl',
    			'm' => 'ay',
    			'w' => 'hafta',
    			'd' => 'gün',
    			'h' => 'saat',
    			'i' => 'dakika',
    			's' => 'saniye',
    	);
    	foreach ($string as $k => &$v) {
    		if ($diff->$k) {
    			$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
    		} else {
    			unset($string[$k]);
    		}
    	}
    
    	if (!$full) $string = array_slice($string, 0, 1);
    	return $string ? implode(', ', $string) . '' : 'Şimdi';
    }
}
?>
<?php 
namespace Modules\Common\Components;
use Phalcon\Mvc\User\Component,
	Phalcon\Http\Request,
	Phalcon\Http\Response;
class helper  {
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
	public function ctype_print_unicode($string){
		define("CTYPE_PRINT_UNICODE_PATTERN", "~^[\pL\pN\s\"\~". preg_quote("!#$%&'()*+,-./:;<=>?@[\]^_`{|}´") ."]+$~u");
		return preg_match(CTYPE_PRINT_UNICODE_PATTERN, $input);
	}
}
?>
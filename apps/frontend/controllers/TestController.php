<?php 
namespace Modules\Frontend\Controllers;
class TestController extends ControllerBase{
	public function indexAction(){
		$permalink = $this->dispatcher->getParam("permalink");
		$id = $this->dispatcher->getParam("id");
		
		echo $permalink;
		echo $id;
		echo "test";
	}
}
?>
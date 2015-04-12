<?php 
namespace Modules\Frontend\Controllers;
class IlanController extends ControllerBase{
	public function goruntuleAction(){
		$permalink = $this->dispatcher->getParam("permalink");
		$id = $this->dispatcher->getParam("id");
	}
}
?>
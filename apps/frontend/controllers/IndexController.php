<?php
namespace Modules\Frontend\Controllers;
use Modules\Frontend\Models\kategoriler,
	Modules\Frontend\Models\markalar,
	Modules\Frontend\Models\ilanlar,
	Modules\Frontend\Models\slider;
class IndexController extends ControllerBase
{

    public function indexAction()
    {
    	$this->view->setVars(array(
    			"kategoriler" 	=>(new kategoriler)->tumunuGetir(),
    			"markalar"	  	=>(new markalar)->tumunuGetir(),
    			"sonEklenenler" =>(new ilanlar)->anaSayfaSon(0,8),
    			"slider"		=>(new slider)->anaSayfaSlider()
    	));
    	$this->assets
    		->addJs('frontend/assets/js/index.js');
    }

}


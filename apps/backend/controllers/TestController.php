<?php
namespace Modules\Backend\Controllers;
use Modules\Backend\Models\ilanlar,
    Modules\Backend\Plugins\Sahibinden,
    Modules\Backend\Plugins\Arabam,
	Modules\Backend\Models\satislar;
class TestController extends ControllerBase{
	public function indexAction(){
		$this->view->disable();
			$params['baslik']='Test İlanı 1';
			$params['kategori']=7;
			$params['marka']=2;
			$params['seri']=1;
			$params['model']=1;
			$params['yil']=2014;
			$params['fiyat']=120000;
			$params['kilometre']=30000;
			$params['garanti']=1;
			$params['yakit']=1;
			$params ['renk']=2;
			$params['hacim']=5;
			$params['guc']=5;
			$params['cekis']=2;
			$params['vites']=3;
			$params['kasa']=5;
			echo (new ilanlar)->yeni($params);
			
	}
	public function testAction(){
		$this->view->disable();
		echo $this->helper->yuzdeOrtalama(0,0);
		
	}
    public function sahibindenAction(){
        $sahibinden = new sahibinden();
        $user = 'PrinceAli';
        $pass = 'impossible';

        $sahibinden->login($user, $pass);
 

        //$newMessages = $sahibinden->getMessages();
        //$sahibinden->reply($newMessages[0]['thread'],"Levent hoja da selam söyledi");
        //print_r($newMessages);
        //$sahibinden->publish("Test advertisement for Hayk","Pejo yakıt cimrisi vs.. vs..","Sahibinden satılık kazasız boyasız performans canavarı aracımı ihtiyaçtan dolayı satıyorum.", 50000, 1, 100000, array("/var/www/public/uploads/ilan/2015/04/552848c36f2d4.jpg"));
    }
    public function arabamAction(){
        $user = 'mehmet@eterna.com.tr';
        $pass = 'Dort8765';
        $arabam = new Arabam();
        $arabam->login($user, $pass);

        /*
            $newMessages = $arabam->getMessages();
            
            if (count($newMessages) == 0) {
                echo 'no new messages';
                exit;
            }

            // reply to first message
            $arabam->reply($newMessages[0]['msg_id'], "Ok i accept your offer bla.. bla.. bla..");
        */

        $arabam->publish("Advertisement for Hayk ","My car is great please buy it", 50000, 1, 100000, array('/var/www/public/uploads/ilan/2015/04/552848c36f2d4.jpg'));
 
    }
}
?>
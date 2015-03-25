<?php
namespace Modules\Backend\Controllers;
use Modules\Backend\Models\ilanlar;
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
		$response['status'] = 'success';
		$response['message'] = 'test';
		echo json_encode($response);
	}
}
?>
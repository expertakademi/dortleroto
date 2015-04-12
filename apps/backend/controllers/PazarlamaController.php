<?php 
namespace  Modules\Backend\Controllers;
use Modules\Backend\Models\musteriler,
	Modules\Common\Components\topluSms;
class PazarlamaController extends ControllerBase{
	public function topluSmsAction(){
		$this->view->title = "Toplu Sms";
	}
	public function topluSmsAjaxAction(){
		$this->view->disable();
		$mesaj = $this->request->getPost("mesaj");
		$gsmArray = (new musteriler)->musteriCepTelefonları()->toArray();
		$topluSms = new topluSms();
		$topluSms->gonder($mesaj,$gsmArray);
	}
	public function topluEmailAction(){
		$this->view->title = "Toplu Email";
		$this->assets
			->addCss("backend/assets/global/plugins/summernote/dist/summernote.css");
		
		$this->assets
			->addJs("backend/assets/global/plugins/summernote/dist/summernote.js?ver=0.02")
			->addJs("backend/assets/global/plugins/summernote/plugin/summernote-ext-video.js")
			->addJs("backend/assets/global/plugins/summernote/plugin/summernote-ext-fontstyle.js")
			->addJs("backend/assets/global/plugins/summernote/lang/summernote-tr-TR.js");
	}
}

?>
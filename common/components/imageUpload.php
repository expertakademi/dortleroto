<?php 
namespace Modules\Common\Components;
use Phalcon\Mvc\User\Component;
class imageUpload extends Component{
	public function singleUpload($uploadedFiles,$prefix=null,$resize=null){
		$file = null;
		foreach ($uploadedFiles as $temp) {
			$file = $temp;
		}
		$directory = $this->getDirectory($prefix);
		$upload = new \upload($file);

		//Yeni İsim;
		$newName = uniqid();
		$upload->file_new_name_body = $newName;
		//Yeniden Boyutlandır;
		if($resize != null):
			$upload->image_resize          = true;
			//$upload->image_ratio_crop      = true;
			$upload->image_y               = $resize['y'];
			$upload->image_x               = $resize['x'];
		endif;
		//%90 Kalite ile JPG e çevir
        $upload->image_convert = 'jpg';
        $upload->file_new_name_ext = 'jpg';
        $upload->jpeg_quality = 90;
        //Eğer Dizin Yoksa Oluştur
        $upload->auto_create_dir = true;
        $upload->dir_auto_chmod = true;
        $upload->dir_chmod = 0777;
		//Yükle
		$upload->Process($directory);
		if($upload->processed):
			$upload->Clean();
			$response['status'] = "success";
			$link = str_replace(__DIR__,'',$directory) . $newName . '.jpg';
			$response['link'] = str_replace('/../../public/','',$link);
			return (object)$response;
		else:
			return false;
		endif;
	}
	public function multipleUpload($uploadedFiles,$prefix=null,$resize=null,$thumbName){
		$list = array();
		$thumb = "";
		foreach ($uploadedFiles as $file) {
			//Thumbnail 
			$isThumb = false;
			if($thumbName == $file->getName()):
				$isThumb = true;
			endif;

			$directory = $this->getDirectory($prefix);
			$upload = new \upload($file);
			//Yeni İsim;
			$newName = uniqid();
			$upload->file_new_name_body = $newName;
			//Yeniden Boyutlandır;
			if($resize != null):
				$upload->image_resize          = true;
				$upload->image_ratio_crop      = true;
				$upload->image_y               = $resize['y'];
				$upload->image_x               = $resize['x'];
			endif;
			//%90 Kalite ile JPG e çevir
			$upload->image_convert = 'jpg';
			$upload->file_new_name_ext = 'jpg';
			$upload->jpeg_quality = 90;
			//Eğer Dizin Yoksa Oluştur
			$upload->auto_create_dir = true;
			$upload->dir_auto_chmod = true;
			$upload->dir_chmod = 0777;
			//Yükle
			$upload->Process($directory);
			if($upload->processed):
				$link =  str_replace(__DIR__,'',$directory) . $newName . '.jpg';
				$link =  str_replace('/../../public/','',$link);
				$list[]= $link;
				if($isThumb == true):
					$thumb = $link;
				endif;
			endif;
		}
		if(count($list)>0):
			$response['list'] = $list;
			$response['thumb'] = $thumb;
			return $response;
		else:
			return false;
		endif;
		
	}
	public function thumbUpload($fileLocation,$prefix=null,$resize=null){
		$directory = $this->getDirectory($prefix);
		$fileDirectory = $this->getPublicDirectory();
		$copyDirectory = substr($fileDirectory.$fileLocation, 0, -17);
		$newName = uniqid() .'.jpg';
		$copy = copy($fileDirectory.$fileLocation, $copyDirectory.$newName);
		if($copy == false):
			return false;
		endif;
		$upload = new \upload($copyDirectory. $newName);
		//Yeni İsim;
		$newName = uniqid();
		$upload->file_new_name_body = $newName;
		//Yeniden Boyutlandır;
		if($resize != null):
		$upload->image_resize          = true;
		//$upload->image_ratio_crop      = true;
		$upload->image_y               = $resize['y'];
		$upload->image_x               = $resize['x'];
		endif;
		//%100 Kalite ile JPG e çevir
		$upload->image_convert = 'jpg';
		$upload->file_new_name_ext = 'jpg';
		$upload->jpeg_quality = 100;
		//Eğer Dizin Yoksa Oluştur
		$upload->auto_create_dir = true;
		$upload->dir_auto_chmod = true;
		$upload->dir_chmod = 0777;
		//Yükle
		$upload->Process($directory);
		if($upload->processed):
			$upload->Clean();
			$response['status'] = "success";
			$link = str_replace(__DIR__,'',$directory) . $newName . '.jpg';
			$response['link'] = str_replace('/../../public/','',$link);
			return $response;
		else:
			return false;
		endif;
	}
	private function getDirectory($prefix=null){
		// Geçerli Yıl ve Ay
		$year = date("Y");
		$month = date("m");
		$date = $year. '/' . $month ;
		//Prefixi Kontrol Et
		if($prefix!=null):
			$directory = __DIR__ . '/../../public/uploads/'.$prefix.'/' ;
		else:
			$directory = __DIR__ . '/../../public/uploads/';
		endif;
		return $directory . $date . '/';
	}
	private function getPublicDirectory(){
		return __DIR__ . '/../../public/';
	}
	public function deleteImage($link){
		$directory = __DIR__ . '/../../public/';
		$link = $directory . $link;
		$result = unlink($link);
		if($result):
			return true;
		else:
			return false;
		endif;
	}
}
?>
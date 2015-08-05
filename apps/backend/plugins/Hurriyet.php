<?php 
namespace Modules\Backend\Plugins;
class Hurriyet{ 
private $ch, $options, $verbose;

    function __construct () {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; WOW64; Trident/6.0)');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_COOKIEFILE, '');

// debug
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        $this->verbose = fopen('php://temp', 'rw+');
        curl_setopt($ch, CURLOPT_STDERR, $this->verbose);

        $this->ch = $ch;
    }

    private function http_req($url, $post = false, $header = false) {

        if ($header !== false) {
            curl_setopt($this->ch, CURLOPT_HTTPHEADER, $header);
        }

        if ($post !== false) {
            curl_setopt($this->ch, CURLOPT_POST, true);
            curl_setopt($this->ch, CURLOPT_POSTFIELDS, $post);
        }

        curl_setopt($this->ch, CURLOPT_URL, $url);
        $content = curl_exec($this->ch);

        curl_setopt($this->ch, CURLOPT_POST, false);
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, array());

        return $content;
    }

    /**
    * This function authenticates us
    * 
    * @param string $username
    * @param string $password
    */

    public function login($username, $password){

        // start session
        $content = $this->http_req('http://www.hurriyetoto.com/uye-giris');
        $params = $this->extract_params($content);

        // submit credentials
        $params = array(
            '__EVENTTARGET'   => '', 
            '__EVENTARGUMENT' => '', 
            '__VIEWSTATE'     => $params['__VIEWSTATE'],
            'ctl00$ContentPlaceHolder1$txtUserName'   => $username,
            'ctl00$ContentPlaceHolder1$txtPassword'   => $password,
            'ctl00$ContentPlaceHolder1$lstRememberMe' => '0', 
            'ctl00$ContentPlaceHolder1$btnLogin'      => urldecode('Giri%C3%85'), 
            'ctl00$DeletePopup$lstDeleteReasonID'     => '0', 
        );

        $content = $this->http_req('http://www.hurriyetoto.com/uye-giris/', http_build_query($params));
        if (!preg_match('/logout/', $content)) die('auth failed');
    }  
  

    private function req_ajax($method, $req, $content = 0) {
        $content = $this->http_req('http://www.hurriyetoto.com/ajaxpro/Hurriyet.Oto.Web.AjaxServices.CarSearch,Hurriyet.Oto.Web.ashx', $req, array('X-AjaxPro-Method: '.$method));
        $result = array();
        if (preg_match_all("/<option value='([^']*?)'>\s*(.*?)\s*<\/option>/si", $content, $m)){
            $result = array_combine($m[2], $m[1]);
        }
        return $content ? $result : $content;
    }

    private function findUnreadMessages(){
        $content = $this->http_req('http://www.hurriyetoto.com/MemberPages/PrivateMessages.aspx?section=1');
        $new = array();
        if (preg_match('/<ul class="message_list">(.*?)<\/ul>/si', $content,$m)) {
            if (!preg_match_all('/<li[^>]*?>(.*?)<\/li>/si', $m[1], $matches)) die('nothing found');
            foreach ($matches[1] as $msg) {
                if (!preg_match('/font-weight:bold/', $msg)) continue;
                $msg = html_entity_decode($msg);
                $read = (preg_match('/href="(PrivateMessages.aspx\?section[^"]*?)"/i', $msg, $m)) ? $m[1] : '';
                $reply = (preg_match('/href="(PrivateMessages.aspx\?sendTo[^"]*?)"/i', $msg, $m)) ? $m[1] : '';
                $new[] = $read;
            }
        }
        return $new;
    }

    public function getMessageContent($url){

        $content = $this->http_req('http://www.hurriyetoto.com/MemberPages/'.$url);

        $details = array();
        $headings = array('title', 'name', 'msg-date', 'msg-content');
        foreach ($headings as $head) {
            $details[$head] = (preg_match("/<div[^>]*?detail-$head\s*[^>]*?>\s*(.*?)\s*<\/div>/si", $content, $m)) ? strip_tags($m[1]) : '';
        }
        $reply = (preg_match('/href="(PrivateMessages\.aspx\?sendTo=[^"]*?")/i', $content, $m)) ? html_entity_decode($m[1]) : '';

        $result = array(
            'ilan'        => $details['title'],
            'gonderenAd'  => $details['name'],
            'gonderenTel' => '',
            'tarih'       => $details['msg-date'],
            'message'     => $details['msg-content'],
            'reply'       => $reply,
        );
        return $result;
    }

    public function getMessages(){
        $messages = $this->findUnreadMessages();
        $result = array();
        foreach($messages as $msg_url){
            $result[] = $this->getMessageContent($msg_url);
        }
        return $result;
    }

    public function reply($url, $message){
        echo "replying...\n";
        $reply_url = 'http://www.hurriyetoto.com/MemberPages/'.$url;
        $content = $this->http_req($reply_url);

        $params = $this->extract_params($content);
        $data = array(
            '__EVENTTARGET' => 'ctl00$ContentPlaceHolder1$ctl00$btnSend',
            '__EVENTARGUMENT' => '',
            'ctl00$ContentPlaceHolder1$ctl00$tbxContent' => $message,
            'ctl00$DeletePopup$lstDeleteReasonID' => '0'
        );
        $params = array_merge($params, $data);
        $content = $this->http_req($reply_url, http_build_query($params));

        echo 'ok';
    }



  /**
  * This is our main buddy publishes Ad
  * 
  * @param mixed $ilanBaslik -> Ad title
  * @param mixed $aciklama -> Ad description
  * @param mixed $fiyat -> Ad price
  * @param mixed $km -> Km
  * @param mixed $photos
  * @param mixed $renk -> Color
  */

    public function publish($ilanBaslik, $aciklama, $fiyat, $km, $photos, $renk = 5){

// car model selection steps
/*
        $result  = $this->req_ajax('GetModelListForBrand', '{"brandName": "Mercedes","isLcv": "0"}');
        $result  = $this->req_ajax('GetBodyList',          '{"brandName": "Mercedes","modelName": "E Serisi","isLcv": "0"}');
        $result  = $this->req_ajax('GetFuelList',          '{"brandName": "Mercedes","modelName": "E Serisi","bodyType": "SED/4","isLcv": "0"}');
        $result  = $this->req_ajax('GetYearList',          '{"brandName": "Mercedes","modelName": "E Serisi","bodyType": "SED/4","fuelType": "O","isLcv": "0"}');

        $content = $this->req_ajax('GetVersionList',        '{"brandName": "Mercedes","modelName": "E Serisi","bodyType": "SED/4","fuelType": "O","modelYear": "2008","mode": "Advertisement","isLcv": "0"}', 1);
        if (preg_match_all('/<li>[^<]*?<span>(.*?)<\/span>[^<]*?<a[^>]*?SelectVersionForAdv\((\d+)/si', $content, $m)) {
            $versions = array_combine($m[1], $m[2]);
        }
        // ready id's
        print_r($versions);
*/

        // set up model id and year for the new ad
        $content = $this->req_ajax('SetAdvertisementCar', '{"eurotaxId": "1460902","year": "2008","isRental": "0"}', 1);

        # load ad edit page
        $content = $this->http_req('http://www.hurriyetoto.com/MemberPages/Advertisement/Advertisement.aspx?&PageMode=view');
//        file_put_contents('step0.html', $content);

        // upload photos
        $this->upload_photo($photos);
        $photo_num = count($photos);


        // extract filled fields
        $ignore = array(
            'ctl00$ContentPlaceHolder1$ctl00$ctlImageUpload$btnPopupHidden',
            'ctl00$ContentPlaceHolder1$ctl00$ctlModalPopupControl$btnClose',
            'ctl00$ContentPlaceHolder1$ctl00$ctlModalPopupControl$btnPopupHidden',
            'ctl00$ContentPlaceHolder1$ctl00$ddlSubColor',
        );
        $params = $this->extract_params($content, $ignore);


        // reformat price and km with thousand separator if needed
        if (strpos($fiyat, '.') === false) $fiyat = number_format($fiyat, 0, '.', '.');
        if (strpos($km, '.') === false) $km = number_format($km, 0, '.', '.');

        // prepare colors
        $color = $renk;
        $color_id = sprintf('%02d', $color-1);
//        $subcolors = $this->req_ajax('GetSubColors', '{"colorId": "'.$color.'"}');


        // custom fields
        $data = array(
            'ctl00$ContentPlaceHolder1$ctl00$txtAdSubTitle'                => $ilanBaslik,
            'ctl00$ContentPlaceHolder1$ctl00$radCarSpecifics'              => $aciklama,
            'ctl00$ContentPlaceHolder1$ctl00$txtPrice'                     => $fiyat,
            'ctl00$ContentPlaceHolder1$ctl00$txtMileage'                   => $km,

            'ctl00$ContentPlaceHolder1$ctl00$hdnAdImgCount'                => $photo_num,

// color selection
            'ctl00$ContentPlaceHolder1$ctl00$txtHiddenColorID'                        => $color,
            'ctl00$ContentPlaceHolder1$ctl00$rptColor$ctl'.$color_id.'$uniqueSelect'  => 'rdbColorItem',
//            'ctl00$ContentPlaceHolder1$ctl00$ddlSubColor'                             => $subcolor,

            '__EVENTARGUMENT'                                              => '',
            '__EVENTTARGET'                                                => 'ctl00$ContentPlaceHolder1$ctl00$btnSaveAndContinue',
            '__SCROLLPOSITIONY'                                            => '2144',
            'ctl00$ContentPlaceHolder1$ctl00$lstCreditApplicable'          => '1',
            'ctl00$ContentPlaceHolder1$hdnCreateAdErrorPopup'              => '0',
            'ctl00$DeletePopup$lstDeleteReasonID'                          => '0',
        );
        $params = array_merge($params, $data);

        // step 1
        $content = $this->http_req('http://www.hurriyetoto.com/MemberPages/Advertisement/Advertisement.aspx?PageMode=view', $params, array("Content-Type: multipart/form-data"));
//        file_put_contents('step1.html', $content);
        if (!preg_match('/Phone/i', $content)) die('submit failed');

        // contacts page, extract filled fields
        $params = $this->extract_params($content);
        $data = array(
            '__EVENTARGUMENT' => '',
            '__EVENTTARGET' => 'ctl00$ContentPlaceHolder1$ctl00$btnSaveAndContinue',
            '__SCROLLPOSITIONY' => '133',
            'location_county' => '0',
            'ctl00$ContentPlaceHolder1$ctl00$chkShowDetails' => 'on',
            'ctl00$ContentPlaceHolder1$hdnCreateAdErrorPopup' => 0,
            'ctl00$DeletePopup$lstDeleteReasonID' => 0, 
        );
        $params = array_merge($params, $data);

        // step 2
        $content = $this->http_req('http://www.hurriyetoto.com/MemberPages/Advertisement/Advertisement.aspx?step=2&NewID=0&PageMode=edit', $params, array("Content-Type: multipart/form-data"));
//        file_put_contents('step2.html', $content);

        // confirm page, extract filled fields
        $params = $this->extract_params($content, array());
        $data = array(
            '__EVENTARGUMENT'   => '',
            '__SCROLLPOSITIONY' => '1243',
            '__EVENTTARGET'     => 'ctl00$ContentPlaceHolder1$ctl00$btnSaveAndContinue',
            'ctl00$DeletePopup$lstDeleteReasonID' => 0,
        );
        $params = array_merge($params, $data);

        // step 3
        $content = $this->http_req('http://www.hurriyetoto.com/MemberPages/Advertisement/Advertisement.aspx?step=5&NewID=0', $params, array("Content-Type: multipart/form-data"));
//        file_put_contents('step3.html', $content);

        if(!preg_match('/24 saat/', $content)) die('post failed');

/*
        rewind($this->verbose);
        $verboseLog = stream_get_contents($this->verbose);
        echo htmlspecialchars($verboseLog), "</pre>\n";
*/
        echo "ok";
    }


    private function upload_photo($images) {
        foreach ($images as $img) {
            $fname = basename($img);
            $path = realpath($img);

            $params = array(
                'AdditionalStringVariable' => '',
                'LocalControlData[]' => "$fname||",
                'Imagedata[]' => "@$path",
            );
            $content = $this->http_req('http://www.hurriyetoto.com/Handlers/ImageUpload.ashx', $params, array("Content-Type: multipart/form-data"));
        }
    }

    private function extract_params($content, $ignore = 0) {
        if (!$ignore) $ignore = array();
        $params = array();
        if (preg_match_all('/(<input[^>]*?>)/si', $content, $matches)) {
            foreach ($matches[1] as $input) {
                $name = (preg_match('/name="([^"]*?)"/', $input, $m)) ? $m[1] : '';
                if (preg_match('/uniqueSelect/', $name)) continue;
                if (in_array($name, $ignore)) continue;
                if (!preg_match('/value="([^"]+)"/', $input, $m)) continue;
                $params[$name] = $m[1];
            }
        }

        if (preg_match_all('/(<select[^>]*?>.*?<\/select>)/si', $content, $matches)) {
            foreach ($matches[1] as $select) {
                $name = (preg_match('/name="([^"]*?)"/', $select, $m)) ? $m[1] : '';
                if (!preg_match('/selected[^>]*?value="([^"]+)"/', $select, $m)) continue;
                $params[$name] = $m[1];
            }
        }
        $params = array_map('html_entity_decode', $params);
        return $params;
    }

}
?>
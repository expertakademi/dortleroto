<?php 
namespace Modules\Backend\Plugins;
class Araba{ 
private $ch, $verbose;

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
        $content = $this->http_req('http://login.araba.com/kurumsal/?aid=0&sub=');

        // submit credentials
        $params = array(
            'emailfirma' => 'mehmet@eterna.com.tr',
            'passwordfirma' => 'Dort8765',
        );

        $content = $this->http_req('http://login.araba.com/firmalogin.php', http_build_query($params));
        if (!preg_match('/logout\.php/', $content)) die('auth failed');

    }  
  



    private function extract_options($rx, $content) {
        $results = array();
        if (preg_match_all($rx, $content, $m)) {
            $results = array_combine($m[2], $m[1]);
        }
        return $results;
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

    public function publish($ilanBaslik, $aciklama, $fiyat, $km, $photos, $renk = 2){

// car model selection steps
/*
        // marka list
        $content = $this->http_req('http://login.araba.com/firma.php?action=add_2&aa=1');
        $result = $this->extract_options('/<a[^>]*?href="javascript:loadContent\(\'?(\d+)[^>]*?>\s*(.*?)\s*<\/a>/si', $content);

        $marka_id = $result['Mercedes'];

        // model list
        $content = $this->http_req('http://login.araba.com/ajax/kategorie.php?aa=1&k='.$marka_id);
        $result = $this->extract_options('/<a[^>]*?href="javascript:loadContent2\(\'?(\d+)[^>]*?>\s*(.*?)\s*<\/a>/si', $content);

        $model_id = $result['E-Class'];

        // model variations
        $content = $this->http_req('http://login.araba.com/ajax/kategorie.php?aa=1&k2='.$model_id);
        $result = extract_options('/<a[^>]*?href="(\/firma.php[^"]*?)"[^>]*?>\s*(.*?)\s*<\/a>/si', $content);

        // ready url for variation
        $url = $result['200'];

        $url = 'http://login.araba.com/'.$url;
*/

        // ad edit page
        $url = 'http://login.araba.com/firma.php?action=add_3&k1=&k2=881&k3=6968';
        $content = $this->http_req($url);


        // custom fields
        $data = array(
            'baslik'        => $ilanBaslik,   // title
            'acik'          => $aciklama,     // description

            'fiyat'         => $fiyat,        // price
            'ucret_art'     => '7',           // currency, 7 = TL

            'renk'          => $renk,         // color id
            'renkname'      => 'Beyaz',       // color description

            'km'            => $km,           // km
            'yil'           => '2008',        // year

            'price_typ'     => '1',           // Pazarlik Bilgisi
            'pay_price_art' => '1',           // Odeme Turu

            'takas_id'      => '0',

            'araba_art'     => '1',
            'araba_tip'     => '1',
            'motor_id'      => '1',
            'vites'         => '1',
            'kapi'          => '2',

            'bg'            => '100',
            'hacmi'         => '1000',

            'sure'          => '45',         // 45 days    
            'action'        => 'add_4',
            'sub'           => 'ok',
        );

        // step 1
        $content = $this->http_req('http://login.araba.com/firma.php', $data, array("Content-Type: multipart/form-data"));
//        file_put_contents('step1.html', $content);
        if (!preg_match('/"add_5"/i', $content)) die('step 1 submit failed');

        // submitted, proceed to photo upload
        $data = array(
            'action' => 'add_5',
            'sub'    => 'ok',
        );

        // step 2
        $content = $this->http_req('http://login.araba.com/firma.php', $data, array("Content-Type: multipart/form-data"));
//        file_put_contents('step2.html', $content);
        if (!preg_match('/aid=(\d+)/', $content, $m)) die('step 2 submit failed');
        $ad_id = $m[1];

        // upload photos
        $this->upload_photo($ad_id, $photos);

        echo "ok";
/*
        rewind($this->verbose);
        $verboseLog = stream_get_contents($this->verbose);
        echo htmlspecialchars($verboseLog), "</pre>\n";
*/
    }


    private function upload_photo($aid, $images) {
        foreach ($images as $img) {
            $fname = basename($img);
            $path = realpath($img);

            $params = array(
                'files[]' => "@$path",
            );
            $content = $this->http_req('http://login.araba.com/ajax/resim/pictures_upload.php?aid='.$aid, $params, array("Content-Type: multipart/form-data"));
            file_put_contents($fname.'_resp.html', $content);
        }
    }
}
?>
<?php 
namespace Modules\Backend\Plugins;
use ArrayObject;
class Sahibinden{ 
private $ch, $headers, $meta, $verbose;

    function __construct () {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; WOW64; Trident/6.0)');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_INTERFACE, "185.17.136.30");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_COOKIEFILE, '');
// debug
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        $this->verbose = fopen('php://temp', 'rw+');
        curl_setopt($ch, CURLOPT_STDERR, $this->verbose);

        $this->ch = $ch;
        $this->headers = array();
    }

    private function http_req($url, $post = false) {

        if ($post !== false) {
            if (is_array($post)) $post = http_build_query($post);
            curl_setopt($this->ch, CURLOPT_POSTFIELDS, $post);
            $post = true;
        }
        curl_setopt($this->ch, CURLOPT_POST, $post);

        curl_setopt($this->ch, CURLOPT_HTTPHEADER, array_values($this->headers));

        curl_setopt($this->ch, CURLOPT_URL, $url);
        $content = curl_exec($this->ch);
        return $content;
    }

    /**
    * This function authenticates us
    * 
    * @param string $username
    * @param string $password
    */

    public function login($username, $password){

        // start session and get hidden params
        $content = $this->http_req('https://secure.sahibinden.com/giris');
        $hidden = array();
        file_put_contents('/var/www/apps/backend/plugins/temp/form.html', $content);
        if (!preg_match_all('/(<input type="hidden"[^>]*>)/s', $content, $matches)) die('form problem');
        foreach ($matches[1] as $param) {
            if (preg_match('/name="([^"]*)" value="([^"]*)"/', $param, $matches)) {
                $hidden[$matches[1]] = $matches[2];
            }
        }

        // submit credentials
        $params = array(
            'username' => $username,
            'password' => $password,
            'rememberMe' => 'on'
        );
        $params = array_merge($hidden, $params);
        $content = $this->http_req('https://secure.sahibinden.com/giris', $params);
        // fetch script bundle to extract keys for headers
        if (!preg_match('/src="([^"]*?app_[^"]*?)"/', $content, $m)) die('auth failed');
        $content = $this->http_req('https://banaozel.sahibinden.com'.$m[1]);
        if (!preg_match('/"x-api-key":"([^"]*?)","x-client-profile":"([^"]*?)"/', $content, $m)) die('api keys not found');
        $this->headers = array(
            'x-api-key'        => "x-api-key: $m[1]",
            'x-client-profile' => "x-client-profile: $m[2]",
            'Accept'           => 'Accept: application/json',
            'Content-Type'     => 'Content-Type: application/json;charset=utf-8',
        );

        // load info page to get xsrf token
        $info_url = 'https://banaozel.sahibinden.com/sahibinden-ral/rest/my/info';
        $content = $this->http_req($info_url, false);
        if (!preg_match('/xsrf-token=([^;]*);/', $content, $m)) die('xsrf token not found');
        $this->headers['x-xsrf-token'] = "x-xsrf-token: $m[1]";
        curl_setopt($this->ch, CURLOPT_HEADER, false);

        if (!preg_match('/(\{"response.*?)$/s', $content, $m)) die('no response');
        $data = json_decode($m[1], true);
        $this->meta = $data['response']['meta'];
    }  
    /**
    * This function used to find category.
    * populates input here http://prntscr.com/6tahdh
    * returns the link that brings us to Ad details.
    * Ex. search term : 2013 bmw 520i
    * Pick the first URL
    * @param string $key
    * @return URL that we will 
    */

    private function findCategory($key) {
        echo "searching: $key\n";   
        $key = urlencode($key);
        $content = $this->http_req('https://banaozel.sahibinden.com/sahibinden-ral/rest/searchSuggestions/autocomplete/categories?categoryId=3517&partialPhrase='.$key.'&size=20');
        $data = json_decode($content, true);
        if (!isset($data['response'])) return;

        // results array, pick first result
        $pick = $data['response']['eurotaxSuggestions'][0];
        return $pick;
    } 

  /**
  * This is our main buddy publishes Ad
  * 
  * @param mixed $ilanBaslik -> Ad title
  * @param mixed $aciklama -> Ad description
  * @param mixed $fiyat -> Ad price
  * @param mixed $vites -> Gear
  * @param mixed $km -> Km
  * @param mixed $renk -> Color
  * @param mixed $garanti -> Guarantee
  * @param mixed $plaka -> License plate
  * @param mixed $takasli -> Barter
  * @param mixed $ulke -> Country
  * @param mixed $il -> City
  * @param mixed $ilce -> Town
  * @param mixed $mah -> Street
  * @param mixed $photos
  */
#$sahibinden->publish("mercedes 2008 e 200 dizel","Great car here","My car is great please buy it","50000","1","100000",array("myuploadedimage1.jpg","myuploadedimage2.jpg"));
    public function publish($keyword, $ilanBaslik, $aciklama, $fiyat, $vites, $km, $photos, $garanti=1, $renk=0, $plaka=0, $takasli=1, $ulke=0, $il=3, $ilce=11, $mah = 55){
        $resp = $this->findCategory($keyword);
        if (!$resp) die('no results');

        $category = $resp['categoryId'];
        $req = array(
            'categorySpecializedFlowEnabled' => 'true',
            'elementValues' => array(
                'Cars_SuperCode' => (string) $resp['supercode'],
                'Cars_ModelYear' => (string) $resp['modelYear'],
                'Cars_FuelType' =>  (string) $resp['fuelType'],
            ),
            'id' => ''
        );
        $content = $this->http_req('https://banaozel.sahibinden.com/sahibinden-ral/rest/my/classifieds/wizard', json_encode($req));

        // input names to captions mapping
        $p = array(
            'renk'    => 'a3',
            'km'      => 'a4',
            'garanti' => 'a4054',
            'vites'   => 'a6',
            'plaka'   => 'a9620',
        );

        $elements = array();
        $enums = array();

        // extract default ad settings and option sets
        $data = json_decode($content, true);

        $id = $data['response']['classifiedId'];
        foreach ($data['response']['sections'] as $section) {
            foreach ($section['elements'] as $el) {
                $name = $el['name'];
                if ($el['defaultValue'] == true || $el['required'] == true) {
                    if (is_array($el['defaultValue'])) continue;
                    $elements[$name] = $el['defaultValue'] ? $el['defaultValue'] : null;
                    if ($el['enumValues']) $enums[$name] = $el['enumValues'];
                }
            }
        }

        // customised ad params
        $params = array(
            $p['km']           => (int) $km,
            $p['renk']         => $enums[$p['renk']][$renk]['id'],
            $p['garanti']      => $enums[$p['garanti']][$garanti]['id'],
            $p['vites']        => $enums[$p['vites']][$vites]['id'],
            $p['plaka']        => $enums[$p['plaka']][$plaka]['id'],
            'exchange'         => $enums['exchange'][$takasli]['id'],

            'price'            => (int) $fiyat,
            'price_currency'   => 1,
    
            'address_country'  => (int) $ulke,
            'address_city'     => (int) $il,
            'address_town'     => (int) $ilce,
            'address_quarter'  => (int) $mah,
    
            'title'            => $ilanBaslik,
            'description'      => "<p>$aciklama<br/></p>",
            'classifiedNote'   => '',
            'photos'           => array(),
            'showMap'          => false,
            'storeSpecialCategory' => null,
        );

        $elements = array_merge($elements, $params);

        // process images
        $main = true;
        $ct = $this->headers['Content-Type'];
        $this->headers['Content-Type'] = 'Content-Type: image/jpeg';
        foreach ($photos as $img) {
            $rand = '';
            foreach (range(0,rand(15,16)) as $r) {
                $rand.=rand(0,9);
            }
            $data = $this->image_resize($img);
            $url = 'https://banaozel.sahibinden.com/sahibinden-ral/rest/my/classifieds/'.$id.'/images?isActinal=false&h='.$rand.'&s1='.$data['s1'].'&s2='.$data['s2'];
            $response = $this->http_req($url, $data['contents']);
//            echo $response;        
            $data = json_decode($response, true);
            $add = array(
                "progress" => 100,
                "uploadSuccess" => true,
                "uploadCompleted" => true,
                "timeoutCount" => 0,
                "editor"=> new ArrayObject(),
                "superSize" => true,
                "main" => $main,
                "mainImage" => $main
            );
            $arr = array_merge($data['response'], $add);
            $elements['photos'][] = $arr;
            $main = false;
        }
        $this->headers['Content-Type'] = $ct;

        // build full ad object
        $ad = array(
            'classifiedType' => 'DEFAULT',
            'id' => $id,
            'category' => (string) $category,
            'storeId' => $this->meta['stores'][0]['id'],
            'quantity' => 1,
            'ownerId' => $this->meta['user']['id'],
            'elementValues' => $elements,
        );

        // step 2, submit
        $content = $this->http_req('https://banaozel.sahibinden.com/sahibinden-ral/rest/my/classifieds?language=tr', json_encode($ad));
        $data = json_decode($content, true);
        echo "err:".$content;
        if (!isset($data['success']) || $data['success'] != true) {
            die('error: '.$data['error']);
        }

        // step 3, finalize
        $content = $this->http_req('https://banaozel.sahibinden.com/sahibinden-ral/rest/my/classifieds/'.$id.'/finalize', '');
        $data = json_decode($content, true);
       
        if (!isset($data['success']) || $data['success'] != true) {
            die('error: '.$data['error']);
        }

        // done
        echo 'ok';

    }


    
    private function image_resize($file) {
        $width = 800;
        $image = imagecreatefromjpeg($file);

        $orig_width = imagesx($image);
        $orig_height = imagesy($image);

        $height = ceil((($orig_height * $width) / $orig_width));

        $resized = imagecreatetruecolor($width, $height);
        imagecopyresampled($resized, $image, 0, 0, 0, 0, $width, $height, $orig_width, $orig_height);
        ob_start(); 
        imagejpeg($resized, null, 100);
        $buffer = ob_get_clean(); 
        return array(
            's1' => filesize($file),
            's2' => strlen($buffer),
            'contents' => $buffer,
        );
    }
    /**
    * This function used to find unread messages.
    * returns the link that brings us to message details.
    * @return array of URLS that we will iterate 
    */
    private function findUnreadMessages(){
        $content = $this->http_req('https://banaozel.sahibinden.com/sahibinden-ral/rest/my/topics?viewType=LIST');
        $data = json_decode($content, true);
        if (!$data['response'] || !$data['response']['topics']) die('no results');
        $new = array();
        foreach ($data['response']['topics'] as $topic) {
            foreach ($topic['messages'] as $msg) {
                if ($msg['unread'] == true) $new[] = 'https://banaozel.sahibinden.com/sahibinden-ral/rest/my/topics/'.$msg['relatedId'].'/thread/'.$msg['threadId'];
            }
        }
        return $new;
    }
    /**
    * This function will visit the URL given and
    * gather the message details.  
    * @param mixed $url
    * @return array(
    *   "ilan"=>(string) Related Ad's title,
    *   "gonderenAd"=>(string) Sender's name,
    *   "gonderenTel"=>(string) Sender's phone,
    *   "tarih"=>(string) Send time of latest message,
    *   "message"=>(string) Message content,
    *   "url"=>(string) this is the URL for conversation. You may need this for replying.
    * )
    */
    private function getMessageContent($url){
        $content = $this->http_req($url);
        $data = json_decode($content, true);
        if (!$data['response']) die('response error');
        $resp = $data['response'];

        // 1 last message, stub for multiple?
        $msg_num = 1; 
        $msg_new = array_slice($resp['messages'], $msg_num * -1);

        $result = array();
        foreach ($msg_new as $msg) {
            $result= array(
                'ilan'        => $resp['classified']['title'],
                'gonderenAd'  => $msg['correspondentUser']['name'],
                'gonderenTel' => $msg['correspondentUser']['phone'],
                'tarih'       => $msg['date'],
                'message'     => $msg['content'],
                'thread'      => array(
                    'rel_type' => $msg['relatedType'],
                    'rel_id'   => $msg['relatedId'],
                    'id'       => $msg['threadId'],
                ),
            );
        }
        return $result;
    }
    /**
    * This dude runs our findUnreadMessages and then iterates urls,
    * runs getMessageContent for each url and returns 2D array as result set.
    * Last function for message pulling.
    */
    public function getMessages(){
        $messageLinks = $this->findUnreadMessages();
        $result = array();
        foreach($messageLinks as $link){
            $result[] = $this->getMessageContent($link);
        }
        return $result;
    }
    /**
    * We will use this function to reply incoming messages.
    * http://prntscr.com/6urcvn
    * @param string $url this is the value we gathered from getMessageContent
    */
    public function reply($thread, $message){
        echo "replying...\n";
        if (!$thread['rel_type']) die('something is wrong');
        $response = array(
            'relatedType' => $thread['rel_type'],
            'relatedId'   => $thread['rel_id'],
            'messages'    => array(
                array(
                    'threadId' => $thread['id'],
                    'content'  => $message,
                )
            )
        );
        $content = $this->http_req('https://banaozel.sahibinden.com/sahibinden-ral/rest/my/topics', json_encode($response));
        $data = json_decode($content, true);
        if (!$data['success'] || $data['success'] != true) {
            die("error, response: $content");
        }
        echo 'ok';
    }
}
?>
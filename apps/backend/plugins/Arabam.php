<?php 
namespace Modules\Backend\Plugins;
class Arabam{ 
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

        if ($post !== false) {
            if (is_array($post)) $post = http_build_query($post);
            curl_setopt($this->ch, CURLOPT_POSTFIELDS, $post);
            $post = true;
        }

        if ($header !== false) {
            curl_setopt($this->ch, CURLOPT_HTTPHEADER, $header);
        }

        curl_setopt($this->ch, CURLOPT_POST, $post);

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

        // start session
        $content = $this->http_req('http://www.arabam.com/Uyelik/');

        // submit credentials
        $params = array(
            'EPosta'      => $username,
            'Sifre'       => $password,
            'BeniHatirla' => 'true',
            'ReturnUrl'   => '',
        );
        $content = $this->http_req('http://www.arabam.com/Uyelik/ArabamUyelik/Login', $params);
        if (!preg_match('/Uyelik\/Cikis/', $content)) die('auth failed');
    }  
  
    /**
        load ajax boxes options and build mapping arays
    */
    private function load_options() {
        $result = array();
        $options = array(
            'marka'       => 'GetMarkalarByAracTip',
            'govde_sekil' => 'GetGovdeSekilleri',
            'vites'       => 'GetVitesler',
            'yakit'       => 'GetYakitlar',
        );
        foreach ($options as $name => $url) {
            $content = $this->http_req('http://www.arabam.com/banaozel/MarkaModelAjax/'.$url.'/?aracTip=1');
            $data = json_decode($content, true);
            foreach ($data as $rec) {
                $result[$name][] = array(
                    'name'    => $rec[$name.'_adi'],
                    'value' => $rec[$name.'_id'],
                );
            }
        }
        $this->options = $result;
    }

    /**
        find option id by name
    */
    private function find_option($type, $value) {
        $result = '';
        foreach ($this->options[$type] as $rec) {
            if ($rec['name'] == $value) {
                $result = $rec['value'];
                break;
            }
        }
        return $result;
    }


    private function findUnreadMessages(){
        $content = $this->http_req('http://www.arabam.com/BanaOzel/BanaOzelMesajlarim/Mesajlarim/1?lg=ks');
        $new = array();
        if (preg_match_all('/(<input[^>]*?msg-id[^>]*?>)/si', $content, $matches)) {
            foreach($matches[1] as $input) {
                $msg_id = (preg_match('/msg-id="([^"]*?)"/', $input, $m)) ? $m[1] : '';
                $sender_id = (preg_match('/msg-alici="([^"]*?)"/', $input, $m)) ? $m[1] : '';
                $read = (preg_match('/msg-okundu="([^"]*?)"/', $input, $m)) ? $m[1] : '';
                if ($read == 1) continue;
                $new[] = array($msg_id, $sender_id);
            }
        }
        return $new;
    }

    private function getMessageContent($msg){
        list($msg_id, $alan_id) = $msg;

        // mark as read
        $content = $this->http_req('http://www.arabam.com/BanaOzel/BanaOzelMesajlarim/MesajlarimOkundu?mesajId='.$msg_id.'&alanId='.$alan_id.'&okundu=true');

        // load msg details
        $content = $this->http_req('http://www.arabam.com/BanaOzel/BanaOzelMesajlarim/MesajlarimDetay?mesajId='.$msg_id);
        $data = json_decode($content, true);

        if (is_array($data)) {
            foreach ($data as $msg) {
            if ($msg['MesajId'] != $msg_id) continue;
                $data = $msg;
                break;
            }
        }

        $result = array(
            'ilan'        => $data['Konu'],
            'gonderenAd'  => $data['GonderenIsim'],
            'gonderenTel' => $data['Tel'],
            'tarih'       => $data['Tarih'],
            'message'     => $data['Mesaj'],
            'msg_id'      => $msg_id,
        );
        return $result;
    }

    public function getMessages(){
        $messages = $this->findUnreadMessages();
        $result = array();
        foreach($messages as $msg){
            $result[] = $this->getMessageContent($msg);
        }
        return $result;
    }

    public function reply($msg_id, $message){
        echo "replying...\n";

        $subj = 'answer';
        $content = $this->http_req('http://www.arabam.com/BanaOzel/BanaOzelMesajlarim/MesajlarimCevapYaz?mesajId='.$msg_id.'&konu='.urlencode($subj).'&mesaj='.urlencode($message));
        if ($content == '"1"') {
            echo 'ok';
        }
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

    public function publish($ilanBaslik, $aciklama, $fiyat, $vites, $km, $photos, $garanti=1, $renk=0, $plaka=0, $takasli=1, $ulke=0, $il=3, $ilce=11, $mah = 55){

        // load select boxes options
        $this->load_options();

        $content = $this->http_req('http://www.arabam.com/BanaOzel/IlanVer?lg=ks');

        // some params defaults are js variables
        $js = array();
        if (preg_match_all("/var (\S*?) = '?([^\r\n]*?)'?;[\r\n]\s*/s", $content, $m)) {
            $js = array_combine($m[1], $m[2]);
        }

        // get form params, hidden and some selects
        if (!preg_match('/<form[^>]*?ilangiris[^>]*?>(.*?)<\/form>/s', $content, $matches)) die('form problem');
        $form = $matches[1];
        $params = array();

        preg_match_all('/(<input type="hidden"[^>]*>)/s', $form, $matches);
        foreach ($matches[1] as $param) {
            if (!preg_match('/name="([^"]*)"/', $param, $m)) continue;
            $name = $m[1];
            $val = (preg_match('/value="([^"]*)"/', $param, $m)) ? $m[1] : '';
            $params[$name] = $val;
        }

        preg_match_all('/(<select[^>]*?>.*?)<\/select>/s', $form, $matches);
        foreach ($matches[1] as $param) {
            if (!preg_match('/(<option[^>]*?selected="selected"[^>]*?>)/', $param, $m)) continue;
            $opt = $m[1];
            $name = (preg_match('/name="([^"]*)"/', $param, $m)) ? $m[1] : '';
            $val = (preg_match('/value="([^"]*)"/', $opt, $m)) ? $m[1] : '';
            $params[$name] = $val;
        }

        // process photo uploads
        $resim_data = '';
        $ana_resim_data = '';

        foreach ($photos as $photo) {
            $result = $this->upload_image($photo);
            if ($result) {
                $resim_data.="$result;";
                if (!$ana_resim_data) $ana_resim_data = $result;
            }
        }
        $ana_resim_no = ($ana_resim_data) ?    1 : '';
        
        // set custom params

        $vites = 2;
        $yakit = 2;
        $kasa = 13;

// http://www.arabam.com/banaozel/MarkaModelAjax/GetModelGruplarByAracTipNMarkaNVitesNYakitNYil/?aracTip=1&markaId=19&vitesId=2&yakitId=2&modelYil=2008
// marka + vites + yakit + year = modelgroups
// http://www.arabam.com/banaozel/MarkaModelAjax/GetVersiyonlarByModelGrupNVitesNYakitNModelYil/?modelGrupId=214&vitesId=2&yakitId=2&modelYil=2008
// modelgroup + vites + yakit + year = models

        $details = array(
            'Kiralik_Mi'           => '0',
            'cmb_arac_kategori_id' => '1',    // vehicle category

            'model_yil'            => '2008', // year
            'YakitId'              => $yakit, // fuel type
            'VitesId'              => $vites, // transmission

            'marka_id'             => '19',   // marka
            'model_grup_id'        => '214',  // model group
            'model_id_search'      => '3650', // model selected
            'model_id'             => '23036',// exact model internal id

            'ilan_baslik'          => $ilanBaslik, 
            'aciklama'             => $aciklama,

            'fiyat'                => $fiyat,
            'kur_id'               => '6',   // currency = TL 

            'km'                   => $km,

            'cc'                   => '50',  // motor hacmi
            'hp'                   => '50',  // motor gucu

            'KasaTipiId'           => $kasa, // body
            'renk_id'              => '10',  // color
            'arac_turu_id'         => '1',   // type = personal
            'plaka_uyruk_id'       => '1',   // plaka
            'hasar_id'             => '3',   // state
            'otomatik_sure_uzat'   => 'false',// hidden default


            'ulke_id' => '1',  // country
            'sehir_id' => '6', // city
            'ilce_id' => '75', // town
            'semt_id' => '2023', // area

            'Fotograflar' => '10',

            'ilan_telkod' => $js['TelKodToDisplay'],
            'ilan_telno'  => $js['TelNoToDisplay'],
            'ilan_cepkod' => $js['CepKodToDisplay'],
            'ilan_cepno'  => $js['CepNoToDisplay'],
            'IletisimGizlilik' => 'false',  // hide info

            'yakit_id' => $yakit,
            'vites_id' => $vites,
            'govde_sekil_id' => $kasa,

            'arac_kategori_id' => '1',
            'ilanturId' => '0',
            'KiralikMi' => 'false',
            'ekspertiz' => 'false',
            'VideoData' => '',
            'ResimData' => $resim_data,
            'AnaResimNo' => $ana_resim_no,
            'EtiketDegeri' => '0',
            'AnaResimData' => $ana_resim_data,
            'Donanim_Guvenlik' => '0',
            'Donanim_IcDonanim' => '0',
            'Donanim_DisDonanim' => '0',
            'Donanim_Aksesuar' => '0',
            'Donanim_Eglence' => '0',
            'Donanim_TeknolojikEkipman' => '0',
        );    

        $params = array_merge($params, $details);

        // step 2, submit
        $content = $this->http_req('http://www.arabam.com/BanaOzel/IlanVer/IlanGirisIslem', $params);
        if (!preg_match('/href="([^"]*?FormIlanOnPlan[^"]*?)"/', $content, $matches)) die('error posting');
        $url = $matches[1];

        // step 3, finalize
        $content = $this->http_req('http://www.arabam.com'.$url);

        die('ok');
    }

    private function upload_image($image) {
        $upload_url = 'http://www.arabam.com/BanaOzel/UploadSingleFile.aspx?silan_id=';
        $content = $this->http_req($upload_url);

        $fname = basename($image);
        $fsize = filesize($image);
        $path = realpath($image);

        // file name and contents
        $post = array('filename' => $fname, 'filex' => "@$path");

        // add form hidden params
        preg_match_all('/(<input type="hidden"[^>]*>)/s', $content, $matches);
        foreach ($matches[1] as $param) {
            if (!preg_match('/name="([^"]*)"/', $param, $m)) continue;
            $name = $m[1];
            $val = (preg_match('/value="([^"]*)"/', $param, $m)) ? $m[1] : '';
            $post[$name] = $val;
        }

        // multipart upload params
        $options = array(
            CURLOPT_URL => $upload_url,
            CURLOPT_POST => 1,
            CURLOPT_HTTPHEADER => array('Content-Type:multipart/form-data'),
            CURLOPT_POSTFIELDS => $post,
            CURLOPT_INFILESIZE => $fsize,
            CURLOPT_RETURNTRANSFER => true
        );
        curl_setopt_array($this->ch, $options);

        // process upload
        $content = curl_exec($this->ch);

        // reset options
        $options = array(
            CURLOPT_HTTPHEADER => array(),
            CURLOPT_INFILESIZE => -1,
        );
        curl_setopt_array($this->ch, $options);

        if (preg_match("/HandleNewImageFileUpload\('([^']*?)'/", $content, $m)) {
            return $m[1];
        }
    }
}
?>
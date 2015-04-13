<div class="portlet light bg-inverse">
    <div class="portlet-title">
        <div class="caption">
            <span class="caption-subject font-red-sunglo bold uppercase">Fiyat Hesapla</span>
        </div>
        <div class="actions">

        </div>
    </div>
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <form class="form-fv form-horizontal" action="javascript:;" method="post" >
            <div class="form-body">
                <div class="form-group">
                    <label class="col-md-3 control-label">Araç :</label>
                    <div class="col-md-8">
                        <input id="arac" class="form-control input-circle" type="text" name="arac" placeholder="Yıl, Marka,  Model, Seri, KM" />
                        <span class="help-block">Ör. 2011 Mercedes c180 kompressor 20.000</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Hasarlar :</label>
                    <div class="input-group col-md-8">
                        <div class="icheck-inline">
                            <label>
                            <input type="checkbox" class="icheck" data-checkbox="icheckbox_line-grey" data-label="Sol Ön Çamurluk">
                            </label>
                            <label>
                            <input type="checkbox" class="icheck" data-checkbox="icheckbox_line-grey" data-label="Sol Ön Kapı">
                            </label>
                            <label>
                            <input type="checkbox" class="icheck" data-checkbox="icheckbox_line-grey" data-label="Sol Arka Kapı">
                            </label>
                            <label>
                            <input type="checkbox" class="icheck" data-checkbox="icheckbox_line-grey" data-label="Sol Arka Çamurluk">
                            </label>
                            <label>
                            <input type="checkbox" class="icheck" data-checkbox="icheckbox_line-red" data-label="Tampon">
                            </label>
                            <label>
                            <input type="checkbox" class="icheck" data-checkbox="icheckbox_line-red" data-label="Kaput">
                            </label>
                            <label>
                            <input type="checkbox" class="icheck" data-checkbox="icheckbox_line-red" data-label="Tavan">
                            </label>
                            <label>
                            <input type="checkbox" class="icheck" data-checkbox="icheckbox_line-red" data-label="Bagaj">
                            </label>
                            <label>
                            <input type="checkbox" class="icheck" data-checkbox="icheckbox_line-red" data-label="Arka">
                            </label>
                            <label>
                            <input type="checkbox" class="icheck" data-checkbox="icheckbox_line-aero" data-label="Sağ Ön Çamurluk">
                            </label>
                            <label>
                            <input type="checkbox" class="icheck" data-checkbox="icheckbox_line-aero" data-label="Sağ Ön Kapı">
                            </label>
                            <label>
                            <input type="checkbox" class="icheck" data-checkbox="icheckbox_line-aero" data-label="Sağ Arka Kapı">
                            </label>
                            <label>
                            <input type="checkbox" class="icheck" data-checkbox="icheckbox_line-aero" data-label="Sağ Arka Çamurluk">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Araştırma :</label>
                    <div class="col-md-8">
                        <div style="margin-left:-10px;margin-top:8px" class="progress progress-striped active">
                            <div id="progress" class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                <span class="sr-only">
                                0% Tamamlandı (başarılı) </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="well" id="well">
                <h4 class="block" id="wellBaslik">Fiyat Araştırması</h4>
                <p id="wellSonuc"></p>
            </div>
            <div class="form-actions">
                <div class="row">
                        <div class="alert alert-dismissible hide col-md-offset-2 col-md-7" role="alert">
                            <button type="button" class="close" data-hide="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="alert-message"></div>
                        </div>
                        <div class="clearfix"></div>
                    <div class="col-md-offset-3 col-md-4">
                        <button type="button" onclick="bul()" class="btn green">Bul</button>
                        <button type="reset" class="btn default">Sıfırla</button>
                    </div>
                </div>
            </div>
        </form>
        <!-- END FORM-->
    </div>
</div>
<style>
#well{display:none}
</style>
<script>
//Controllerdaki assets'e ek bir js bağlamaya üşendim :D. Gece 00:42
setTimeout(function(){
    $(document).keypress(function(e){
       if(e.which == 13){
           bul();
       } 
    });
},300);

  function bul(){
      $('.progress-striped').addClass('active');
      var aracim = $('#arac').val().toLowerCase();
      var fiyat = 0;
      if(aracim.indexOf("2011 peugeot 301") > -1){
        fiyat = 38900;    
      }
      else if(aracim.indexOf("2011 peugeot 301 1.6 e-hdi") > -1){
          fiyat = 52750;
      }
      else if(aracim.indexOf("2014 bmw grand coupe") > -1){
          fiyat = 271000;
      }
      else if(aracim.indexOf("2012 peugeot partner") > -1){
          fiyat = 38400;
      }
      else if(aracim.indexOf("2012 peugeot 508") > -1){
          fiyat = 77300;
      }
      else if(aracim.indexOf("2014 peugeot 3008") > -1){
          fiyat = 83200;
      }
      else if(aracim.indexOf("2013 peugeot 508 active") > -1){
          fiyat = 74300;
      }
      else if(aracim.indexOf("2005 peugeot 307") > -1){
          fiyat = 26000;
      }
      else if(aracim.indexOf("2014 peugeot 301 access") > -1){
          fiyat = 37200;
      }
      else if(aracim.indexOf("2013 renault clio") > -1){
          fiyat = 36800;
      }
      else if(aracim.indexOf("2011 mercedes c180") > -1){
          fiyat = 82100;
      }
      
      var marj = $("input:checked").length * 3; 
      fiyat = fiyat - ((fiyat / 100)*(marj * 1.4)); 
      
      var hasar = " Aracın hasarsızlığı göz önüne alınarak";
      if(marj > 0){
        hasar = "Araçtaki " + $("input:checked").length + " parça hasar göz önüne alınarak";    
      }
      
      var w = 1;
      var sayac = setInterval(function(){
            $('#progress').css('width',w+'%');
            w++;
            if(w == 100){
                clearInterval(sayac);
                $('.progress-striped').removeClass('active');
                $('#wellBaslik').html(aracim + ' için yapılan araştırmayı tamamladım.');
                $('#wellSonuc').html(hasar + " " + fiyat + ' TL \'den alım yapabilirsiniz.');
                $('#well').show(1000);
            }    
      },300);
  }  
</script>
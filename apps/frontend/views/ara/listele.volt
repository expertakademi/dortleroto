<div class="col-md-3 hidden-sm hidden-xs">
     <div class="kategori-filtre">
         <ul class="list-group no-margin">
             <li class="list-group-item kategori"><a href="#">Filtrele</a></li>
         </ul>
         <div class="col-md-12 filtrele">
             <form method="post" action="{{url('ara/aramaYap')}}">
                 {% if params['kategori'] is defined %}
                 	<input type="hidden" name="kategori" value="{{params['kategori']}}">
                 {% endif %}
                 {% if params['marka'] is defined %}
                 	<input type="hidden" name="marka" value="{{params['marka']}}">
                 {% endif %}
                 {% if params['seri'] is defined %}
                 	<input type="hidden" name="seri" value="{{params['seri']}}">
                 {% endif %}
                 {% if params['model'] is defined %}
                 	<input type="hidden" name="model" value="{{params['model']}}">
                 {% endif %}
                <!--  <div class="model-sec">
                     <label>Model Seçiniz</label>
                     <ul class="nav">
                         <li><a href="#">Audi</a>
                             <ul >
                                 <li><a href="#">A1</a> <small class="gri">(12)</small></li>
                                 <li><a href="#">A2</a> <small class="gri">(12)</small></li>
                                 <li><a href="#">A3</a> <small class="gri">(52)</small></li>
                             </ul>
                         </li>
                         <!--<li><a href="#">Mercedes</a><small class="gri">(52)</small></li>
                         <li><a href="#">Opel</a><small class="gri">(52)</small></li>--> 
                         <!--
                     </ul>
                 </div> -->
                 <div class="form-group gelismis">
                     <label for="exampleInputName2">Fiyat</label>
                         <div id="slider-range-fiyat"></div>   
                         <input type="text" name="fiyat" class="range-value" id="amount" readonly>                                
                 </div>
                 <div class="form-group gelismis">
                     <label for="exampleInputName2">Yıl</label>
                         <div id="slider-range-yil"></div>
                         <input type="text" name="yil" class="range-value" id="yil" readonly>                                
                 </div>
                 <div class="form-group gelismis">
                     <label for="exampleInputName2">Km</label>
                         <div id="slider-range-km"></div>
                         <input type="text" name="km" class="range-value" id="km" readonly>                                
                 </div>
                 <div class="form-group gelismis" id="yakit">
                     <label for="exampleInputName2">Yakıt</label><span class="pull-right arti">+</span>
                     <div class="checkbox">
                         <label>
                             <input type="checkbox" name="yakit[]" value="" > Hepsi
                         </label>
                     </div>
                     {% for yakit in yakitlar %}
	                     <div class="checkbox">
	                         <label>
	                             <input type="checkbox" name="yakit[]" value="{{yakit.permalink}}"> {{yakit.ad}}
	                         </label>
	                     </div>
                     {% endfor %}
                 </div>
                 <div class="form-group gelismis" id="vites">
                     <label for="exampleInputName2">Vites</label><span class="pull-right arti">+</span>
                     <div class="checkbox">
                         <label>
                             <input type="checkbox" name="vites[]" value=""> Hepsi
                         </label>
                     </div>
                     {% for vites in vitesler %}
	                     <div class="checkbox">
	                         <label>
	                             <input type="checkbox" name="vites[]" value="{{vites.permalink}}"> {{vites.ad}}
	                         </label>
	                     </div>
                     {% endfor %}

                 </div>
                 
                 <div class="form-group gelismis">
                     <label for="exampleInputName2">Renk</label><span class="pull-right arti">+</span>
                      <select class="form-control" id="renk" name="renk[]" multiple>
                         <option value="">Hepsi</option>
                          {% for renk in renkler %}
                          	<option value="{{renk.permalink}}">{{renk.ad}}</option>
                         {% endfor %}
                     </select>
                 </div>
                 
                 <div class="form-group gelismis" id="kasa">
                     <label for="exampleInputName2">Kasa Tipi</label><span class="pull-right arti">+</span>
                     <div class="checkbox">
                         <label>
                             <input type="checkbox" name="kasa[]"> Hepsi
                         </label>
                     </div>
                     {% for kasa in kasalar %}
	                     <div class="checkbox">
	                         <label>
	                             <input type="checkbox" name="kasa[]" value="{{kasa.permalink}}"> {{kasa.ad}}
	                         </label>
	                     </div>
                     {% endfor %}
                 </div>
                 
                 <div class="form-group gelismis">
                     <label for="exampleInputName2">Motor Hacmi</label><span class="pull-right arti">+</span>
                      <select class="form-control" id="hacim" name="hacim[]" multiple>
                         <option value="">Hepsi</option>
                          {% for hacim in hacimler %}
                          	<option value="{{hacim.permalink}}">{{hacim.ad}}</option>
                         {% endfor %}
                     </select>
                 </div>
                 
                 <div class="form-group gelismis" >
                     <label for="exampleInputName2">Motor Gücü</label><span class="pull-right arti">+</span>
                      <select class="form-control" id="guc" name="guc[]" multiple>
                         <option value="">Hepsi</option>
                          {% for guc in gucler %}
                          	<option value="{{guc.permalink}}">{{guc.ad}}</option>
                         {% endfor %}
                     </select>
                 </div>
                 
                 <div class="form-group gelismis" id="cekis">
                     <label for="exampleInputName2">Çekiş</label><span class="pull-right arti">+</span>
                     <div class="checkbox">
                         <label>
                             <input type="checkbox" name="cekis[]" value=""> Hepsi
                         </label>
                     </div>
                     {% for cekis in cekisler %}
	                     <div class="checkbox">
	                         <label>
	                             <input type="checkbox" name="cekis[]" value="{{cekis.permalink}}"> {{cekis.ad}}
	                         </label>
	                     </div>
                     {% endfor %}
                 </div>
                 
                 <div class="form-group gelismis">
                     <label>Garanti</label><span class="pull-right arti">+</span>
                      <select class="form-control" id="garanti">
                         <option value="" selected>Hepsi</option>
                         <option value="1">Evet</option>
                         <option value="0">Hayır</option>
                     </select>
                 </div>
                 
                 <div class="form-group gelismis">
                     <label>İlan Tarihi</label><span class="pull-right arti">+</span>
                     <select class="form-control" name="tarih" id="tarih">
                         <option value="">Hepsi</option>
                         <option value="1">Son 24 saat</option>
                         <option value="3">Son 3 gün içinde</option>
                         <option value="7">Son 7 gün içinde</option>
                         <option value="15">Son 15 gün içinde</option>
                         <option value="30">Son 30 gün içinde</option>
                     </select>
                 </div>
                 <button class="btn listele-btn btn-default btn-md center-block padding-left-3 padding-right-3 margin-top-1">Ara</button>
             </form>
             

         </div>
     </div>
     <div class="col-md-12 hidden-xs hidden-sm avantajli-ilan no-padding">
         <a href="#" class="beyaz text-none">
             <img src="{{url('frontend/uploads/caravantaj.jpg')}}" class="img-responsive">
             <div class="avantaj-baslik">
                 <p class="col-md-7" >Mercedes Vito 111 CDI Camlivan Kisa</p>
                 <div class="avantaj-icon iconset"></div>
             </div>
         </a>
     </div>

     <div class="col-md-12 no-padding mt-15 hidden-xs hidden-sm">
         <img src="uploads/reklam.jpg" class="img-responsive">
     </div>
     
 </div>
                
                
<div class="col-md-9 ">
	<div class=" padding-5">
	     <div class="arac-detayli">
	         <table class="table table-bordered">
	             <thead class="arac-detayli-baslik">
	               <tr>
	                 <th></th>
	                 <th class="hidden-xs">Seri</th>
	                 <th class="hidden-xs">Model</th>
	                 <th>İlan Başlığı</th>
	                 <th class="hidden-xs">Yıl</th>
	                 <th class="hidden-xs">Km</th>
	                 <th class="hidden-xs">Renk</th>
	                 <th>Fiyat</th>
	                 <th class="hidden-xs">İlan Tarihi </th>
	               </tr>
	             </thead>
	             <tbody id="aramaTable">
	             {% if page.total_items != 0 %}
	             	{% for item in  page.items %}
	             	{% set link = url('ilan/'~item.ilan_permalink ~ '-' ~ item.id)%}
	             	<tr onClick="app.goPage('{{link}}')">
	                     <td class="col-xs-4 col-sm-2 col-md-2 no-padding">
	                        <img src="{{url(item.kapak_foto)}}" class="img-responsive col-md-12 col-sm-12 col-xs-12 no-padding">
	                     </td>
	                     <td class="hidden-xs">{{item.seri_adi}}</td>
	                     <td class="hidden-xs">{{item.model_adi}}</td>
	                     <td style="text-align:left"><a href="#">{{item.baslik}}</a></td>
	                     <td class="hidden-xs">{{item.yil}}</td>
	                     <td class="hidden-xs">{{item.kilometre}}</td>
	                     <td class="hidden-xs">{{item.renk_adi}} </td>
	                     <td class="text-nowrap kirmizi">{{item.fiyat}} TL</td>
	                     <td class="hidden-xs">{{item.eklenme_tarihi}}</td>
	                 </tr>
	                 {% endfor %}
	             {% else %}
	             	<tr><td>Aradığınız kriterlere uygun ilan bulunamadı.<td></tr>
	             {% endif %}

	             </tbody>
	       </table>
	     </div>
	    <div class="col-md-12 text-center">
	        <ul class="pagination sayfalama" id="myPager">
	        	{% if page.total_items > 0 %}
	        		{% set url = replace("sayfa:"~page.current~"/","",router.getRewriteUri()) %}
	        		{% set url = replace("sayfa:"~page.current,"",url) %}
	        		{% set url = rtrim(url,"/") %}
	        		{% set url = ltrim(url,"/") %}
	        		
	        		{% if page.current != 1 %}
	        			<li><a href="{{url(url~'/sayfa:'~page.before)}}" class="prev_link">«</a></li>
	        		{% endif %}
	        		{% for index in page.current-5 .. page.current %}
	        			{% if index > 0 and index!= page.current %}
	        				<li><a href="{{url(url~'/sayfa:'~index)}}" class="page_link" style="display: block;">{{index}}</a></li>
	        			{% endif %}
					{% endfor %}
	        		<li class="active"><a href="#" class="page_link active" style="display: block;">{{page.current}}</a></li>
	        		{% for index in page.current+1 .. page.current+5 %}
	        			{% if index <= page.last %}
	        				<li><a href="{{url(url~'/sayfa:'~index)}}" class="page_link" style="display: block;">{{index}}</a></li>
	        			{% endif %}
					{% endfor %}
					{% if page.current != page.last %}
	        			<li><a href="{{url(url~'/sayfa:'~page.next)}}" class="next_link">»</a></li>
	        		{% endif %}
	        	  {% endif %}    	
	        </ul>
	    </div>           
	</div>
</div>
<script>
window.onload = function(){
	ara.init();
	ara.listele({{params | json_encode}});
}
</script>
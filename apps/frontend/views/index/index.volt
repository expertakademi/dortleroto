 <div class="col-md-3 hidden-sm hidden-xs">
     <div class="kategori-List">
         <ul class="list-group ">
             <li class="list-group-item kategori"><a href="#">Kategoriler</a></li>
             {% for kategori in kategoriler %}
            	<li class="list-group-item"><a href="{{url('ara/listele/kategori:'~kategori.permalink)}}">{{kategori.ad}}</a></li>
             {% endfor %}
         </ul>
     </div>
     <div class="hizli-arama hidden-sm">
         <ul class="list-group">
             <li class="list-group-item kategori"><a href="#">Hızlı Arama</a><div class="iconset araba"></div></li>
             
             <li class="list-group-item marka"><a href="{{url('ara/listele/marka:peugeot')}}">Peugeot</a></li>
             {% for item in peugeotSeriler %}
            	 <li class="list-group-item "><a href="{{url('ara/listele/marka:peugeot/seri:'~item.permalink)}}"><span class="list"></span>{{item.ad}}</a></li>
			{% endfor %}
         </ul>
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
     <div class="row">
         <div class="col-md-8 col-sm-8 hidden-xs">
             <div id="carousell" class="carousel slide galeri" data-ride="carousel">
                 <!-- Indicators -->
                 <ol class="carousel-indicators">
                 	{% for item in slider %}
                 		<li data-target="#carousell" data-slide-to="{{loop.index0}}" class="{% if loop.first %}active{% endif %}"></li>
                 	{% endfor %}
                 </ol>

                 <!-- Wrapper for slides -->
                 <div class="carousel-inner" role="listbox">
                 	{% for item in slider %}
	                     <div class="item {% if loop.first %}active{% endif %}">
	                         <img src="{{url(item.resim_link)}}" class="tales">
	                         <div class="carousel-caption">
	                             <div class="aciklama padding-15 col-md-11 col-sm-12">
	                                 {{item.aciklama}}
	                             </div>
	                             <a href="{{url(item.link)}}">
	                                 <div class="col-md-5 col-sm-6 aciklama no-padding">
	                                     <div class="devam">
	                                         <div class="pull-left devam-yazi beyaz">Devam</div>   
	                                     </div>
	                                     <div class="iconset kirmizi-ok"></div>
	                                 </div>
	                             </a>
	                         </div>
	                     </div>
                     {% endfor %}
                 </div>

                 <!-- Controls -->
                 <a class="left carousel-control" href="#carousell" role="button" data-slide="prev">
                     <i class="fa fa-chevron-left "></i>
                     <span class="sr-only">Previous</span>
                 </a>
                 <a class="right carousel-control" href="#carousell" role="button" data-slide="next">
                     <span class="fa fa-chevron-right" aria-hidden="true"></span>
                     <span class="sr-only">Next</span>
                 </a>
             </div>
         </div>
         <div class="col-md-4 col-sm-4 hidden-xs">
             <div class="arama">
                 <ul class="list-group ">
                     <li class="list-group-item kategori"><a href="#">Arama Yap</a></li>
                     <div class="iconset gri-araba"></div>
                 </ul>
                 <form method="post" action="{{url('ara/aramaYap')}}">
                     <div class="form-group">
                         <select name="kategori" class="form-control">
                             <option value="">Tüm Kategoriler</option>
							 {% for kategori in kategoriler %}
							 	<option value="{{kategori.permalink}}">{{kategori.ad}}</option>
							 {% endfor %}
                         </select>
                     </div>
                     <div class="form-group">
                         <select name="marka" class="form-control">
                             <option value="">Tüm Markalar</option>
                             {% for marka in markalar %}
                             	<option value="{{marka.permalink}}">{{marka.ad}}</option>
                             {% endfor %}

                         </select>
                     </div>
                     <div class="form-group">
                         <select name="seri" class="form-control">
                             <option value="">Tüm Modeller</option>
                         </select>
                     </div>
                     <div class="form-group">
                         <label for="fiyat">Fiyat</label>
                         <div id="slider-range"></div>   
                         <input type="text" class="fiyat" name="fiyat" id="amount" readonly>
                     </div>
                     <button type="submit" class="btn btn-default btn-block kirmizi-btn">ARA</button>
                 </form>
             </div>
         </div>
     </div>
     
     <div class="row padding-5">
         <div class="baslik iconset center-block hidden-xs">
             <h4 class="text-center">En Son Eklenenler</h4> 
         </div>
         {% for sonIlan in sonEklenenler %}
         	{% set link = url('ilan/'~sonIlan.permalink ~ '-' ~ sonIlan.id)%}
	         <div class="col-xs-6 col-sm-3 col-md-3" onClick="app.goPage('{{link}}')">
	             <div class="thumbnail arac-listele">
	                 <img src="{{url(sonIlan.kapak_foto)}}" class="img-responsive">
	                 <p><a class="btn btn-default btn-xs fiyat-btn" role="button">{{sonIlan.fiyat}} <i class="fa fa-try"></i></a></p>
	                 <div class="caption">
	                     <p class="font-17 vitrin-baslik"><a href="#" title="{{sonIlan.baslik}}">{{substr(sonIlan.baslik,0,30)}}</a></p>
	                     <p class="gri text-right border-top no-margin padding-top-15">
	                         <span class="km-icon iconset"></span><span> {{sonIlan.kilometre}} km</span>
	                     </p>
	                 </div>
	             </div>
	         </div>
         {% endfor %}
         <div class="clearfix"></div>
         <div class="col-md-12 hidden-xs">
             <div class="baslik iconset center-block">
                 <h4 class="text-center">Hasarsızlar</h4> 
             </div>
         </div>
         {% for sonIlan in hasarsizSon %}
         	{% set link = url('ilan/'~sonIlan.permalink ~ '-' ~ sonIlan.id)%}
	         <div class="col-xs-6 col-sm-3 col-md-3" onClick="app.goPage('{{link}}')">
	             <div class="thumbnail arac-listele">
	                 <img src="{{url(sonIlan.kapak_foto)}}" class="img-responsive">
	                 <p><a class="btn btn-default btn-xs fiyat-btn" role="button">{{sonIlan.fiyat}} <i class="fa fa-try"></i></a></p>
	                 <div class="caption">
	                     <p class="font-17 vitrin-baslik"><a href="#" title="{{sonIlan.baslik}}">{{substr(sonIlan.baslik,0,30)}}</a></p>
	                     <p class="gri text-right border-top no-margin padding-top-15">
	                         <span class="km-icon iconset"></span><span> {{sonIlan.kilometre}} km</span>
	                     </p>
	                 </div>
	             </div>
	         </div>
         {% endfor %}

         <div class="col-md-12">
             <div class="form-group">
                 <div class="margin-top-2"></div>

                 <label class="col-md-4 control-label" for="singlebutton"></label>
                 <div class="col-md-4">
                     <button id="singlebutton" name="singlebutton" class="btn listele-btn btn-default btn-md center-block">Tüm İlanlar</button>
                 </div>  
             </div>
          
         </div>
         
         
     </div>
 </div>
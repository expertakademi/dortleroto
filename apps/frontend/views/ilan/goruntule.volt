<div class="col-md-12 margin-bottom-1" style="margin-top:10px;">
                    <!--  <ol class="breadcrumb no-margin margin-bottom-05">
                      <li><a href="#">Home</a></li>
                      <li><a href="#">Library</a></li>
                      <li class="active">Data</li>
                      <a class="pull-right"><i class="fa fa-share-alt padding-right-05"></i>Paylaş</a> 

                    </ol>-->
                    <h3  class="margin-bottom-05 pull-left mt-15">
                        <span class="detay-baslik">{{ilan.baslik}}</span>
                        <strong class="kirmizi">{{ilan.fiyat}} TL</strong>
                    </h3> 
                    <p class="pull-right padding-top-05 mt-15">İlan No:<span class="kirmizi"> <b>{{ilan.id}}</b></span></p>

                    <div class="col-md-12 col-xs-12 col-sm-12 border-bottom-e5"></div>
                    <div class="clearfix"></div> 
                </div>
                   
                <div class="col-md-6 col-xs-12">
                    <div  style="background: #fff; padding:15px;border:1px solid #d9d9d9;border-bottom:3px solid #e3e3e7">
                        <div id="detay" class="carousel slide detay" data-ride="carousel" data-interval="false">
                            <div class="carousel-inner">
                            	{% for resim in ilanResimleri %}
                                <div class="item {%if loop.first %}active srle {%endif%}">
                                    <img src="{{url(resim.resim_link)}}" alt="car.jpg" class="img-responsive">
                                </div>
                                {% endfor %}
                            </div>

                            <a class="left carousel-control" href="#detay" role="button" data-slide="prev">
                                <i class="fa fa-chevron-left "></i>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#detay" role="button" data-slide="next">
                                <span class="fa fa-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>

                            <ul class="thumbnails-carousel clearfix hidden-xs hidden-sm">
                            	{% for resim in ilanResimleri %}
                                	<li data-target="#detay" data-slide-to="{{loop.index -1 }}"><img  src="{{url(resim.resim_link)}}" alt="1_tn.jpg"></li>
                                {% endfor %}
                            </ul>
                            
                            <ol class="carousel-indicators">
                           	 	{% for resim in ilanResimleri %}
                                <li data-target="#detay" data-slide-to="{{loop.index -1 }}" class="{%if loop.first %}active {%endif%}"></li>
                                {% endfor %}
                            </ol>
                        </div>
                        
                        


                        
                    </div>
                </div>
                
                <div class="col-md-3 col-xs-12 margintop-xs-2 padding-md-0">
                    <div class="arama detay-list ic-padding">
                        <p class="kirmizi no-margin margin-bottom-05">
                            <a href="#" class="kirmizi">Adana</a> / 
                            <a href="#" class="kirmizi">Yeni Mahalle </a>  
                        </p>
                        <table class="table">
                            <tr>
                                <td class="text-nowrap">İlan Tarihi</td>
                                <td>{{ilan.eklenme_tarihi}}</td>
                            </tr>
                            <tr>
                                <td>Marka</td>
                                <td>{{ilan.marka_adi}} </td>
                            </tr>
                            <tr>
                                <td>Seri</td>
                                <td>{{ilan.seri_adi}}  </td>
                            </tr>
                            <tr>
                                <td>Model</td>
                                <td>{{ilan.model_adi}} </td>
                            </tr>
                            <tr>
                                <td>Yıl</td>
                                <td>{{ilan.yil}} </td>
                            </tr>
                            <tr>
                                <td>Yakıt</td>
                                <td>{{ilan.yakit_adi}} </td>
                            </tr><tr>
                                <td>Vites</td>
                                <td>{{ilan.vites_adi}} </td>
                            </tr><tr>
                                <td>Km</td>
                                <td class="kirmizi">{{ilan.kilometre}}</td>
                            </tr><tr>
                                <td>Renk</td>
                                <td>{{ilan.renk_adi}} </td>
                            </tr>
                            <tr>
                                <td>Kasa Tipi</td>
                                <td>{{ilan.kasa_adi}} </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap">Motor Hacmi</td>
                                <td>{{ilan.hacim_adi}} cm3 </td>
                            </tr>                            
                            <tr>
                                <td>Motor Gücü</td>
                                <td>{{ilan.guc_adi}} </td>
                            </tr>
                            <tr>
                                <td>Çekiş</td>
                                <td>{{ilan.cekis_adi}} </td>
                            </tr>
                            <tr>
                                <td>Garanti</td>
                                <td>
                                {% if ilan.garanti == 1 %}
                                	Evet
                                {% else %}
                                	Hayır
                                {% endif %}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap">Plaka / Uyruk</td>
                                <td>Türkiye (TR) Plakalı </td>
                            </tr>
                            <tr>
                                <td>Garanti</td>
                                <td>Evet </td>
                            </tr>
                            <tr>
                                <td>Takas</td>
                                <td>Hayır</td>
                            </tr>
                            <tr>
                                <td>Durumu</td>
                                <td>İkinci el </td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                
                <div class="col-md-3 ">
                    <div class="clearfix"></div>
                    <div class="padding-15 col-md-12 no-magin col-sm-6 sahip-bilgi bilgi margintop-xs-2">
                        <h3 class="beyaz margin-top-0 padding-bottom-02 border-bottom-beyaz">{{ilan.temsilci_ad}}</h3>
                        <p class="beyaz font18"><i class="fa fa-phone padding-right-05 fa-lg"></i><strong>0{{helper.formatPhoneNumber(ilan.temsilci_telefon)}} ({{ilan.temsilci_dahili}})</strong> </p>
                        <p class="beyaz font18"><i class="fa fa-mobile padding-right-05 fa-lg"></i><strong>0{{helper.formatPhoneNumber(ilan.temsilci_cep)}}</strong> </p>
                        <button class="btn btn-default btn-medium btn-block load-modal" data-target="#generalModal" data-href="{{url('mesaj/gonder/id:'~ilan.id)}}" data-form="true">Mesaj Gönder</button>
                    </div>
                    <div class="col-md-12 col-sm-6 no-padding sahip-bilgi margin-top-1 sm-margin">
                        <ul class="list-group margin-bottom-10">
                            <li class="list-group-item"><i class="fa fa-print fa-lg"></i><a href="javascript: window.print()">İlanı Yazdır</a></li>
                            <li class="list-group-item"><i class="fa fa-flag fa-lg"></i><a data-target="#complaint" data-toggle="modal">Hatalı İlan Bildir</a></li>
                            <li class="list-group-item"><i class="fa  fa-exclamation-triangle fa-lg"></i><a data-target="#hatir" data-toggle="modal">Güvenlik Hatırlatmaları</a></li>
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
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12 padding-top-2">
                    <div class="tabbable-line">
                        <ul class="nav nav-tabs ">
                            <li class="active">
                                <a href="#tab_default_1" data-toggle="tab">
                                İlan Detayları </a>
                            </li>
                            <li>
                                <a href="#tab_default_2" data-toggle="tab">
                                Kredi Teklifleri </a>
                            </li>
                            <li>
                                <a href="#tab_default_3" data-toggle="tab">
                                Expertiz Raporu </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_default_1">
                                <h3 class="tab-baslik">Açıklama</h3>
                                <div class="padding-15">
									{{ilan.aciklama}}                          
                                </div>  
                                <h3 class="tab-baslik">Özellikler</h3>
                                <div class="padding-15">
                                    {% for facilityCode, facility in facilities %}
                                        <p class="kirmizi font-weight6">{{ facility }}</p>
                                        <table class="table checks">
                                            <colgroup>
                                                <col style="width: 25%" />
                                                <col style="width: 25%"  />
                                                <col style="width: 25%"  />
                                                <col style="width: 25%"  />
                                            </colgroup>
                                            <tr>
                                                    {% set counter = -1 %}
                                                    {% for featureId, feature in facilityFeatures[facilityCode] %}
                                                        {% if counter % 4 == 3 %}
                                                            </tr>
                                                            <tr>
                                                        {% endif %}

                                                        {% set counter = counter + 1 % 4 %}
                                                        {% if selectedFacilities[featureId]  is defined %}
                                                            <td {% if loop.last %} colspan={{ counter - 4  }} {% endif %}><i class="fa fa-check"></i>{{feature}}</td>                                                                    
                                                        {% else %}
                                                            <td class="pasif" {% if loop.last %} colspan={{ counter - 4 }} {% endif %}><i class="fa fa-times"></i>{{feature}}</td>
                                                        {% endif %}
                                                    {% endfor  %}
                                            </tr>
                                        </table>
                                    {% endfor  %}
                                </div> 
                            </div>
                            <div class="tab-pane padding-15" id="tab_default_2">
                                <p>
                                    Howdy, I'm in Tab 2.
                                </p>
                                <p>
                                    Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat. Ut wisi enim ad minim veniam, quis nostrud exerci tation.
                                </p>
                            </div>
                            <div class="tab-pane" id="tab_default_3">
                                <h3 class="tab-baslik">Hasar</h3>
                                <div class="row text-center">
                                    <div class="form-group">
                                    <img src="{{url('frontend/assets/img/expertiz.jpg')}}" alt="logo" style="width: 500px;"/>
                                    </div>
                                </div>
                                <div class="row">
                                    {% set areaNos = [1,2,3,4,5,6,7,8,9,10,11,12,13], counters = 1 %}
                                    {% for areaNo in areaNos %}
                                        {% if selectedDamages[areaNo] is defined and selectedDamages[areaNo] != 0 %}
                                            {% set counters = 1 %}
                                            <div class="col-md-1 text-right">
                                                <b>{{areaNo}}:</b>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                        {{damageValues[selectedDamages[areaNo]]}}
                                                </div>
                                            </div>
                                        {% endif %}
                                    {% endfor %}
                                    {% if counters == 0 %}
                                        <div class="text-center">
                                        <b>Müsait değil</b>
                                        </div>
                                    {% endif %}
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>


<div id="complaint" class="modal green fade modal-scroll modal-overflow container" tabindex="-1" aria-hidden="true" style="display: none; margin-top: -120.5px;">
    <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Hatalı İlan Bildir</h4>
    </div>
    <form class="form-fv " method="post" action="{{url('ilan/sikayetlerAjax')}}" >
    <div class="modal-body">
        
            <div class="form-body">
                <div class="form-group">
                        <label>Mesaj</label>
                        <textarea name="mesaj" class="form-control" rows="10" required></textarea>
                </div>
            </div>

            <div class="alert hide">
                <span class="alert-message"></span>
            </div>
    </div>
    <div class="modal-footer">
            <input type="hidden" name="{{this.csrf.name}}" value="{{this.csrf.token}}"/>
            <input type="hidden" name="ilan_id" value="{{ilan.id}}"/>
            <button type="submit" class="btn blue">Posta</button>
            <button type="button" data-dismiss="modal" class="btn btn-default">Kapat</button>
    </div>
    </form>
</div>

<div id="hatir" class="modal fade modal-scroll modal-overflow container" tabindex="-1" aria-hidden="true" style="display: none; margin-top: -120.5px;">
    <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Güvenlik Hatırlatmaları</h4>
    </div>
    <div class="modal-body">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sollicitudin ipsum ac ante fermentum suscipit. <br/>
                In ac augue non purus accumsan lobortis id sed nibh. Nunc egestas hendrerit ipsum, et porttitor augue volutpat non. <br/>
                Aliquam erat volutpat. Vestibulum scelerisque lobortis pulvinar. Aenean hendrerit risus neque, eget tincidunt leo. <br/> 
                Vestibulum est tortor, commodo nec cursus nec, vestibulum vel nibh. <br/>
                Morbi elit magna, ornare placerat euismod semper, dignissim vel odio. Phasellus elementum quam eu ipsum euismod pretium. <br/>
                
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sollicitudin ipsum ac ante fermentum suscipit. <br/>
                In ac augue non purus accumsan lobortis id sed nibh. Nunc egestas hendrerit ipsum, et porttitor augue volutpat non. <br/>
                Aliquam erat volutpat. Vestibulum scelerisque lobortis pulvinar. Aenean hendrerit risus neque, eget tincidunt leo. <br/> 
                Vestibulum est tortor, commodo nec cursus nec, vestibulum vel nibh. <br/>
                Morbi elit magna, ornare placerat euismod semper, dignissim vel odio. Phasellus elementum quam eu ipsum euismod pretium. <br/>

                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sollicitudin ipsum ac ante fermentum suscipit. <br/>
                In ac augue non purus accumsan lobortis id sed nibh. Nunc egestas hendrerit ipsum, et porttitor augue volutpat non. <br/>
                Aliquam erat volutpat. Vestibulum scelerisque lobortis pulvinar. Aenean hendrerit risus neque, eget tincidunt leo. <br/> 
                Vestibulum est tortor, commodo nec cursus nec, vestibulum vel nibh. <br/>
                Morbi elit magna, ornare placerat euismod semper, dignissim vel odio. Phasellus elementum quam eu ipsum euismod pretium. <br/>
            </p>
    </div>
    <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
    </div>
</div>
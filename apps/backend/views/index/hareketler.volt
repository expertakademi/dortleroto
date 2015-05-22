 <div class="portlet box blue-steel">
     <div class="portlet-title">
         <div class="caption">
             <i class="fa fa-bell-o"></i>Son Hareketler
         </div>
         <div class="actions">
             <div class="btn-group">
                 <a class="btn btn-sm btn-default dropdown-toggle" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                 Filtre <i class="fa fa-angle-down"></i>
                 </a>
                 <div class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
                     <label><input type="checkbox" name="hareket_tip[]" value="gorusme" {% if in_array('gorusme',tipler) or tipler[0] == '' %} checked {% endif %}   /> Görüşme</label>
                     <label><input type="checkbox" name="hareket_tip[]" value="kapora" {% if in_array('kapora',tipler) or tipler[0] == '' %} checked {% endif %}  /> Kapora</label>
                     <label><input type="checkbox" name="hareket_tip[]" value="satis"  {% if in_array('satis',tipler) or tipler[0] == '' %} checked {% endif %} /> Satış</label>
                 </div>
             </div>
         </div>
     </div>
     <div class="portlet-body">
         <div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible="0">
             <ul class="feeds">
                {% for hareket in hareketler %}
                 <li>
                     <div class="col1">
                         <div class="cont">
                             <div class="cont-col1">
                                 <div class="label label-sm label-{{hareket.label}}">
                                     <i class="fa {{hareket.icon}}"></i>
                                 </div>
                             </div>
                             <div class="cont-col2">
                                 <div class="desc">
                                 	{% if hareket.hareket_tip == 'satis' %}
                                 		{{message._("sale",["number":hareket.ilanlar.id,"name":hareket.ilanlar.baslik])}}
                                 	{% elseif hareket.hareket_tip == 'gorusme' %}	
                                 		{{message._("meet",["name":hareket.ilanlar.baslik])}}
                                 	{% elseif hareket.hareket_tip == 'kapora' %}
                                 		{{message._("downPay",["name":hareket.ilanlar.baslik,"pay":hareket.ilanlar.ilanKapora.fiyat])}}
                                    {% endif %}
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col2">
                         <div class="date">
                              {{helper.timeAgo(hareket.eklenme_tarihi)}}
                         </div>
                     </div>
                 </li>
                 {% endfor %}
             </ul>
         </div>
         <div class="scroller-footer">
             <div class="btn-arrow-link pull-right">
                 <a href="#">Tüm Kayıtları Gör</a>
                 <i class="icon-arrow-right"></i>
             </div>
         </div>
     </div>
</div>
<script>
$("[name='hareket_tip[]']").change(function(){
	var tipler = $("input[name='hareket_tip[]']:checked").map(function(_, el) {
	    return $(el).val();
	}).get();
	if(tipler == ''){
		tipler = null;
	}
	dashboard.hareketler(tipler);
})
</script>
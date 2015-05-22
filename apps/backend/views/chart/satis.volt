 <div id="site_activities_loading">
     <img src="{{url('backend/assets/layout/img/loading.gif')}}" alt="loading"/>
 </div>
 <div id="site_activities_content" class="display-none">
     <div id="site_activities" style="height: 228px;">
     </div>
 </div>
 <div style="margin: 20px 0 10px 30px">
     <div class="row">
         <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
             <span class="label label-sm label-success">
             Gelir: </span>
             <h3>{{helper.turkishLirasFormat(satis.toplam)}} TL</h3>
         </div>
         <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
             <span class="label label-sm label-info">
             Yüksek Fiyat: </span>
             <h3>{{helper.turkishLirasFormat(satis.max)}} TL</h3>
         </div>
         <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
             <span class="label label-sm label-danger">
             Düşük Fiyat: </span>
             <h3>{{helper.turkishLirasFormat(satis.min)}} TL</h3>
         </div>
         <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
             <span class="label label-sm label-warning">
             Adet: </span>
             <h3>{{satis.adet}}</h3>
         </div>
     </div>
 </div>
 <script>
 	charts.satisChart({{satis.veri|json_encode}})
 </script>
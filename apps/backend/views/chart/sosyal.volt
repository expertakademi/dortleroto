<div class="portlet box purple-wisteria">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-calendar"></i>Sosyal Medya
        </div>
        <div class="actions">
            <a href="javascript:;" class="btn btn-sm btn-default easy-pie-chart-reload">
            <i class="fa fa-repeat"></i> Yenile </a>
        </div>
    </div>
    <div class="portlet-body">
        <div class="row">
        	{% for item in oranlar.sonuclar %}
	            <div class="col-md-4">
	                <div class="easy-pie-chart">
	                    <div class="number {{item.tip}}" data-percent="{{helper.yuzdeKac(oranlar.toplam,item.ziyaret)}}">
	                        <span>
	                        {{helper.yuzdeKac(oranlar.toplam,item.ziyaret)}} </span>
	                        %
	                    </div>
	                    <a class="title load-modal" data-target="#generalModal" data-href="{{url('admin/chart/sosyalDetay/type:'~item.tip)}}">
	                    {% if item.tip == 'diger' %}
		                     Web Ziyareti  
	                    {% else %}
		                    {{item.tip|capitalize}} Ziyareti 
	                    {% endif %}
	                    <i class="icon-arrow-right"></i>
	                    </a>
	                </div>
	            </div>
	            <div class="margin-bottom-10 visible-sm">
	            </div>
	           {% endfor %}
            
        </div>
    </div>
</div>
<script>
charts.sosyalMedyaChart();
</script>
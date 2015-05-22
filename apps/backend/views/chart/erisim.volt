<!-- BEGIN PORTLET-->
<div class="portlet solid bordered grey-cararra">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bar-chart-o"></i>Erişim
        </div>
        <div class="actions">
            <div class="btn-group" data-toggle="buttons">
                <label class="btn grey-steel btn-sm erisim" data-type="sms">
                <input type="radio" name="options" class="toggle" id="option1">SMS</label>
                <label class="btn grey-steel btn-sm erisim" data-type="eposta">
                <input type="radio" name="options" class="toggle" id="option2">E-Posta</label>
                <label class="btn grey-steel btn-sm erisim" data-type="facebook" onClick="dashboard.erisimler('facebook')">
                <input type="radio" name="options" class="toggle" id="option3">Facebook</label>
                <label class="btn grey-steel btn-sm erisim" data-type="twitter" onClick="dashboard.erisimler('twitter')">
                <input type="radio" name="options" class="toggle" id="option4">Twitter</label>
                <label class="btn grey-steel btn-sm erisim" data-type="diger" onClick="dashboard.erisimler('diger')">
                <input type="radio" name="options" class="toggle" id="option5">Web</label>
                <label class="btn grey-steel btn-sm erisim" data-type="toplam" onClick="dashboard.erisimler()">
                <input type="radio" name="options" class="toggle" id="option6">Toplam</label>
            </div>
        </div>
    </div>
    <div class="portlet-body">
		<div id="site_statistics_loading">
     		<img src="{{url('backend/assets/layout/img/loading.gif')}}" alt="loading"/>
		</div>
		<div id="site_statistics_content" class="display-none">
		    <div id="site_statistics" class="chart">
		    </div>
		</div>
    </div>
</div>
<!-- END PORTLET-->
 <script>
 	charts.erisimChart({{erisim|json_encode}});
 	var type = "{{type}}";
	if(type == ""){
		type = "toplam";
	}
	$("label[data-type='"+type+"']").addClass("active");
 </script>
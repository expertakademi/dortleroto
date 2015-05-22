<div class="portlet box red-sunglo">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-calendar"></i>Ücretli Reklamlar
        </div>
    </div>
    <div class="portlet-body">
        <div class="row">
            <div class="col-md-4">
                <div class="sparkline-chart">
                    <div class="number" id="sparkline_adwords">
                    </div>
	                <a class="title load-modal" data-target="#generalModal" data-href="{{url('admin/chart/reklamDetay/type:adwords')}}">
                    Adwords <i class="icon-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="margin-bottom-10 visible-sm">
            </div>
            <div class="col-md-4">
                <div class="sparkline-chart">
                    <div class="number" id="sparkline_adroll">
                    </div>
	                <a class="title load-modal" data-target="#generalModal" data-href="{{url('admin/chart/reklamDetay/type:adroll')}}">
                    Adroll <i class="icon-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="margin-bottom-10 visible-sm">
            </div>
            <div class="col-md-4">
                <div class="sparkline-chart">
                    <div class="number" id="sparkline_facebook">
                    </div>
	                <a class="title load-modal" data-target="#generalModal" data-href="{{url('admin/chart/reklamDetay/type:facebook')}}">
                    Facebook <i class="icon-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
	charts.reklamChart({{adwords|json_encode}}, {{adroll|json_encode}}, {{facebook|json_encode}});
</script>
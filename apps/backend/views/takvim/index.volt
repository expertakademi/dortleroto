<!-- BEGIN PORTLET-->
<div class="portlet box blue-madison calendar">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-calendar"></i>Takvim
        </div>
    </div>
    <div class="portlet-body light-grey">
        <div id="calendar">
        </div>
    </div>
</div>
<!-- END PORTLET-->
<script>
	dashboard.initCalendar({{data}});
</script>
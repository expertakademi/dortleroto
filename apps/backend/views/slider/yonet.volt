<div class="portlet box grey-cascade">
	<div class="portlet-title">
		<div class="caption">
			Sliderlar
		</div>
		<div class="tools">
			<button class="btn green load-modal" data-target="#generalModal" data-href="{{url('admin/slider/ekle')}}" data-form="true">Yeni Slider</button>
		</div>
	</div>
	<div class="portlet-body">
		<div class="table-responsive">
			<table id="sliderlarTable" class="table table-border table-striped table-hover">
			</table>
		</div>
	</div>
</div>
<script>
window.onload = function() {
	  dataTables.sliderlar();
}
</script>
<div class="portlet box grey-cascade">
	<div class="portlet-title">
		<div class="caption">
			Modeller
		</div>
		<div class="tools">
			<button class="btn green load-modal" data-target="#containerModal" data-href="{{url('admin/model/ekle')}}" data-form="true">Yeni Model</button>
		</div>
	</div>
	<div class="portlet-body">
		<div class="table-responsive">
			<table id="modellerTable" class="table table-border table-striped table-hover">
			</table>
		</div>
	</div>
</div>
<script>
window.onload = function() {
	dataTables.modeller();
}
</script>
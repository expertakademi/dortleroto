<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">İlan Sil</h4>
</div>
<form class="form-fv form-horizontal" method="post" action="{{url('admin/ilan/silAjax')}}" data-dt-reload="true" data-dt-id="#ilanlarTable">
<div class="modal-body">
	<div class="form-body">
			<div class="col-md-12">
				Bu ilan silinecek emin misiniz ? Bu ilana ait tüm detaylar ve satış silinecektir.
				<input type="hidden" name="id"  value="{{id}}">
			</div>
			<div class="clearfix"></div>	
	</div>
</div>
<div class="modal-footer">
	<div class="form-actions">
			<div class="alert alert-dismissible hide col-md-12 text-center" role="alert">
				<button type="button" class="close" data-hide="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="alert-message"></div>
			</div>
			<div class="col-md-12 text-center">
				<input type="hidden" name="{{this.csrf.name}}"
				value="{{this.csrf.token}}"/>
				<button type="submit" class="btn red">Gönder</button>
				<button type="reset" class="btn green" data-dismiss="modal">İptal</button>
			</div>
	</div>
</div>
</form>
<!-- END FORM-->
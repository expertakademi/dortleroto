<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">İlan Notu Ekle</h4>
</div>
<form class="form-fv form-horizontal" method="post" action="{{url('admin/ilan/ekleNotAjax')}}" data-dt-reload="true" data-dt-id="#ilanNotlariTable">
<div class="modal-body">
	<div class="form-body">
		<div class="form-group">
			<label class="col-md-3 control-label">Not</label>
			<div class="col-md-8">
				<textarea class="form-control" name="aciklama"></textarea>
				<input type="hidden" name="ilan_id" value="{{ilan.id}}">
			</div>
		</div>
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
				<button type="submit" class="btn green">Gönder</button>
				<button type="reset" class="btn default">Sıfırla</button>
			</div>
	</div>
</div>
</form>
<!-- END FORM-->
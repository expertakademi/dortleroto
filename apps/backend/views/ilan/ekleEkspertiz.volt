<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Ekspertiz  Ekle</h4>
</div>
<form class="form-fv form-horizontal" method="post" enctype="multipart/form-data" action="{{url('admin/ilan/ekleEkspertizAjax')}}" data-reload="true">
<div class="modal-body">
	<div class="form-body">
		<input type="hidden" name="ilan_id" value="{{id}}">
		<div class="form-group ">
			<label class="control-label col-md-3">Dosya Seç</label>
			<div class="col-md-8">
				<input type="file" name="resim" required>
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
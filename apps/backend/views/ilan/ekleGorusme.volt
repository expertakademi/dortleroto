<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Görüşme Ekle</h4>
</div>
<form class="form-fv form-horizontal" method="post" action="{{url('admin/ilan/ekleGorusmeAjax')}}" data-dt-reload="true" data-dt-id="#ilanGorusmeleriTable">
<div class="modal-body">
	<div class="form-body">
		<div class="form-group">
			<label class="col-md-3 control-label">Ad Soyad</label>
			<div class="col-md-8">
				<input type="text" class="form-control" name="ad">
				<span class="help-block">Görüşme yapılacak kişi adı soyadı</span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label">Telefon</label>
			<div class="col-md-8">
				<input type="text" class="form-control" name="telefon" placeholder="(___) ___-___">
				<span class="help-block">Görüşme yapılacak kişi telefonu</span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label">Not</label>
			<div class="col-md-8">
				<textarea class="form-control" name="aciklama"></textarea>
				<input type="hidden" name="ilan_id" value="{{ilan.id}}">
			</div>
		</div>
		<div class="form-group">
				<label class="control-label col-md-3">Görüşme Tarihi</label>
				<div class="col-md-8">
					<div class="input-group date form_datetime">
						<input type="text" name="tarih" size="16" readonly="" class="form-control">
						<span class="input-group-btn">
						<button class="btn default date-set" type="button"><i class="fa fa-calendar"></i></button>
						</span>
					</div>
					<!-- /input-group -->
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

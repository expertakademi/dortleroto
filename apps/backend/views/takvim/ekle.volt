<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
    <h4 class="modal-title">Olay Ekle</h4>
</div>
<form class="form-fv form-horizontal" method="post" action="{{url('admin/takvim/ekleAjax')}}" data-callback="dashboard.takvim()">
<div class="modal-body">
	<div class="form-body">
		<div class="form-group">
			<label class="col-md-3 control-label">Olay Tanımı</label>
			<div class="col-md-8">
				<input type="text" class="form-control" placeholder="Olayı Yazınız"
				name="olay" autocomplete="off" minlength="5" maxlength="200" required>
			</div>
		</div>
		<div class="form-group">
				<label class="control-label col-md-3">Başlangıç Tarihi</label>
				<div class="col-md-8">
					<div class="input-group date form_datetime">
						<input type="text" name="baslangic" size="16" readonly="" class="form-control" value="{{baslangic}} - 09:00" required>
						<span class="input-group-btn">
						<button class="btn default date-set" type="button"><i class="fa fa-calendar"></i></button>
						</span>
					</div>
					<!-- /input-group -->
				</div>
		</div>
		<div class="form-group">
				<label class="control-label col-md-3">Bitiş Tarihi</label>
				<div class="col-md-8">
					<div class="input-group date form_datetime">
						<input type="text" name="bitis" size="16" readonly="" class="form-control" value="{{baslangic}} - 09:00" required>
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

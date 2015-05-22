<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Görev Düzenle</h4>
</div>
<form class="form-fv form-horizontal" method="post" action="{{url('admin/gorev/duzenleAjax')}}" data-callback="dashboard.gorevListele()">
<div class="modal-body">
	<div class="form-body">
		<div class="form-group">
			<label class="col-md-3 control-label">Görev Tanımı</label>
			<div class="col-md-8">
				<input type="text" class="form-control" placeholder="Görev Tanımı"
				name="aciklama" autocomplete="off" minlength="5" maxlength="200" value="{{gorev.aciklama}}" required>
				<input type="hidden" name="id" value="{{gorev.id}}">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label">Görev Birimi</label>
			<div class="col-md-8">
				<select name="tip" class="form-control">
					<option value="bireysel" {%if gorev.tip == 'bireysel'%} selected {% endif %}>Bireysel</option>
					<option value="kurumsal" {%if gorev.tip == 'kurumsal'%} selected {% endif %}>Kurumsal</option>
					<option value="pazarlama" {%if gorev.tip == 'pazarlama'%} selected {% endif %}>Pazarlama</option>
					<option value="teknik" {%if gorev.tip == 'teknik'%} selected {% endif %}>Teknik</option>
				</select>
			</div>
		</div>
		<div class="form-group">
				<label class="control-label col-md-3">Hedef Tarih</label>
				<div class="col-md-8">
					<div class="input-group date form_datetime">
						<input type="text" name="tarih" size="16" readonly="" class="form-control" value="{{helper.formatPicker(gorev.tarih)}}" >
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
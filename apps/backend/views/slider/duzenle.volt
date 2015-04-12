<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Slider  Düzenle</h4>
</div>
<form class="form-fv form-horizontal" method="post" action="{{url('admin/slider/duzenleAjax')}}" data-dt-reload="true" data-dt-id="#sliderlarTable">
<div class="modal-body">
	<div class="form-body">
		<div class="form-group">
			<label class="col-md-3 control-label">Başlık</label>
			<div class="col-md-8">
				<input type="text" class="form-control" placeholder="Başlık Giriniz"
				name="aciklama" autocomplete="off" minlength="3" maxlength="200" value="{{slider.aciklama}}" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label">Link</label>
			<div class="col-md-8">
				<input type="text" class="form-control" placeholder="Link Giriniz"
				name="link" autocomplete="off" minlength="3" maxlength="200" value="{{slider.link}}" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label">Sıralama</label>
			<div class="col-md-8">
				<input type="text" class="form-control" placeholder="Sıralama Giriniz"
				name="siralama" autocomplete="off" data-fv-digits="true" value="{{slider.siralama}}" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label">Aktif</label>
			<div class="col-md-8">
				<select name="aktif" class="form-control">
					<option value="1" {% if slider.aktif == 1 %} selected {% endif %}>Aktif</option>
					<option value="0" {% if slider.aktif == 0 %} selected {% endif %}>Pasif</option>
				</select>
				<input type="hidden" name="id" value="{{slider.id}}">
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
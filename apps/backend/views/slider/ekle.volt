<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Slider  Ekle</h4>
</div>
<form class="form-fv form-horizontal" method="post" enctype="multipart/form-data" action="{{url('admin/slider/ekleAjax')}}" data-dt-reload="true" data-dt-id="#sliderlarTable">
<div class="modal-body">
	<div class="form-body">
		<div class="form-group">
			<label class="col-md-3 control-label">Başlık</label>
			<div class="col-md-8">
				<input type="text" class="form-control" placeholder="Başlık Giriniz"
				name="aciklama" autocomplete="off" minlength="3" maxlength="200" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label">Link</label>
			<div class="col-md-8">
				<input type="text" class="form-control" placeholder="Link Giriniz"
				name="link" autocomplete="off" minlength="3" maxlength="200" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label">Sıralama</label>
			<div class="col-md-8">
				<input type="text" class="form-control" placeholder="Sıralama Giriniz"
				name="siralama" autocomplete="off" data-fv-digits="true" required>
			</div>
		</div>
		<div class="form-group ">
			<label class="control-label col-md-3">Resim Seç</label>
			<div class="col-md-8">
				<div class="fileinput fileinput-new" data-provides="fileinput">
					<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
						<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=resim+seç" alt="">
					</div>
					<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 10px;"></div>
					<div>
						<span class="btn default btn-file">
						<span class="fileinput-new">
						Resim Seç </span>
						<span class="fileinput-exists">
						Değiştir </span>
						<input type="hidden" value="" name="..."><input type="file" name="resim" required>
						</span>
						<a href="#" class="btn red fileinput-exists" data-dismiss="fileinput">
						Kaldır </a>
					</div>
				</div>
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
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Mesaj Gönder</h4>
</div>
<form class="form-fv form-horizontal" method="post" action="{{url('mesaj/ekleAjax')}}">
<div class="modal-body">
	<div class="form-body">
		<div class="form-group">
			<label class="col-md-3 control-label">Adınız</label>
			<div class="col-md-8">
				<input type="text" class="form-control" placeholder="Ad soyad giriniz"
				name="ad" autocomplete="off" minlength="5" maxlength="200" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label">E-mail adresiniz</label>
			<div class="col-md-8">
				<input type="text" class="form-control" placeholder="E-mail adresi giriniz"
				name="email" autocomplete="off" minlength="5" maxlength="200" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label">Telefonunuz</label>
			<div class="col-md-8">
				<input type="text" class="form-control" placeholder="Telefon numaranızı giriniz"
				name="tel" autocomplete="off" minlength="5" maxlength="200" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label">Mesajınız</label>
			<div class="col-md-8">
				<textarea name="mesaj" class="form-control" required></textarea>
				<input type="hidden" name="ilan_id" value="{{ilanId}}">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-12">* Müşteri temsilcimiz en kısa zamanda mesajınız ile ilgili sizlere dönüş yapacaktır. </label>
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
				<button type="submit" class="btn btn-success">Gönder</button>
				<button type="reset" class="btn btn-default">Sıfırla</button>
			</div>
	</div>
</div>
</form>
<!-- END FORM-->
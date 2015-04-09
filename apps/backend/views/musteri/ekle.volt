<div class="portlet light bg-inverse">
	<div class="portlet-title">
		<div class="caption">
			<span class="caption-subject font-red-sunglo bold uppercase">Yeni Müşteri</span>
		</div>
	</div>
	<div class="portlet-body form">
		<!-- BEGIN FORM-->
		<form class="form-horizontal form-fv" action="{{url('admin/musteri/ekleAjax')}}" method="post">
			<div class="form-body">
				<div class="form-group">
					<label class="col-md-3 control-label">Müşteri Adı</label>
					<div class="col-md-8">
						<input type="text" name="ad" class="form-control" placeholder="Müşteri Adı Giriniz" autocomplete="off" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Sabit Telefon</label>
					<div class="col-md-8">
						<input type="text" name="sabit" class="form-control" placeholder="Sabit Telefonu Giriniz">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Cep Telefonu</label>
					<div class="col-md-8">
						<input type="text" name="cep" class="form-control" placeholder="Cep Telefonu Giriniz" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Email</label>
					<div class="col-md-8">
						<input type="text" name="email" class="form-control" placeholder="Email Adresi Giriniz" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Adres</label>
					<div class="col-md-8">
						<textarea class="form-control" name="adres" placeholder="Müşteri Adresi"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Müşteri Notu</label>
					<div class="col-md-8">
						<textarea class="form-control" name="not" placeholder="Müşteri Hakkında Ekstra Bilgi Girebilirsiniz"></textarea>
					</div>
				</div>
			</div>
			<div class="form-actions">
				<div class="row">
						<div class="alert alert-dismissible hide col-md-offset-2 col-md-7" role="alert">
							<button type="button" class="close" data-hide="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<div class="alert-message"></div>
						</div>
						<div class="clearfix"></div>
					<div class="col-md-offset-3 col-md-4">
						<input type="hidden" name="{{this.csrf.name}}"
						value="{{this.csrf.token}}"/>
						<button type="submit" class="btn green">Ekle</button>
						<button type="reset" class="btn default">Sıfırla</button>
					</div>
				</div>
			</div>
		</form>
		<!-- END FORM-->
	</div>
</div>
<script type="text/javascript">
	window.onload =  function () {
		$("[name='sabit']").mask("(999) 999-9999", {placeholder: "(___) ___-___"});
		$("[name='cep']").mask("(999) 999-9999", {placeholder: "(___) ___-___"});

	}
</script>
<div class="portlet light bg-inverse">
	<div class="portlet-title">
		<div class="caption">
			<span class="caption-subject font-red-sunglo bold uppercase">Toplu Sms</span>
		</div>
		<div class="actions">

		</div>
	</div>
	<div class="portlet-body form">
		<!-- BEGIN FORM-->
		<form class="form-fv form-horizontal" action="{{url('admin/pazarlama/topluSmsAjax')}}" method="post" >
			<div class="form-body">
				<div class="form-group">
					<label class="col-md-3 control-label">Mesajınız</label>
					<div class="col-md-8">
						<textarea class="form-control" name="mesaj" 
						maxlength="155" minlength="10" data-fv-stringlength-utf8bytes="true"required></textarea>
						<span class="help-block">Türkçe karakterler 2 karakter yer kaplamaktadır. Min 10 Max 155 Karakter girilebilir.</span>
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
						<button type="submit" class="btn green">Gönder</button>
						<button type="reset" class="btn default">Sıfırla</button>
					</div>
				</div>
			</div>
		</form>
		<!-- END FORM-->
	</div>
</div>
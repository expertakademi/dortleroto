<div class="portlet light bg-inverse">
	<div class="portlet-title">
		<div class="caption">
			<span class="caption-subject font-red-sunglo bold uppercase">SERİ EKLE</span>
		</div>
	</div>
	<div class="portlet-body form">
		<!-- BEGIN FORM-->
		<form class="form-fv form-horizontal" method="post" action="{{url('admin/seri/ekleAjax')}}">
			<div class="form-body">
				<div class="form-group">
					<label class="col-md-3 control-label">Adı</label>
					<div class="col-md-4">
						<input type="text" class="form-control" placeholder="Seri Adı Giriniz"
						name="seriAdi" autocomplete="off" minlength="3" maxlength="200" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Marka</label>
					<div class="col-md-4">
						<select class="form-control" name="marka" required>
							{% for marka in markalar%}
								<option value="{{marka.id}}">{{marka.ad}}</option>
							{% endfor %}
						</select>
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
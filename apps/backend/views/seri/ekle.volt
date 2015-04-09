<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Seri Ekle</h4>
</div>
<form class="form-fv form-horizontal" method="post" action="{{url('admin/seri/ekleAjax')}}" data-dt-reload="true" data-dt-id="#serilerTable">
<div class="modal-body">
	<div class="form-body">
		<div class="form-group">
			<label class="col-md-3 control-label">Adı</label>
			<div class="col-md-8">
				<input type="text" class="form-control" placeholder="Seri Adı Giriniz"
				name="seriAdi" autocomplete="off" minlength="3" maxlength="200" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label">Marka</label>
			<div class="col-md-8">
				<select class="form-control" name="marka" required>
					{% for marka in markalar%}
						<option value="{{marka.id}}">{{marka.ad}}</option>
					{% endfor %}
				</select>
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
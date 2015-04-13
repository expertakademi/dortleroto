<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">İlan Kapora</h4>
</div>
<form class="form-fv form-horizontal" method="post" action="{{url('admin/ilan/kaporaDuzenleAjax')}}" data-reload="true">
<div class="modal-body">
	<div class="form-body">
	{% if kapora %}
		<div class="form-group">
			<label class="col-md-3 control-label">Kapora Miktarı</label>
			<div class="col-md-8">
				<input type="text" class="form-control" name="fiyat" value="{{kapora.fiyat}}">
				<span class="help-block">Alınan kapora miktarı</span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label">Açıklama</label>
			<div class="col-md-8">
				<input type="text" class="form-control" name="aciklama" value="{{kapora.aciklama}}">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label">Açıklama</label>
			<div class="col-md-8">
				<select class="form-control" name="durum">
					{% if kapora.durum == 1 %}
						<option value="1" selected>Alındı</option>
						<option value="0" >Alınmadı</option>
					{% else %}
						<option value="0" selected>Alınmadı</option>
						<option value="1" >Alındı</option>
					{% endif %}
				</select>
			</div>
		</div>
	{% else %}
		<div class="form-group">
			<label class="col-md-3 control-label">Kapora Miktarı</label>
			<div class="col-md-8">
				<input type="text" class="form-control" name="fiyat">
				<span class="help-block">Alınan kapora miktarı</span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label">Açıklama</label>
			<div class="col-md-8">
				<input type="text" class="form-control" name="aciklama">
			</div>
		</div>
	{% endif %}
	<input type="hidden" name="ilanId" value="{{id}}">
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

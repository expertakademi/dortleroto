<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Marka Duzenle</h4>
</div>
<form class="form-fv form-horizontal" method="post" action="{{url('admin/model/duzenleAjax')}}" data-dt-reload="true" data-dt-id="#modellerTable">
<div class="modal-body">
	<div class="form-body">
		<div class="form-group">
			<label class="col-md-3 control-label">Adı</label>
			<div class="col-md-8">
				<input type="text" class="form-control" placeholder="Model Adı Giriniz"
				name="modelAdi" autocomplete="off" minlength="3" maxlength="200" value="{{model.ad}}" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label">Marka</label>
			<div class="col-md-8">
				<select class="form-control" name="marka" required>
					<option value="">Seçiniz</option>
					{% for marka in markalar%}
						<option value="{{marka.id}}" {% if marka.id == model.seriler.marka_id %}selected{% endif %}>{{marka.ad}}</option>
					{% endfor %}
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label">Seri</label>
			<div class="col-md-8">
				<select class="form-control" name="seri" required>
					<option value="">Seçiniz</option>
					{% for seri in seriler%}
						<option value="{{seri.id}}" {% if seri.id == model.seri_id %}selected{% endif %}>{{seri.ad}}</option>
					{% endfor %}
				</select>
				<input type="hidden" name="id" value="{{model.id}}">
			</div>
		</div>

                <div class="offset-1 portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-green-haze">
                            <i class="icon-check font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase"> Özellikler</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        {% for facilityCode, facility in facilities %}
                            <div class="form-group form-md-checkboxes">
                                <label><b>{{ facility }}<b/></label>
                                <div class="md-checkbox-list">
                                    <div class="row">
                                        {% for featureId, feature in facilityFeatures[facilityCode] %}
                                            <div class="col-md-3" >
                                                <div class="md-checkbox">
                                                    <label>
                                                        <input type="checkbox" class="md-check" name="facilityFeatures[{{featureId}}]" value="1" {% if selectedFacilites[featureId]  is defined %} checked="checked" {% endif %} >
                                                        {{feature}} 
                                                    </label>
                                                </div>
                                            </div>
                                        {% endfor  %}
                                    </div>
                                </div>
                            </div>
                        {% endfor  %}
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
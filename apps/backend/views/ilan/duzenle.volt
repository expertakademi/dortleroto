<div class="portlet light bg-inverse">
	<div class="portlet-title">
		<div class="caption">
			<span class="caption-subject font-red-sunglo bold uppercase">İlan Düzenle </span>
		</div>
		<div class="actions">
			<a href="{{url('admin/ilan/resimDuzenle/id:'~ilan.id)}}" class="btn blue btn-sm"><i class="fa fa-photo"></i> Resimleri Düzenle</a>
		</div>
	</div>
	<div class="portlet-body form">
		<!-- BEGIN FORM-->
		<form action="{{url('admin/ilan/duzenleAjax')}}" class="form-fv horizontal-form" method="post"  data-summernote="true">
			<div class="form-body">
				<h3 class="form-section">Temel Bilgiler</h3>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label class="control-label">Başlık</label>
							<input type="text" name="baslik" class="form-control" 
							minlength="10" maxlength="200" value="{{ilan.baslik}}" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Satış Kategorisi</label>
							<select name="kategori" class="form-control" required>
								<option value="">Seçiniz</option>
								{% for kategori in kategoriler %}
									<option value="{{kategori.id}}" {% if kategori.id == ilan.kategori_id %} selected {% endif %}>{{kategori.ad}}</option>
								{% endfor %}
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Marka</label>
							<select name="marka" class="form-control" required>
								<option value="">Seçiniz</option>
								{% for marka in markalar %}
									<option value="{{marka.id}}" {% if marka.id == ilan.marka_id %} selected  {% endif %}>{{marka.ad}}</option>
								{% endfor %}
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Seri</label>
							<select name="seri" class="form-control" required>
								<option value="">Seçiniz</option>
								{% for seri in seriler %}
									<option value="{{seri.id}}" {% if seri.id == ilan.seri_id %} selected  {% endif %}>{{seri.ad}}</option>
								{% endfor %}
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Model</label>
							<select name="model" class="form-control" required>
								<option value="">Seçiniz</option>
								{% for model in modeller %}
									<option value="{{model.id}}" {% if model.id == ilan.model_id %} selected  {% endif %}>{{model.ad}}</option>
								{% endfor %}
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Temsilci</label>
							<select name="temsilci" class="form-control" required>
								<option value="">Seçiniz</option>
								{% for temsilci in temsilciler %}
									<option value="{{temsilci.id}}" {% if ilan.temsilci_id == temsilci.id %}selected{% endif %}>{{temsilci.ad}}</option>
								{% endfor %}
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Yıl</label>
							<input type="text" name="yil" class="form-control" 
							data-fv-integer="true" min="1950" max="{{date('Y')}}" value="{{ilan.yil}}" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Fiyat</label>
							<input type="text" name="fiyat" class="form-control" placeholder="" 
							data-fv-integer="true" min="1" value="{{ilan.fiyat}}" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Kilometre</label>
							<input type="text" name="kilometre" class="form-control" placeholder="" 
							data-fv-integer="true" min="1"  value="{{ilan.kilometre}}" required>
						</div>
					</div>
				</div>
				<!--/row-->
				<h3 class="form-section">Araç Özellikleri</h3>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Yakıt</label>
							<select name="yakit" class="form-control" required>
								<option value="">Seçiniz</option>
								{% for yakit in yakitlar %}
									<option value="{{yakit.id}}" {% if yakit.id == ilan.yakit_id %} selected  {% endif %}>{{yakit.ad}}</option>
								{% endfor %}
							</select>						
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Renk</label>
							<select name="renk" class="form-control" required>
								<option value="">Seçiniz</option>
								{% for renk in renkler %}
									<option value="{{renk.id}}" {% if renk.id == ilan.renk_id %} selected  {% endif %}>{{renk.ad}}</option>
								{% endfor %}
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Motor Hacmi</label>
							<select name="hacim" class="form-control" required>
								<option value="">Seçiniz</option>
								{% for hacim in hacimler %}
									<option value="{{hacim.id}}" {% if hacim.id == ilan.motor_hacim_id %} selected  {% endif %}>{{hacim.ad}}</option>
								{% endfor %}
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Motor Gücü</label>
							<select name="guc" class="form-control" required>
								<option value="">Seçiniz</option>
								{% for guc in gucler %}
									<option value="{{guc.id}}" {% if guc.id == ilan.motor_guc_id %} selected  {% endif %}>{{guc.ad}}</option>
								{% endfor %}
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Çekiş</label>
							<select name="cekis" class="form-control" required>
								<option value="">Seçiniz</option>
								{% for cekis in cekisler %}
									<option value="{{cekis.id}}" {% if cekis.id == ilan.cekis_id %} selected  {% endif %}>{{cekis.ad}}</option>
								{% endfor %}
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Vites</label>
							<select name="vites" class="form-control" required>
								<option value="">Seçiniz</option>
								{% for vites in vitesler %}
									<option value="{{vites.id}}" {% if vites.id == ilan.vites_id %} selected  {% endif %}>{{vites.ad}}</option>
								{% endfor %}
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Kasa</label>
							<select name="kasa" class="form-control" required>
								<option value="">Seçiniz</option>
								{% for kasa in kasalar %}
									<option value="{{kasa.id}}" {% if kasa.id == ilan.kasa_id %} selected  {% endif %}>{{kasa.ad}}</option>
								{% endfor %}
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Garanti</label>
							<select name="garanti" class="form-control" required>
								<option value="">Seçiniz</option>
								<option value="0" {% if 0 == ilan.garanti %} selected  {% endif %}>Yok</option>
								<option value="1" {% if 1 == ilan.garanti %} selected  {% endif %}>Var</option>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Hasar Durumu</label>
							<select name="hasar" class="form-control" required>
								<option value="">Seçiniz</option>
								<option value="0" {% if 0 == ilan.hasarsiz %} selected  {% endif %}>Hasarlı</option>
								<option value="1" {% if 1 == ilan.hasarsiz %} selected  {% endif %}>Hasarsız</option>
							</select>
						</div>
					</div>
				</div><!-- row -->
				<h3 class="form-section">İlan Açıklaması</h3>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
	                    	<textarea name="aciklama"class="form-control summernote">{{ilan.ilanAciklamalari.aciklama}}</textarea>
	               			<input type="hidden" name="id" value="{{ilan.id}}">
	               		</div>
					</div>
				</div><!-- row -->
                                <h3 class="form-section">Hasar</h3>
                                <div class="row text-center">
                                    <div class="form-group">
                                    <img src="{{url('frontend/assets/img/expertiz.jpg')}}" alt="logo" style="width: 500px;"/>
                                    </div>
                                </div>
				<div class="row">
                                    {% set areaNos = [1,2,3,4,5,6,7,8,9,10,11,12,13] %}
                                    {% for areaNo in areaNos %}
                                        <div class="col-md-1 text-right">
                                            {{areaNo}}:
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select name="ilanDamages[{{areaNo}}]">
                                                    <option value="0">Seçiniz</option>
                                                    {% for damageIndex,damageValue in damageValues %}
                                                        <option value="{{damageIndex}}" {% if selectedDamages[areaNo] is defined and selectedDamages[areaNo] == damageIndex %} selected="selected" {% endif %}>{{damageValue}}</option>
                                                    {% endfor %}
                                                </select>
                                            </div>
                                        </div>
                                    {% endfor %}
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
                                                                <input type="checkbox" class="md-check features-list" id="feature-{{featureId}}" name="facilityFeatures[{{featureId}}]" value="1" {% if selectedFacilites[featureId]  is defined %} checked="checked" {% endif %} >
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
<script type="text/javascript">
window.onload = function(){
	form.summernote();
}
</script>
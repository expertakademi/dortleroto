<div class="portlet light bg-inverse">
	<div class="portlet-title">
		<div class="caption">
			<span class="caption-subject font-red-sunglo bold uppercase">İlan Ekle</span>
		</div>
	</div>
	<div class="portlet-body form">
		<!-- BEGIN FORM-->
		<form action="{{url('admin/ilan/ekleAjax')}}" class="form-fv horizontal-form" method="post" enctype="multipart/form-data" data-summernote="true">
			<div class="form-body">
				<h3 class="form-section">Temel Bilgiler</h3>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label class="control-label">Başlık</label>
							<input type="text" name="baslik" class="form-control" 
							minlength="10" maxlength="200" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Satış Kategorisi</label>
							<select name="kategori" class="form-control" required>
								<option value="">Seçiniz</option>
								{% for kategori in kategoriler %}
									<option value="{{kategori.id}}">{{kategori.ad}}</option>
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
									<option value="{{marka.id}}">{{marka.ad}}</option>
								{% endfor %}
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Seri</label>
							<select name="seri" class="form-control" required>
								<option value="">Marka Seçiniz</option>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Model</label>
							<select name="model" class="form-control" required>
								<option value="">Seri Seçiniz</option>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Temsilci</label>
							<select name="temsilci" class="form-control" required>
								<option value="">Seçiniz</option>
								{% for temsilci in temsilciler %}
									<option value="{{temsilci.id}}">{{temsilci.ad}}</option>
								{% endfor %}
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Yıl</label>
							<input type="text" name="yil" class="form-control" 
							data-fv-integer="true" min="1950" max="{{date('Y')}}" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Fiyat</label>
							<input type="text" name="fiyat" class="form-control" placeholder="" 
							data-fv-integer="true" min="1" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Kilometre</label>
							<input type="text" name="kilometre" class="form-control" placeholder="" 
							data-fv-integer="true" min="1" required>
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
									<option value="{{yakit.id}}">{{yakit.ad}}</option>
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
									<option value="{{renk.id}}">{{renk.ad}}</option>
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
									<option value="{{hacim.id}}">{{hacim.ad}}</option>
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
									<option value="{{guc.id}}">{{guc.ad}}</option>
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
									<option value="{{cekis.id}}">{{cekis.ad}}</option>
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
									<option value="{{vites.id}}">{{vites.ad}}</option>
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
									<option value="{{kasa.id}}">{{kasa.ad}}</option>
								{% endfor %}
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Garanti</label>
							<select name="garanti" class="form-control" required>
								<option value="">Seçiniz</option>
								<option value="0">Yok</option>
								<option value="1">Var</option>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Hasar Durumu</label>
							<select name="hasar" class="form-control" required>
								<option value="">Seçiniz</option>
								<option value="0">Hasarlı</option>
								<option value="1">Hasarsız</option>
							</select>
						</div>
					</div>
				</div><!-- row -->
				<h3 class="form-section">İlan Açıklaması</h3>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
	                    	<textarea name="aciklama"class="form-control summernote"></textarea>
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
                                                        <option value="{{damageIndex}}">{{damageValue}}</option>
                                                    {% endfor %}
                                                </select>
                                            </div>
                                        </div>
                                    {% endfor %}
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
                                                                        <input type="checkbox" class="md-check features-list" id="feature-{{featureId}}" name="facilityFeatures[{{featureId}}]" value="1">
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

                                <h3 class="form-section">Resimler</h3>
				<div class="row">
					<div class="col-md-12">
                                            <div class="form-group">
                                            <input id="resimler" name="resim[]" type="file" multiple="true" 
                                            data-fv-file="true" 
                                            data-fv-file-maxsize="1048576"
                                            data-fv-file-message="Her bir resim max 1 MB olabilir ve en fazla 10 resim yüklenebilir."
                                            data-fv-file-maxfiles="10"	
                                            required>
                                            <input type="hidden" name="kapak" value="">
                                            </div>
					</div>
				</div><!-- row -->
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
window.onload = function(){
	$("#resimler").fileinput({
		showUpload: false,
		showCaption: false,
		browseClass: "btn btn-primary btn-lg",
		allowedFileTypes : ['image'],
		
		
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
	});
	form.summernote();
}
</script>
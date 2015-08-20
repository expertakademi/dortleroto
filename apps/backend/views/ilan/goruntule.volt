<div class="portlet light bg-inverse col-md-12">
	<div class="portlet-title">
		<div class="caption">
			<span class="caption-subject bold font-red-flamingo uppercase">
			İlan Görüntüle </span>
		</div>
		<div class="actions">
			{% if satis == false %}
			<div class="btn-group">
				<a class="btn btn-sm red" href="#" data-toggle="dropdown" aria-expanded="false">
				 <i class="fa fa-try"></i> Satış <i class="fa fa-angle-down"></i>
				</a>
				<ul class="dropdown-menu pull-right">
						<li>
							<a class="load-modal" data-target="#generalModal" data-href="{{url('admin/ilan/ekleSatis/id:'~ilan.id)}}" data-form="true">
							<i class="fa fa-pencil"></i> Ekle </a>
						</li>
				</ul>
			</div>
			<div class="btn-group">
				<a class="btn btn-sm green" href="#" data-toggle="dropdown" aria-expanded="false">
				 <i class="fa fa-car"></i> Ekspertiz <i class="fa fa-angle-down"></i>
				</a>
				<ul class="dropdown-menu pull-right">
					{%if ekspertiz %}	
					<li>
						<a href="{{url(ekspertiz.link)}}" target="blank">
						<i class="fa fa-eye"></i> Görüntüle </a>
					</li>
					{%else%}
						<li>
							<a class="load-modal" data-target="#generalModal" data-href="{{url('admin/ilan/ekleEkspertiz/id:'~ilan.id)}}" data-form="true">
							<i class="fa fa-pencil"></i> Ekle </a>
						</li>
					{%endif%}

				</ul>
			</div>
			<button class="btn blue load-modal" data-target="#generalModal" data-href="{{url('admin/ilan/kaporaGoruntule/id:'~ilan.id)}}" data-form="true"><i class="fa fa-ticket"></i> Kapora </button>
			{% endif %}

		</div>
	</div>
	<div class="portlet-body">
		<div class = "col-md-6">
			<div class="row static-info">
				<div class="col-md-3 name">
					 İlan No :
				</div>
				<div class="col-md-9 value">
					 {{ilan.id}}
				</div>
			</div>
			<div class="row static-info">
				<div class="col-md-3 name">
					 İlan Başlığı :
				</div>
				<div class="col-md-9 value">
					 {{ilan.baslik}}
				</div>
			</div>
			<div class="row static-info">
				<div class="col-md-3 name">
					 Marka :
				</div>
				<div class="col-md-9 value">
					 {{ilan.marka_adi}}
				</div>
			</div>
			<div class="row static-info">
				<div class="col-md-3 name">
					 Seri :
				</div>
				<div class="col-md-9 value">
					 {{ilan.seri_adi}}
				</div>
			</div>
			<div class="row static-info">
				<div class="col-md-3 name">
					 Model :
				</div>
				<div class="col-md-9 value">
					 {{ilan.model_adi}}
				</div>
			</div>
		</div>
		<div class = "col-md-6">
			<div class="row static-info">
				<div class="col-md-3 name">
					 Fiyat :
				</div>
				<div class="col-md-9 value">
					 {{ilan.fiyat}}
				</div>
			</div>
			<div class="row static-info">
				<div class="col-md-3 name">
					 İlan Tarihi :
				</div>
				<div class="col-md-9 value">
					 {{ilan.eklenme_tarihi}}
				</div>
			</div>
			<div class="row static-info">
				<div class="col-md-3 name">
					 Kilometre :
				</div>
				<div class="col-md-9 value">
					 {{ilan.kilometre}}
				</div>
			</div>
			<div class="row static-info">
				<div class="col-md-3 name">
					 İlan Durumu :
				</div>
				<div class="col-md-9 value">
					 {% if ilan.aktif == 1 %}
					 	Aktif
					 {% elseif ilan.aktif == 2 %}
					 	<span class="text-danger">Satıldı</span>
					 {% else %}
					 	Pasif
					 {% endif %}
				</div>
			</div>
		</div>
		{% if satis == false %}
		<div class = "col-md-12">
			<div class="row static-info">
					{% if kapora == null %}
						<div class="col-md-2 name">
					 		Kapora Durumu :
						</div>
						<div class="col-md-2 value">
							Alınmadı
						</div>
						<div class="col-md-2 name">
							 Kapora Miktarı :
						</div>
						<div class="col-md-2 value">
							-
						</div>
						<div class="col-md-2 name">
							 Kapora Açıklama :
						</div>
						<div class="col-md-2 value">
							-
						</div>
					{% else %}
						<div class="col-md-2 name">
					 		Kapora Durumu :
						</div>
						<div class="col-md-2 value">
							Alındı
						</div>
						<div class="col-md-2 name">
							 Kapora Miktarı :
						</div>
						<div class="col-md-2 value">
							{{kapora.fiyat}}
						</div>
						<div class="col-md-2 name">
							 Kapora Açıklama :
						</div>
						<div class="col-md-2 value">
							{{kapora.aciklama}}
						</div>
						
					{% endif %}

			</div>
		</div>
		{%endif%}
		<div class="clearfix"></div>
	</div>
</div>
<div class="col-md-6 no-padding-left">
	<div class="portlet light bg-inverse">
		<div class="portlet-title">
			<div class="caption">
				<span class="caption-subject bold font-red-flamingo uppercase">
				İlan Notları </span>
			</div>
			<div class="actions">
				<button class="btn green load-modal" data-target="#generalModal" data-href="{{url('admin/ilan/ekleNot/id:'~ilan.id)}}" data-form="true"><i class="fa fa-plus"></i> Ekle </button>
			</div>
		</div>
		<div class="portlet-body">
			<div class="table-responsive">
				<table id="ilanNotlariTable" class="table table-border table-striped table-hover">
				</table>
			</div>
		</div>
	</div>
</div>
<div class="col-md-6 no-padding-right">
	<div class="portlet light bg-inverse">
		<div class="portlet-title">
			<div class="caption">
				<span class="caption-subject bold font-red-flamingo uppercase">
				Görüşme Talepleri </span>
			</div>
			<div class="actions">
				<button  class="btn green load-modal" data-target="#generalModal" data-href="{{url('admin/ilan/ekleGorusme/id:'~ilan.id)}}" data-form="true"><i class="fa fa-plus"></i> Ekle </button>
			</div>
		</div>
		<div class="portlet-body">
			<div class="table-responsive">
				<table id="ilanGorusmeleriTable" class="table table-border table-striped table-hover">
				</table>
			</div>
		</div>
	</div>
</div>
<div class="row">  
<div class="col-md-12 no-padding-right">
	<div class="portlet light bg-inverse">
		<div class="portlet-title">
			<div class="caption">
				<span class="caption-subject bold font-red-flamingo uppercase">
				Hasar </span>
			</div>
		</div>
		<div class="portlet-body">
			<div class="row text-center">
                            <div class="form-group">
                            <img src="{{url('frontend/assets/img/expertiz.jpg')}}" alt="logo" style="width: 500px;"/>
                            </div>
                        </div>
                        <div class="row">
                            {% set areaNos = [1,2,3,4,5,6,7,8,9,10,11,12,13], counters = 1 %}
                            {% for areaNo in areaNos %}
                                {% if selectedDamages[areaNo] is defined and selectedDamages[areaNo] != 0 %}
                                    {% set counters = 1 %}
                                    <div class="col-md-1 text-right">
                                        <b>{{areaNo}}:</b>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                                {{damageValues[selectedDamages[areaNo]]}}
                                        </div>
                                    </div>
                                {% endif %}
                            {% endfor %}
                            {% if counters == 0 %}
                                <div class="text-center">
                                <b>Müsait değil</b>
                                </div>
                            {% endif %}
                        </div>
		</div>
	</div>
</div>
</div>
<script type="text/javascript">
window.onload = function() {
	  dataTables.ilanNotlari({{ilan.id}});
	  dataTables.ilanGorusmeleri({{ilan.id}});
		$("[name='telefon']").mask("(999) 999-9999", {placeholder: "(___) ___-___"});
}
</script>

<div class="portlet light bg-inverse">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-user"></i>
			<span class="caption-subject bold font-red-flamingo uppercase">
			Müşteri Görüntüle </span>
		</div>
		<div class="actions">
			<a class="btn btn-circle btn-icon-only btn-default" href="{{url('admin/musteri/duzenle/id:'~musteri.id)}}" title="Düzenle">
				<i class="fa fa-edit"></i>
			</a>
		</div>
	</div>
	<div class="portlet-body">
		<div class="col-md-2">
			<img src="http://www.ilkerkirmizi.com.tr/wp-content/uploads/2012/05/blank_profile.png" class="img-responsive">
		</div>
		<div class = "col-md-10">
			<div class="row static-info">
				<div class="col-md-2 name">
					 Müşteri Adı :
				</div>
				<div class="col-md-10 value">
					 {{musteri.ad}}
				</div>
			</div>
			<div class="row static-info">
				<div class="col-md-2 name">
					 Sabit Telefon :
				</div>
				<div class="col-md-10 value">
					 {{helper.formatPhoneNumber(musteri.sabit_telefon)}}
				</div>
			</div>
			<div class="row static-info">
				<div class="col-md-2 name">
					 Cep Telefonu:
				</div>
				<div class="col-md-10 value">
					 {{helper.formatPhoneNumber(musteri.cep_telefon)}}
				</div>
			</div>
			<div class="row static-info">
				<div class="col-md-2 name">
					 E-mail:
				</div>
				<div class="col-md-10 value">
					 {{musteri.email}}
				</div>
			</div>
			<div class="row static-info">
				<div class="col-md-2 name">
					 Adres:
				</div>
				<div class="col-md-10 value">
					 {{musteri.adres}}
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<div class="portlet light bg-inverse">
	<div class="portlet-title">
		<div class="caption">
			Müşteri Notları
		</div>
		<div class="tools">
			<button class="btn green load-modal" data-target="#generalModal" data-href="{{url('admin/musteri/ekleNot/id:'~musteri.id)}}" data-form="true">Yeni Not</button>
		</div>
	</div>
	<div class="portlet-body">
		<div class="table-responsive">
			<table id="musteriNotlariTable" class="table table-border table-striped table-hover">
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">
window.onload = function() {
	  dataTables.musteriNotlari({{musteri.id}});
}
</script>
<div class="col-md-12 inbox">
	<div class="inbox-header">
			<div class="input-group input-medium">
				<span class="input-group-btn">
				</span>
			</div>
	</div>
	<div class="inbox-loading" style="display: none;">
		 Loading...
	</div>
	<div class="inbox-content">
		<div class="inbox-header inbox-view-header">
			<h1 class="pull-left">{{mesaj.baslik}} 
			<a href="#">{{mesaj.tip | capitalize}}</a>
			</h1>
			<div class="pull-right">
				
			</div>
		</div>
		<div class="inbox-view-info">
			<div class="row">
				<div class="col-md-9">
					Müşteri Adı: <span class="bold"> {{mesaj.musteri_adi}} </span>
					Müşteri Email: <span class="bold"> {{mesaj.musteri_email}} </span>
					Müşteri Telefon: <span class="bold"> {{mesaj.musteri_tel}} </span>
				</div>
				<div class="col-md-3 inbox-info-btn">
	
				</div>
			</div>
		</div>
		{% for ileti in iletiler %}
			<div class="inbox-view">
				{% if ileti.gonderici == 0 %}
					<span class="bold">Gelen Mesaj({{ileti.eklenme_tarihi}})</span>
				{% else %}
					<span class="bold">Gönderilen Mesaj({{ileti.eklenme_tarihi}})</span>
				{% endif %}
				<br>
				{{ileti.ileti}}
			</div>
			<hr>
		{% endfor %}
		<div class="row">
			<div class="col-md-12">
				<!-- BEGIN Portlet PORTLET-->
				<div class="portlet light bg-inverse">
				<form class="form-fv" action="{{url('admin/mesaj/ekleAjax')}}" method="post" data-reload="true">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-paper-plane font-green-haze"></i>
							<span class="caption-subject bold font-green-haze uppercase">
							Yanıtla </span>
						</div>
						<div class="actions">
						</div>
					</div>
					<div class="portlet-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
			                    	<textarea name="mesaj"class="form-control" minlength="15" required></textarea>
			                    	<input type="hidden" value="{{mesaj.id}}" name="id">
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
								<button type="submit" class="btn green">Gönder</button>
								<button type="reset" class="btn default">Sıfırla</button>
							</div>
						</div>
					</div>
				</form>
				</div>
				<!-- END Portlet PORTLET-->
			</div>
		</div>
	</div>
</div>
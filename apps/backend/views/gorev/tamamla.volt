<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Görev Tamamla</h4>
</div>
<form class="form-fv form-horizontal" method="post" action="{{url('admin/gorev/tamamlaAjax')}}" data-callback="dashboard.gorevListele()">
<div class="modal-body">
	<div class="form-body">
			<div class="col-md-12">
				"<strong>{{gorev.aciklama}}</strong>" görevi tamamlanmış olarak işaretlenecek emin misiniz?
				<input type="hidden" name="id"  value="{{gorev.id}}">
			</div>
			<div class="clearfix"></div>	
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
				<button type="reset" class="btn red" data-dismiss="modal">İptal</button>
			</div>
	</div>
</div>
</form>
<!-- END FORM-->
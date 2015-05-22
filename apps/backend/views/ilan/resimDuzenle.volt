<div class="portlet light bg-inverse">
	<div class="portlet-title">
		<div class="caption">
			<span class="caption-subject font-red-sunglo bold uppercase">İlan Resimleri </span>
		</div>
		<div class="actions">
			<button class="btn green btn-sm load-modal" data-target="#generalModal" data-href="{{url('admin/ilan/resimEkle/id:'~id)}}" data-form="true"><i class="fa fa-photo"></i> Resim Ekle</button>
		</div>
	</div>
	<div class="portlet-body form">

<table class="table table-striped clearfix">
	<tbody>
		{% for resim in resimler %}
		<tr data-id="{{resim.id}}">
	        <td>
	            <span class="preview"><img src="{{url(resim.resim_link)}}" width="150" height="100"></span>
	        </td>
	        <td class="text-right">
	            <button class="btn blue start load-modal" data-target="#generalModal" data-href="{{url('admin/ilan/kapakDegistir/id:'~resim.id)}}" data-form="true">
	                <i class="fa fa-photo"></i>
	                <span>Kapak Yap</span>
	            </button>
	        
	            <button class="btn red cancel load-modal" data-target="#generalModal" data-href="{{url('admin/ilan/resimSil/id:'~resim.id)}}" data-form="true">
	                <i class="fa fa-ban"></i>
	                <span>Sil</span>
	            </button>
	        </td>
	    </tr>
	    {% endfor %}
    </tbody>
</table>
	</div>
</div>







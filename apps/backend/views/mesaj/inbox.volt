<div class="col-md-12 inbox">
	<div class="inbox-header">
		<h1 class="pull-left">Mesajlar</h1>
	</div>
	<div class="inbox-content">
		<table class="table table-striped table-advance table-hover">
			<thead>
				<tr>
					<th class="pagination-control" colspan="12">
						<span class="pagination-info">
						{{pageObject.current*30-29}}- {{pageObject.current*30}}</span>
						<a class="btn btn-sm blue" href="{{url('admin/mesaj/inbox/sayfa:'~pageObject.before)}}">
						<i class="fa fa-angle-left"></i>
						</a>
						<a class="btn btn-sm blue" href="{{url('admin/mesaj/inbox/sayfa:'~pageObject.next)}}">
						<i class="fa fa-angle-right"></i>
						</a>
					</th>
				</tr>
			</thead>
			<tbody>
			{% for mesaj in pageObject.items %}
			{% set url = url('admin/mesaj/goruntule/id:'~mesaj.id) %}
			<tr class="{% if mesaj.okundu == 0 %}unread{% endif %}"  data-messageid="{{mesaj.id}}" onClick="app.goPage('{{url}}')">
				<td class="view-message hidden-xs">
						 {{mesaj.musteri_adi}}
				</td>
				<td class="view-message ">
						 {{mesaj.baslik}}
				</td>
				<td class="view-message">
					<span>{{mesaj.tip|capitalize}}</span>
				</td>
				<td class="view-message text-right">
					 {{helper.timeAgo(mesaj.tarih)}}
				</td>
			</tr>
			{% endfor %}
			</tbody>
		</table>
	</div>
</div>
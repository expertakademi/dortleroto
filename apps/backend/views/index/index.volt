{{partial('partials/modals/takvim')}}
<!-- /.modal -->
<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
ÖZET <small>rapor & istatistikler</small>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="index.html">Ana Sayfa</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">Özet</a>
        </li>
    </ul>
    <div class="page-toolbar">
        <div id="dashboard-report-range" class="pull-right tooltips btn btn-fit-height grey-salt" data-placement="top" data-original-title="Change dashboard date range">
            <i class="icon-calendar"></i>&nbsp; <span class="thin uppercase visible-lg-inline-block"></span>&nbsp; <i class="fa fa-angle-down"></i>
        </div>
    </div>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN DASHBOARD STATS -->
<div class="row" id="ustMetrikler">

</div>
<!-- END DASHBOARD STATS -->
<div class="clearfix">
</div>
<div class="row">
    <div class="col-md-6 col-sm-6" id="erisimler">

    </div>
    <div class="col-md-6 col-sm-6">
        <!-- BEGIN PORTLET-->
        <div class="portlet solid grey-cararra bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-bullhorn"></i>Satış
                </div>
            </div>
            <div class="portlet-body" id="satislar">

            </div>
        </div>
        <!-- END PORTLET-->
    </div>
</div>
<div class="clearfix">
</div>
<div class="row ">
    <div class="col-md-6 col-sm-6" id="hareketler">

    </div>
    <div class="col-md-6 col-sm-6">
        <div class="portlet box green-haze tasks-widget">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-check"></i>Görevler
                </div>
                <div class="actions">
                	<button class="btn green btn-sm load-modal" data-target="#generalModal" data-href="{{url('admin/gorev/ekle')}}" data-form="true"><i class="fa fa-plus"></i> Ekle </button>
                    <div class="btn-group">
                        <a class="btn btn-default btn-sm dropdown-toggle" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        Filtre <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a onClick="dashboard.gorevListele()">
                                <i class="i"></i> Tümü </a>
                            </li>
                            <li class="divider">
                            </li>
                            <li>
                                <a onClick="dashboard.gorevListele('tamamlanmis')">
                                Tamamlanmış </a>
                            </li>
                            <li>
                                <a onClick="dashboard.gorevListele('gecmis')">
                                Zamanı Geçmiş </a>
                            </li>
                            <li>
                                <a onClick="dashboard.gorevListele('bekleyen')">
                                Bekleyen </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="portlet-body">
                <div class="task-content">
                    <div class="scroller" style="height: 305px;" data-always-visible="1" data-rail-visible1="1">
                        <!-- START TASK LIST -->
                        <ul class="task-list">

                        </ul>
                        <!-- END START TASK LIST -->
                    </div>
                </div>
                <div class="task-footer">
                    <div class="btn-arrow-link pull-right">
                        <a class="load-modal" data-target="#generalModal" data-href="{{url('admin/gorev/dataTable')}}">Tüm Kayıtları Gör</a>
                        <i class="icon-arrow-right"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix">
</div>
<div class="row ">
    <div class="col-md-6 col-sm-6" id="sosyalMedya">

    </div>
    <div class="col-md-6 col-sm-6" id="ucretliReklamlar">

    </div>
</div>
<div class="clearfix">
</div>
<div class="row ">
    <div class="col-md-6 col-sm-6" id="takvim">

    </div>
    <div class="col-md-6 col-sm-6">
        <!-- BEGIN PORTLET-->
        <div class="portlet">
            <div class="portlet-title line">
                <div class="caption">
                    <i class="fa fa-comments"></i>Yazışmalar
                </div>
            </div>
            <div class="portlet-body" id="chats">
                <div class="scroller" style="height: 352px;" data-always-visible="1" data-rail-visible1="1">
                    <ul class="chats">

                    </ul>
                </div>
                <form class="form-fv" method="post" action="{{url('admin/yazisma/ekleAjax')}}" data-callback="dashboard.yazismalar()" data-clear="true">
	                <div class="chat-form">
	                    <div class="input-cont">
	                        <input class="form-control" name="mesaj" type="text" 
	                        placeholder="Mesajınızı buraya yazın..." maxlength="250" required>
	                    </div>
	                    <div class="btn-cont">
	                        <span class="arrow">
	                        </span>
	                        <button type="submit" class="btn blue icn-only" data-text="<i class='fa fa-check icon-white'></i>">
	                        	<i class="fa fa-check icon-white"></i>
	                        </button>
	                    </div>
	                </div>
	                <div class="alert alert-dismissible hide col-md-12 text-center" role="alert">
	                	<input type="hidden" name="{{this.csrf.name}}"
						value="{{this.csrf.token}}"/>
						<button type="button" class="close" data-hide="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
						<div class="alert-message"></div>
					</div>
                </form>
            </div>
        </div>
        <!-- END PORTLET-->
    </div>
</div>

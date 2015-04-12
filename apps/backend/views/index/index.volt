<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
                 Widget settings form goes here
            </div>
            <div class="modal-footer">
                <button type="button" class="btn blue">Save changes</button>
                <button type="button" class="btn default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
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
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat blue-madison">
            <div class="visual">
                <i class="fa fa-comments"></i>
            </div>
            <div class="details">
                <div class="number">
                     30
                </div>
                <div class="desc">
                     Yeni Mesaj
                </div>
            </div>
            <a class="more" href="#">
            Detay <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat red-intense">
            <div class="visual">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="details">
                <div class="number">
                     320.500 TL
                </div>
                <div class="desc">
                     Kapanan Satış
                </div>
            </div>
            <a class="more" href="#">
            Detay <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat green-haze">
            <div class="visual">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <div class="details">
                <div class="number">
                     15
                </div>
                <div class="desc">
                    Görüşme Talebi
                </div>
            </div>
            <a class="more" href="#">
            Detay <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat purple-plum">
            <div class="visual">
                <i class="fa fa-globe"></i>
            </div>
            <div class="details">
                <div class="number">
                     +89%
                </div>
                <div class="desc">
                     İlgi
                </div>
            </div>
            <a class="more" href="#">
            Detay <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
</div>
<!-- END DASHBOARD STATS -->
<div class="clearfix">
</div>
<div class="row">
    <div class="col-md-6 col-sm-6">
        <!-- BEGIN PORTLET-->
        <div class="portlet solid bordered grey-cararra">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-bar-chart-o"></i>Erişim
                </div>
                <div class="actions">
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn grey-steel btn-sm active">
                        <input type="radio" name="options" class="toggle" id="option1">SMS</label>
                        <label class="btn grey-steel btn-sm">
                        <input type="radio" name="options" class="toggle" id="option2">E-Posta</label>
                        <label class="btn grey-steel btn-sm">
                        <input type="radio" name="options" class="toggle" id="option3">Facebook</label>
                        <label class="btn grey-steel btn-sm">
                        <input type="radio" name="options" class="toggle" id="option4">Twitter</label>
                        <label class="btn grey-steel btn-sm">
                        <input type="radio" name="options" class="toggle" id="option5">Web</label>
                        <label class="btn grey-steel btn-sm">
                        <input type="radio" name="options" class="toggle" id="option6">Toplam</label>
                    </div>
                </div>
            </div>
            <div class="portlet-body">
                <div id="site_statistics_loading">
                    <img src="../../assets/admin/layout/img/loading.gif" alt="loading"/>
                </div>
                <div id="site_statistics_content" class="display-none">
                    <div id="site_statistics" class="chart">
                    </div>
                </div>
            </div>
        </div>
        <!-- END PORTLET-->
    </div>
    <div class="col-md-6 col-sm-6">
        <!-- BEGIN PORTLET-->
        <div class="portlet solid grey-cararra bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-bullhorn"></i>Satış
                </div>
            </div>
            <div class="portlet-body">
                <div id="site_activities_loading">
                    <img src="../../assets/admin/layout/img/loading.gif" alt="loading"/>
                </div>
                <div id="site_activities_content" class="display-none">
                    <div id="site_activities" style="height: 228px;">
                    </div>
                </div>
                <div style="margin: 20px 0 10px 30px">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                            <span class="label label-sm label-success">
                            Gelir: </span>
                            <h3>8,400.234 TL</h3>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                            <span class="label label-sm label-info">
                            Yüksek Fiyat: </span>
                            <h3>56,900 TL</h3>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                            <span class="label label-sm label-danger">
                            Düşük Fiyat: </span>
                            <h3>32,134 TL</h3>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                            <span class="label label-sm label-warning">
                            Adet: </span>
                            <h3>230</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PORTLET-->
    </div>
</div>
<div class="clearfix">
</div>
<div class="row ">
    <div class="col-md-6 col-sm-6">
        <div class="portlet box blue-steel">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-bell-o"></i>Son Hareketler
                </div>
                <div class="actions">
                    <div class="btn-group">
                        <a class="btn btn-sm btn-default dropdown-toggle" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        Filtre <i class="fa fa-angle-down"></i>
                        </a>
                        <div class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
                            <label><input type="checkbox"/> Mesajlar</label>
                            <label><input type="checkbox"/> Satışlar</label>
                            <label><input type="checkbox" checked=""/> İlanlar</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="portlet-body">
                <div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible="0">
                    <ul class="feeds">
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-warning">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc">
                                             Sahibinden.com'dan mesaj var. <span class="label label-sm label-info ">
                                            Cevapla <i class="fa fa-share"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date">
                                     şimdi
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="#">
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-success">
                                            <i class="fa fa-bar-chart-o"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc">
                                             #261 numaralı "208 URBAN SOUL 1.4 HDİ 68 HP" araç satıldı.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date">
                                     20 dk
                                </div>
                            </div>
                            </a>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-danger">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc">
                                             Arabam.com'dan yeni mesaj var. <span class="label label-sm label-info ">
                                            Cevapla <i class="fa fa-share"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date">
                                     24 dk
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-info">
                                            <i class="fa fa-shopping-cart"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc">
                                             Yeni görüşme talebi <span class="label label-sm label-success">
                                            Araç: "2014 508 ACCESS 1.6 E-HDI OTOMATİK ORJİNAL" </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date">
                                     30 dk
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-success">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc">
                                             Hurriyetoto.com'dan yeni mesaj var.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date">
                                     24 dk
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-default">
                                            <i class="fa fa-bell-o"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc">
                                             Kapora alındı "2014 Model 206 1.4 HDI" <span class="label label-sm label-default ">
                                            400TL </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date">
                                     2 sa
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="scroller-footer">
                    <div class="btn-arrow-link pull-right">
                        <a href="#">Tüm Kayıtları Gör</a>
                        <i class="icon-arrow-right"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6">
        <div class="portlet box green-haze tasks-widget">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-check"></i>Görevler
                </div>
                <div class="actions">
                    <div class="btn-group">
                        <a class="btn btn-default btn-sm dropdown-toggle" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        Filtre <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="#">
                                <i class="i"></i> Tümü </a>
                            </li>
                            <li class="divider">
                            </li>
                            <li>
                                <a href="#">
                                Tamamlanmış </a>
                            </li>
                            <li>
                                <a href="#">
                                Zamanı Geçmiş </a>
                            </li>
                            <li>
                                <a href="#">
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
                            <li>
                                <div class="task-checkbox">
                                    <input type="hidden" value="1" name="test"/>
                                    <input type="checkbox" class="liChild" value="2" name="test"/>
                                </div>
                                <div class="task-title">
                                    <span class="task-title-sp">
                                    #261 Numaralı araç noter satış işlemleri </span>
                                    <span class="label label-sm label-success">Bireysel</span>
                                    <span class="task-bell">
                                    <i class="fa fa-bell-o"></i>
                                    </span>
                                </div>
                                <div class="task-config">
                                    <div class="task-config-btn btn-group">
                                        <a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                        <i class="fa fa-cog"></i><i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a href="#">
                                                <i class="fa fa-check"></i> Tamamla </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                <i class="fa fa-pencil"></i> Düzenle </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                <i class="fa fa-trash-o"></i> Sil </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="task-checkbox">
                                    <input type="checkbox" class="liChild" value=""/>
                                </div>
                                <div class="task-title">
                                    <span class="task-title-sp">
                                    #721,#316,#234 Numaralı araçlar noter devir işlemleri </span>
                                    <span class="label label-sm label-danger">Kurumsal</span>
                                </div>
                                <div class="task-config">
                                    <div class="task-config-btn btn-group">
                                        <a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                        <i class="fa fa-cog"></i><i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a href="#">
                                                <i class="fa fa-check"></i> Tamamla </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                <i class="fa fa-pencil"></i> Düzenle </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                <i class="fa fa-trash-o"></i> Sil </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="task-checkbox">
                                    <input type="checkbox" class="liChild" value=""/>
                                </div>
                                <div class="task-title">
                                    <span class="task-title-sp">
                                    Yaz'a merhaba kampanyası SMS gönderileri </span>
                                    <span class="label label-sm label-success">Pazarlama</span>
                                    <span class="task-bell">
                                    <i class="fa fa-bell-o"></i>
                                    </span>
                                </div>
                                <div class="task-config">
                                    <div class="task-config-btn btn-group">
                                        <a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                        <i class="fa fa-cog"></i><i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a href="#">
                                                <i class="fa fa-check"></i> Tamamla </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                <i class="fa fa-pencil"></i> Düzenle </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                <i class="fa fa-trash-o"></i> Sil </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="task-checkbox">
                                    <input type="checkbox" class="liChild" value=""/>
                                </div>
                                <div class="task-title">
                                    <span class="task-title-sp">
                                    #21 numaralı araç expertiz işlemleri </span>
                                    <span class="label label-sm label-warning">Teknik</span>
                                </div>
                                <div class="task-config">
                                    <div class="task-config-btn btn-group">
                                        <a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                        <i class="fa fa-cog"></i><i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a href="#">
                                                <i class="fa fa-check"></i> Tamamla </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                <i class="fa fa-pencil"></i> Düzenle </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                <i class="fa fa-trash-o"></i> Sil </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <!-- END START TASK LIST -->
                    </div>
                </div>
                <div class="task-footer">
                    <div class="btn-arrow-link pull-right">
                        <a href="#">Tüm Kayıtları Gör</a>
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
    <div class="col-md-6 col-sm-6">
        <div class="portlet box purple-wisteria">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-calendar"></i>Sosyal Medya
                </div>
                <div class="actions">
                    <a href="javascript:;" class="btn btn-sm btn-default easy-pie-chart-reload">
                    <i class="fa fa-repeat"></i> Yenile </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="easy-pie-chart">
                            <div class="number transactions" data-percent="55">
                                <span>
                                +55 </span>
                                %
                            </div>
                            <a class="title" href="#">
                            Web Ziyareti <i class="icon-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="margin-bottom-10 visible-sm">
                    </div>
                    <div class="col-md-4">
                        <div class="easy-pie-chart">
                            <div class="number visits" data-percent="85">
                                <span>
                                +85 </span>
                                %
                            </div>
                            <a class="title" href="#">
                            Facebook Ziyareti <i class="icon-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="margin-bottom-10 visible-sm">
                    </div>
                    <div class="col-md-4">
                        <div class="easy-pie-chart">
                            <div class="number bounce" data-percent="46">
                                <span>
                                -46 </span>
                                %
                            </div>
                            <a class="title" href="#">
                            Twitter Ziyareti <i class="icon-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6">
        <div class="portlet box red-sunglo">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-calendar"></i>Ücretli Reklamlar
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="sparkline-chart">
                            <div class="number" id="sparkline_bar">
                            </div>
                            <a class="title" href="#">
                            Adwords <i class="icon-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="margin-bottom-10 visible-sm">
                    </div>
                    <div class="col-md-4">
                        <div class="sparkline-chart">
                            <div class="number" id="sparkline_bar2">
                            </div>
                            <a class="title" href="#">
                            Adroll <i class="icon-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="margin-bottom-10 visible-sm">
                    </div>
                    <div class="col-md-4">
                        <div class="sparkline-chart">
                            <div class="number" id="sparkline_line">
                            </div>
                            <a class="title" href="#">
                            Facebook <i class="icon-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix">
</div>
<div class="row ">
    <div class="col-md-6 col-sm-6">
        <!-- BEGIN PORTLET-->
        <div class="portlet box blue-madison calendar">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-calendar"></i>Takvim
                </div>
            </div>
            <div class="portlet-body light-grey">
                <div id="calendar">
                </div>
            </div>
        </div>
        <!-- END PORTLET-->
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
                        <li class="in">
                            <img class="avatar" alt="" src="{{url('frontend/assets/img/logo.png')}}"/>
                            <div class="message">
                                <span class="arrow">
                                </span>
                                <a href="#" class="name">
                                Dörtler Satış </a>
                                <span class="datetime">
                                - 20:09 </span>
                                <span class="body">
                                #321 numaralı araç için 900 TL kapora alındı evraklarını hazırlar mısınız ?</span>
                            </div>
                        </li>
                        <li class="out">
                            <img class="avatar" alt="" src="{{url('frontend/assets/img/logo.png')}}"/>
                            <div class="message">
                                <span class="arrow">
                                </span>
                                <a href="#" class="name">
                                Dörtler İdari </a>
                                <span class="datetime">
                                - 20:11 </span>
                                <span class="body">
                                Evraklar hazırlandı noter için sıra alalım. </span>
                            </div>
                        </li>
                        <li class="in">
                            <img class="avatar" alt="" src="{{url('frontend/assets/img/logo.png')}}"/>
                            <div class="message">
                                <span class="arrow">
                                </span>
                                <a href="#" class="name">
                                Dörtler Muhasebe </a>
                                <span class="datetime">
                                - 20:30 </span>
                                <span class="body">
                                Tam ödeme onayladı satışı yapabilirsiniz. </span>
                            </div>
                        </li>
                        <li class="out">
                            <img class="avatar" alt="" src="{{url('frontend/assets/img/logo.png')}}"/>
                            <div class="message">
                                <span class="arrow">
                                </span>
                                <a href="#" class="name">
                                Dörtler Teknik </a>
                                <span class="datetime">
                                - 20:33 </span>
                                <span class="body">
                                Aracın expertiz raporları yok, kontrole götürülecek mi ? </span>
                            </div>
                        </li>
                        <li class="in">
                            <img class="avatar" alt="" src="{{url('frontend/assets/img/logo.png')}}"/>
                            <div class="message">
                                <span class="arrow">
                                </span>
                                <a href="#" class="name">
                                Dörtler Satış </a>
                                <span class="datetime">
                                - 20:35 </span>
                                <span class="body">
                                Tanıdık müşteri, expertize gerek yok. </span>
                            </div>
                        </li>
                        <li class="out">
                            <img class="avatar" alt="" src="{{url('frontend/assets/img/logo.png')}}"/>
                            <div class="message">
                                <span class="arrow">
                                </span>
                                <a href="#" class="name">
                                Dörtler Teknik </a>
                                <span class="datetime">
                                - 20:40 </span>
                                <span class="body">
                                Tamamdır teşekkürler. </span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="chat-form">
                    <div class="input-cont">
                        <input class="form-control" type="text" placeholder="Mesajınızı buraya yazın..."/>
                    </div>
                    <div class="btn-cont">
                        <span class="arrow">
                        </span>
                        <a href="" class="btn blue icn-only">
                        <i class="fa fa-check icon-white"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PORTLET-->
    </div>
</div>

<div class="modal fade" id="takvimModal" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                 <div class="portlet light bg-inverse">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-equalizer font-red-sunglo"></i>
                            <span class="caption-subject font-red-sunglo bold uppercase">Yeni Görev Ekle</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="#" class="form-horizontal">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Başlık : </label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder="Olay Başlığı">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Açıklama :</label>
                                    <div class="col-md-4">
                                        <div class="input-icon right">
                                            <textarea cols="40" placeholder="Olay Açıklaması" rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Tarih :</label>
                                    <div class="col-md-4">
                                        <div class="input-icon right">
                                            <input id="tarih" type="text" class="date-time" placeholder="14.04.2015 12:30" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-4">
                                        <button type="submit" class="btn green">Kaydet</button>
                                        <button data-dismiss="modal" type="button" class="btn default">İptal</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- END FORM-->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
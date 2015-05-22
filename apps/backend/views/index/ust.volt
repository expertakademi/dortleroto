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
                     {{satisMiktari}} TL
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
                     {{gorusmeSayi}}
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
                	{% if ortalama > 0 %}
                		+{{ortalama}}%
                	{% else %}
                		{{ortalama}}%
                	{% endif %}
                     
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
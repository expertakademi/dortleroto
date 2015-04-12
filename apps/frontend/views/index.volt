<!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dörtler Otomotiv</title>

	{{assets.outputCss()}}        


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    <body>
        <div class="container-fluid ust">
            <div class="container">
                <div class="row" style="margin-top:10px;margin-bottom:10px;">
                    <div class="hidden-xs">
                        <div class="col-sm-3 col-md-3">
                            <a href="{{url('')}}"><img src="{{url('frontend/assets/img/logo.png')}}" class="header-logo img-responsive"></a>
                        </div>
                        <div class="col-sm-5 col-md-5 ">
                        	<form action="{{url('ara/ustAra')}}" method="post">
                            <div class="input-group ara">
                                <input type="text" name="aranan" class="form-control" placeholder="Kelime, ilan no">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                                </span>                       
                            </div>
                            </form>
                        </div>
                        <div class="col-sm-4 col-md-3 navbar-right">
                            <!-- <ul class="giris pull-right nav">
                                <li><a href="#"><i class="fa fa-user"></i>Üye Ol</a></li>
                                <li><a href="#"><i class="fa fa-lock"></i>Üye Girişi</a></li>
                            </ul> -->
                        </div>
                    </div>
                    <div class="mobile-menu">
                        <nav class="navbar navbar-default visible-xs"><!--Menu Mobile-->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menus">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="#">Logo</a>
                                <div class="input-group ara">
                                    <input type="text" class="form-control" placeholder="Kelime, ilan no">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                                    </span>                   
                                </div>
                            </div>

                            <div class="collapse navbar-collapse" id="menus">
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="active"><a href="{{url('')}}">Anasayfa</a></li>
                                    <li><a href="#">Hakkımızda</a></li>
                                    <li><a href="#">Araba</a></li>
                                    <li><a href="#">Ticari</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>    
        <div class="container-fluid menu">
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-default hidden-xs">
                        <div class="col-md-offset-3 collapse navbar-collapse" id="menu">
                            <ul class="nav navbar-nav">
                                <li>
                                    <span class="fa-stack padding-top-15">
                                        <i class="fa fa-circle fa-stack-2x grey"></i>
                                        <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                    </span>
                                </li>
                                <li>
                                    <span class="fa-stack padding-top-15">
                                        <i class="fa fa-circle fa-stack-2x grey"></i>
                                        <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                    </span>
                                </li>
                                <li>
                                    <span class="fa-stack padding-top-15">
                                        <i class="fa fa-circle fa-stack-2x grey"></i>
                                        <i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
                                    </span>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="active"><a href="{{url('')}}">Anasayfa</a></li>
                                <li><a href="#">Hakkımızda</a></li>
                                <li><a href="#">Araba</a></li>
                                <li><a href="#">Ticari</a></li>
                            </ul>


                        </div>
                    </nav>
                </div>
            </div>
            <div class="col-xs-12 visible-xs no-padding"><!--mobil carousel Açıklama-->
                <ul class="ucgen">
                    <li><a href="#" class="kirmizi">Binlerce ilan, binlerce avantaj. Avantajları..</a></li>
                </ul>
            </div>
        </div>
        <div class="container mt-15">
            <div class="row">
				{{content()}}
            </div>
        </div>
        <div class="margin-top-2 margintop-xs-4"></div>
        <div class="container-fluid markalar hidden-xs">
            <div class="container">
                <div class="margin-top-3"></div>
                <p><span style="font-size:18px;">MARKALAR &nbsp;&nbsp;|&nbsp;&nbsp; </span><span><a href="#" class="kirmizi">Tüm Markalar</a></span></p>
                <div class="margin-top-2"></div>

                <div class="col-sm-1 col-md-1 padding-left-0 marka-liste">  
                    <ul class="nav nav-bar ">
                        <li class="marka-baslik">Audi</li>
                        <li><a href="#">Audi A3</a></li>
                        <li><a href="#">Audi A4</a></li>
                        <li><a href="#">Audi A5</a></li>
                    </ul>
                </div>
                    
                <div class="col-sm-1 col-md-1 padding-left-0 marka-liste">  
                    <ul class="nav nav-bar">
                        <li class="marka-baslik">BMW</li>
                        <li><a href="#">BMW 3 Serisi</a></li>
                        <li><a href="#">BMW X5</a></li>
                        <li><a href="#">BMW X6</a></li>
                    </ul>
                </div>
                    
                <div class="col-sm-1 col-md-1 padding-left-0 marka-liste">  
                    <ul class="nav nav-bar">
                        <li class="marka-baslik">Chevrolet</li>
                        <li><a href="#">Chevrolet Aveo</a></li>
                        <li><a href="#">Chevrolet Captiva</a></li>
                        <li><a href="#">Chevrolet Cruze</a></li>
                    </ul>
                </div>
                    
                <div class="col-sm-1 col-md-1 padding-left-0 marka-liste">  
                    <ul class="nav nav-bar">
                        <li class="marka-baslik">Citroen</li>
                        <li><a href="#">Citroen C3</a></li>
                        <li><a href="#">Citroen C4</a></li>
                        <li><a href="#">Citroen C5</a></li>
                    </ul>
                </div>

                 <div class="col-sm-1 col-md-1 padding-left-0 marka-liste">  
                    <ul class="nav nav-bar">
                        <li class="marka-baslik">Fiat</li>
                        <li><a href="#">Fiat Doblo</a></li>
                        <li><a href="#">Fiat Linea</a></li>
                        <li><a href="#">Fiat Punto</a></li>
                    </ul>
                </div>    
                    
                <div class="col-sm-1 col-md-1 padding-left-0 marka-liste">  
                    <ul class="nav nav-bar">
                        <li class="marka-baslik">Ford</li>
                        <li>Ford Fiesta</a></li>
                        <li>Ford Focus</a></li>
                        <li>Ford Transit</a></li>
                    </ul>
                </div>
                    
                <div class="col-sm-1 col-md-1 padding-left-0 marka-liste">  
                    <ul class="nav nav-bar">
                        <li class="marka-baslik">Honda</li>
                        <li><a href="#">Honda Civic</a></li>
                        <li><a href="#">Honda CR-V</a></li>
                        <li><a href="#">Honda Jazz</a></li>
                    </ul>
                </div>
                    
                <div class="col-sm-1 col-md-1 padding-left-0 marka-liste">  
                    <ul class="nav nav-bar">
                        <li class="marka-baslik">Hyundai</li>
                        <li><a href="#">Hyundai Accentc</a></li>
                        <li><a href="#">Hyundai Getz</a></li>
                        <li><a href="#">Hyundai i30</a></li>
                    </ul>
                </div>

                <div class="clearfix"></div>
                <div class="margin-top-3"></div>

                 <div class="col-sm-1  col-md-1 padding-left-0 marka-liste">  
                    <ul class="nav nav-bar">
                        <li class="marka-baslik">Mercedes</li>
                        <li><a href="#">Mercedes C Serisi</a></li>
                        <li><a href="#">Mercedes E Serisi</a></li>
                        <li><a href="#">Mercedes Vito</a></li>
                    </ul>
                </div> 

                <div class="col-sm-1  col-md-1 padding-left-0 marka-liste">  
                    <ul class="nav nav-bar">
                        <li class="marka-baslik">Peugeot</li>
                        <li><a href="#">Peugeot 206</a></li>
                        <li><a href="#">Peugeot 207</a></li>
                        <li><a href="#">Peugeot Partner</a></li>
                    </ul>
                </div>

                <div class="col-sm-1  col-md-1 padding-left-0 marka-liste">  
                    <ul class="nav nav-bar">
                        <li class="marka-baslik">Renault</li>
                        <li><a href="#">Renault Clio</a></li>
                        <li><a href="#">Renault Fluence</a></li>
                        <li><a href="#">Renault Megane</a></li>
                    </ul>
                </div>

                <div class="col-sm-1  col-md-1 padding-left-0 marka-liste">  
                    <ul class="nav nav-bar">
                        <li class="marka-baslik">Toyota</li>
                        <li><a href="#">Toyota Auris</a></li>
                        <li><a href="#">Toyota Corolla</a></li>
                        <li><a href="#">Toyota Yaris</a></li>
                    </ul>
                </div> 

                <div class="col-sm-1  col-md-1 padding-left-0 marka-liste">  
                    <ul class="nav nav-bar">
                        <li class="marka-baslik">Volkswagen</li>
                        <li><a href="#">Volkswagen Golf</a></li>
                        <li><a href="#">Volkswagen Passat</a></li>
                        <li><a href="#">Volkswagen Polo</a></li>
                    </ul>
                </div>

                <div class="col-sm-1 col-md-1 padding-left-0 marka-liste">  
                    <ul class="nav nav-bar">
                        <li class="marka-baslik">Opel</li>
                        <li><a href="#">Opel Astra</a></li>
                        <li><a href="#">Opel Corsa</a></li>
                        <li><a href="#">Opel Vectra</a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
                <div class="margin-top-3"></div>
            </div>
        </div>
        <footer class="footer hidden-xs">
            <div class="container">
                <div class="margin-top-2"></div>
                <div class="col-sm-3 col-md-3 col-lg-3 padding-left-0 marka-liste">  
                    <ul class="nav nav-bar">
                        <li><h4 class="margin-top-0 beyaz">Dörtler Otomotiv</h4></li>
                        <li><a href="#">Hakkımızda</a></li>
                        <li><a href="#">Yasal uyarı</a></li>
                        <li><a href="#">Üyelik sözleşmesi</a></li>
                        <li><a href="#">İnsan Kaynakları</a></li>
                        <li><a href="#">İletişim</a></li>
                        <li><a href="#">Yardım</a></li>
                    </ul>
                </div>

                <div class="col-sm-3 col-md-4 col-lg-4 padding-left-0">
                    <h4 class="margin-top-0 beyaz">Bizi Takip Edin!</h4>
                    <div class="social">

                        <div class="iconset mediaa facebook"></div>
                        <div class="iconset mediaa twitter"></div>
                        <div class="iconset mediaa google"></div>
                        <div class="iconset mediaa linkedin"></div>
                    </div>
                </div>

                <div class="col-md-5 col-lg-5 padding-right-0">  
                    <div class="iconset telefon"></div>
                    <h2 class="beyaz ">Müşteri Hizmetleri</h2>
                    <h1 class="beyaz margin-top-0">0212 250 25 02</h1>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12">
                    <p class="text-center no-margin">
                        <small class="beyaz text-center">© Copyright 2015 Dörtler Otomotiv</small>
                        <span class="pull-right">
                            <a href="http://expertakademi.com/">
                            <img src="{{url('frontend/assets/img/expertakademi.png')}}" class="img-responsive"></a>
                        </span>
                    </p>
                </div>
            </div>
        </footer>

        <div class="mobil-footer visible-xs">
            <nav class="navbar navbar-default navbar-fixed-bottom">
                <div class="container">
                    <ul class="nav navbar-nav">
                        <li class="col-xs-6 no-padding border-kirmizi"><a href="#"><i class="fa fa-filter"></i> Filtrele</a></li>
                        <li class="col-xs-6 no-padding"><a href="#"><i class="fa fa-sort "></i> Sırala</a></li>
                    </ul>
                </div>
            </nav>
        </div>
        

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        {{assets.outputJs()}}
        <script>
			app.setBase("{{url('')}}");
        </script>
    </body>
</html>


 

 
 

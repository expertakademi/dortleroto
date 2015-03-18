<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Giriş Yap</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
{{stylesheet_link('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all', false)}}
{{stylesheet_link('backend/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}
{{stylesheet_link('backend/assets/global/plugins/bootstrap/css/bootstrap.min.css')}}
{{stylesheet_link('backend/assets/pages/css/login.css')}}
{{stylesheet_link('backend/assets/global/css/components.css')}}
{{stylesheet_link('backend/assets/global/css/plugins.css')}}
{{stylesheet_link('backend/assets/layout/css/layout.css')}}
{{stylesheet_link('backend/assets/layout/css/themes/darkblue.css')}}
{{stylesheet_link('backend/assets/layout/css/themes/custom.css')}}
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<form class="login-form form-fv" action="{{url('admin/giris/girisYap')}}" data-reload="true" method="post">
		<h3 class="form-title">Giriş Yap</h3>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Kullanıcı Adı</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" 
			placeholder="Kullanıcı adı" name="kullaniciAdi" required>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Şifre</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" 
			placeholder="Şifre" name="sifre" required/>
			<input type="hidden" name="{{this.csrf.name}}"
        		value="{{this.csrf.token}}"/>
		</div>
		<div class="form-actions">
			<div class="alert alert-dismissible hide" role="alert">
				<button type="button" class="close" data-hide="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<div class="alert-message"></div>
			</div>
			<button type="submit" class="btn btn-success uppercase">Gönder</button>
			<label class="rememberme check">
			<input type="checkbox" name="remember" value="1"/>Beni Hatırla </label>
		</div>
	</form>
	<!-- END LOGIN FORM -->

</div>
<div class="copyright">
	 {{date('Y')}} © <a href="{{url()}}">{{this.domain}}</a>
</div>
<!-- END LOGIN -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
{{javascript_include('backend/assets/global/plugins/respond.min.js')}}
{{javascript_include('backend/assets/global/plugins/excanvas.min.js')}} 
<![endif]-->
{{javascript_include('backend/assets/global/plugins/jquery.min.js')}}
{{javascript_include('backend/assets/global/plugins/jquery-migrate.min.js')}}
{{javascript_include('backend/assets/global/plugins/bootstrap/js/bootstrap.min.js')}}
{{javascript_include('backend/assets/global/plugins/jquery-form/jquery.form.min.js')}}
{{javascript_include('backend/assets/global/plugins/formvalidation/dist/js/formValidation.min.js')}}
{{javascript_include('backend/assets/global/plugins/formvalidation/dist/js/framework/bootstrap.min.js')}}
{{javascript_include('backend/assets/global/plugins/formvalidation/dist/js/language/tr_TR.js')}}
{{javascript_include('backend/assets/js/app.js')}}
{{javascript_include('backend/assets/js/form.js')}}
<script>
app.setBase("{{url()}}");
</script>


<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
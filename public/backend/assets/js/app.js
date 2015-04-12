var app = function(){
	var baseUri="";
	return{
		getBase: function(){
			return baseUri;
		},
		setBase: function($uri){
			baseUri = $uri;
		},
		pageReload :  function (){
			window.location.href=window.location.href;
		},
		alertHide : function(){
			jQuery("body").on("click","[data-hide='alert']",function(){
				jQuery(this).parent(".alert").addClass("hide");
			});
		},
		stickyFooter :  function (){
			var footerHeight =  jQuery('footer').height();
			footerHeight +=35; 
			jQuery("body").css("margin-bottom",footerHeight)
		},
		init : function(){
			app.alertHide();
			app.stickyFooter();
		}
	}
}();
app.init();
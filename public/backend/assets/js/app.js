var app = function(){
	var baseUri="";
	return{
		getBase: function(){
			return baseUri;
		},
		setBase: function($uri){
			baseUri = $uri;
		},
		goPage :  function(url){
			window.location.href = url;
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
		loadGetContent : function (target,link){
			jQuery.get( '/'+ link, function( data ) {
					jQuery(target).html(data);
			});
		},
		deleteDom : function (target){
			jQuery(target).remove();
		},
		capitalizeFirstLetter : function(string) {
		    return string.charAt(0).toUpperCase() + string.slice(1);
		},
		sleep : function(milliseconds) {
		  var start = new Date().getTime();
		  for (var i = 0; i < 1e7; i++) {
		    if ((new Date().getTime() - start) > milliseconds){
		      break;
		    }
		  }
		},
		arrayToStringList : function (arr) {
			   return "'" + arr.join("','") + "'";
		},
		init : function(){
			app.alertHide();
			app.stickyFooter();
		}
	}
}();
app.init();
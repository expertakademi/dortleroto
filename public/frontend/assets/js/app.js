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
		goPage : function(url){
			window.location.href = url;
		},
		init : function(){
		}
	}
}();
app.init();
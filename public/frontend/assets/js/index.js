var index = function () {
	var markaSelect = "[name='marka']";
	var seriSelect = "[name='seri']";
	return {
		carousel : function(){
			jQuery('.carousel').carousel();
		},
		sliderRange : function(){
           jQuery( "#slider-range" ).slider({
               range: true,
               min: 0,
               max: 500000,
               values: [ 0, 150000 ],
               slide: function( event, ui ) {
                   jQuery( "#amount" ).val(ui.values[ 0 ] + " TL" + " - " + ui.values[ 1 ] + " TL" );
               }
           });
           jQuery( "#amount" ).val( jQuery( "#slider-range" ).slider( "values", 0 ) + " TL" +
           " - " + jQuery( "#slider-range" ).slider( "values", 1 ) + " TL" );
		},
		markaSec: function(){
			jQuery(markaSelect).change(function(){
				var secilen = jQuery(markaSelect).find("option:selected").val();
				if(secilen== ""){
					index.selectSifirla(seriSelect,'Tüm Modeller');
				}else{
					index.seriGetir(secilen);
				}
			});
		},
		seriGetir : function (markaId){
			index.selectSifirla(seriSelect,'Tüm Modeller');
			$.getJSON( app.getBase()+'seri/markayaGoreGetir/markaId:'+markaId, function( data ) {
				$.each(data, function(key,value) {   
				     jQuery(seriSelect)
			         .append($("<option></option>")
			         .attr("value",value.id)
			         .text(value.ad));	
				});
			});
		},
		selectSifirla : function (select,text){
			jQuery(select)
		    .find('option')
		    .remove()
		    .end()
		    .append('<option value="">'+text+'</option>')
		    .val('');
		},
		init: function(){
			index.carousel();
			index.sliderRange();
			index.markaSec();
		}
	}
}();
index.init();
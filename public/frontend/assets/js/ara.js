var ara = function (){
	var d = new Date();
	var yil = d.getFullYear();
	return {
		sliderFiyat : function (start,end){
           jQuery( "#slider-range-fiyat" ).slider({
               range: true,
               min: 0,
               max: 500000,
               step: 1000,
               values: [ start, end ],
               slide: function( event, ui ) {
                   jQuery( "#amount" ).val(ui.values[ 0 ] + " TL" + " - " + ui.values[ 1 ] + " TL" );
               }
           });
           jQuery( "#amount" ).val( jQuery( "#slider-range-fiyat" ).slider( "values", 0 ) + " TL" +
           " - " + jQuery( "#slider-range-fiyat" ).slider( "values", 1 ) + " TL" );
		},
		sliderYil : function (start,end){
	           jQuery( "#slider-range-yil" ).slider({
	               range: true,
	               min: yil-50,
	               max: yil,
	               values: [ start, end ],
	               slide: function( event, ui ) {
	                   jQuery( "#yil" ).val(ui.values[ 0 ] + " - " + ui.values[ 1 ] );
	               }
	           });
	           jQuery( "#yil" ).val( jQuery( "#slider-range-yil" ).slider( "values", 0 ) +
	           " - " + jQuery( "#slider-range-yil" ).slider( "values", 1 ) );
		},
		sliderKm : function (start,end){
	           jQuery( "#slider-range-km" ).slider({
	               range: true,
	               min: 0,
	               max: 1000000,
	               step:1000,
	               values: [ start, end ],
	               slide: function( event, ui ) {
	                   jQuery( "#km" ).val(ui.values[ 0 ] + " - " + ui.values[ 1 ] );
	               }
	           });
	           jQuery( "#km" ).val( jQuery( "#slider-range-km" ).slider( "values", 0 ) +
	           " - " + jQuery( "#slider-range-km" ).slider( "values", 1 ) );
		},
		listele : function (params){
			if(params.minFiyat && params.minFiyat){
				ara.sliderFiyat(params.minFiyat,params.maxFiyat)
			}
			if(params.minYil && params.maxYil){
				ara.sliderYil(params.minYil,params.maxYil)
			}
			if(params.minKm && params.maxKm){
				ara.sliderKm(params.minKm,params.maxKm)
			}
			if(params.yakit){
				ara.multiCheck("#yakit",params.yakit)
			}
			if(params.vites){
				ara.multiCheck("#vites",params.vites)
			}
			if(params.kasa){
				ara.multiCheck("#kasa",params.kasa)
			}
			if(params.hacim){
				ara.multiSelect("#hacim",params.hacim)
			}
			if(params.guc){
				ara.multiSelect("#guc",params.guc)
			}
			if(params.renk){
				ara.multiSelect("#renk",params.renk)
			}
			if(params.cekis){
				ara.multiCheck("#cekis",params.cekis)
			}
			if(params.garanti){
				ara.selectbox("#garanti",params.garanti);
			}
			if(params.tarih){
				ara.selectbox("#tarih",params.tarih);
			}
		},
		multiCheck :  function(container,values){
			values = values.split(',');
			$(container).find('[value=' + values.join('], [value=') + ']').prop("checked", true);

		},
		multiSelect :  function (select,values){
			values = values.split(',');
			$(select).val(values);
		},
		selectbox  : function(select,value){
			jQuery(select).val(value);
		},
		init : function () {
			ara.sliderFiyat(0,150000);
			ara.sliderYil(yil-50,yil); 
			ara.sliderKm(0,150000)
		}
	}
}();

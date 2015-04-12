var ilanEkle = function(){
	var markaSelect = "[name='marka']";
	var seriSelect = "[name='seri']";
	var modelSelect = "[name='model']";
	return{
		markaSec: function(){
			jQuery('body').on("change",markaSelect,function(){
				var secilen = jQuery(this).find("option:selected").val();
				if(secilen== ""){
					ilanEkle.selectSifirla(seriSelect,'Marka Seçiniz');
				}else{
					ilanEkle.seriGetir(secilen);
				}
			});
		},
		seriGetir : function (markaId){
			ilanEkle.selectSifirla(seriSelect,'Seçiniz');
			$.getJSON( app.getBase()+'admin/seri/markayaGoreGetir/markaId:'+markaId, function( data ) {
				$.each(data, function(key,value) {   
				     jQuery(seriSelect)
			         .append($("<option></option>")
			         .attr("value",value.id)
			         .text(value.ad));	
				});
			});
		},
		seriSec : function (){
			jQuery(seriSelect).change(function(){
				var secilen = jQuery(seriSelect).find("option:selected").val();
				if(secilen== ""){
					ilanEkle.selectSifirla(modelSelect,'Seri Seçiniz');
				}else{
					ilanEkle.modelGetir(secilen);
				}
			});
		},
		modelGetir : function (seriId){
			ilanEkle.selectSifirla(modelSelect,'Seçiniz');
			$.getJSON( app.getBase()+'admin/model/seriyeGoreGetir/seriId:'+seriId, function( data ) {
				$.each(data, function(key,value) {   
				     jQuery(modelSelect)
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
		kapakSec : function (){
			jQuery("body").on("click",".file-preview-image",function(){
				jQuery(".file-preview-frame").css("border","none");
				jQuery(this).parent(".file-preview-frame")
				.css({"border":"1px solid red"});
				jQuery("[name='kapak']").val(jQuery(this).attr("title"));
			})
		},
		init :  function(){
			ilanEkle.markaSec();
			ilanEkle.seriSec();
			ilanEkle.kapakSec();
		}
	}
}();
ilanEkle.init();
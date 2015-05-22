var modal = function () {
	return {
		init: function (){
			modal.clickElement();
			modal.clearModalCache();
		},
		clickElement : function (){
			jQuery('body').on('click','.load-modal',function(e){
				e.preventDefault();
				var data = jQuery(this).data();
				modal.loadModal(data);
				return false;
			})
		},
		loadModal :function (data){
			jQuery(data.target).find(".modal-content").load(data.href,function(){
				if(data.form){
					form.submitForm();
				}
				lastHref= data.href;
				pickers.handleDatetimePicker();
			});
			jQuery(data.target).modal();
			
			return false;
		},
		clearModalCache : function (){
		    jQuery('body').on('hidden.bs.modal', '.modal', function (event) {
		        jQuery(this).removeData('bs.modal');
		    });
		}
	}
}();
modal.init();

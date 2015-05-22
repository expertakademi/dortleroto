var inbox = function (){
	return {
		checkAll : function(){
	        // handle group checkbox:
	        jQuery('body').on('change', '.mail-group-checkbox', function () {
	            var set = jQuery('.mail-checkbox');
	            var checked = jQuery(this).is(":checked");
	            jQuery(set).each(function () {
	                $(this).attr("checked", checked);
	            });
	            jQuery.uniform.update(set);
	        });
		},
		init: function(){
			inbox.checkAll();
		}
	}
}();
inbox.init();
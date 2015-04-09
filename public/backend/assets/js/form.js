var form = function (){
	var fv = '';
	return{
		submitForm : function(){
		  jQuery('.form-fv').formValidation({
		        // Kullandığımız framework
		        framework: 'bootstrap',
		        excluded: [':disabled'],
		        // iconlar
		        icon: {
		            valid: 'glyphicon glyphicon-ok',
		            invalid: 'glyphicon glyphicon-remove',
		            validating: 'glyphicon glyphicon-refresh'
		        },
		        locale: 'tr_TR'
		    })
		    //Field validate edilemediyse
	        .on('err.validator.fv', function(e, data) {	
	            data.element
	                .data('fv.messages')
	                // Tüm mesajları güzle
	                .find('.help-block[data-fv-for="' + data.field + '"]').hide()
	                // Sadece geçerli mesajı göster
	                .filter('[data-fv-validator="' + data.validator + '"]').show();
	        })
		    //Form validate edildiyse
		    .on('success.form.fv', function(e) {
		        e.preventDefault();
				if(jQuery(e.target).data('summernote')){
					form.summernoteCode();
				}
		        jQuery(e.target).ajaxSubmit({
		        	dataType	: 'json',
		        	beforeSubmit : form.showRequest,
		        	success : form.showResponse 
		        });
		    });
		  fv = jQuery('.form-fv').data('formValidation');
		},
		showRequest: function(formData, jqForm, options){
			var formElement= jqForm[0];
			form.btnLoading(formElement);
			return true;
			
		},
		showResponse : function(responseText, statusText, xhr, $form){
			//Debug Canlıda kaldır
			console.log(xhr);
			//Debug
			form.showMessage($form,responseText);
			if(responseText.status=="success"){
				form.btnSuccess($form);
				form.checkReload($form);
				form.checkDtReload($form);
				form.checkDtRemove($form);
			}else{
				form.btnDefault($form);
			}
		},
		btnLoading: function(formElement){
			var image = "<img src='"+app.getBase()+"frontend/assets/img/loading16.gif' alt='loading'>";
			jQuery(formElement).find('button[type="submit"]').html(image);
		},
		btnSuccess : function ($form){
			$form.find('button[type="submit"]').html('Gönderildi').attr("disabled","disabled");
		},
		btnDefault :  function ($form){
			$form.find('button[type="submit"]').html('Gönder').removeClass("disabled").removeAttr("disabled");
		},
		showMessage : function($form,responseText){
			var $alert = $form.find('.alert')
			$alert.removeClass('alert-warning alert-success alert-danger hide');
			if(responseText.status == 'success'){
				$alert.addClass('alert-success');
				$alert.find('.alert-message').html(responseText.message);
			}else{
				$alert.addClass('alert-danger');
				$alert.find('.alert-message').html(responseText.message);
			}
		},
		checkReload : function ($form){
			var data = $form.data();
			if(data.reload){
				app.pageReload();
			}
		},
		checkDtReload : function ($form){
			var data = $form.data();
			if(data.dtReload){
				dataTables.reloadDataTable(data.dtId);
			}
		},
		checkDtRemove :  function ($form){
			var data = $form.data();
			if(data.dtRemove){
				dataTables.removeRow(data.dtId,data.dtRowId);
			}
		},
		summernote : function(){
			jQuery('.summernote').summernote({
				lang: 'tr-TR',
				height: 400,
				minHeight:300,
				maxHeight: 1024,
				toolbar : [
				           ['style', ['style','undo', 'redo']],
				           ['two', ['bold', 'italic', 'underline', 'strikethrough', 'clear']],
				           ['fontname', ['fontname']],
				           ['fontsize', ['fontsize']],
				           ['color', ['color']],
				           ['para', ['ul', 'ol', 'paragraph']],
				           ['height', ['height']],
				           ['insert', ['link', 'picture', 'video', 'table', 'hr']],
				           ['misc', ['fullscreen', 'help', 'codeview']]
				]
			});
		},
		summernoteCode : function (){
			jQuery( ".summernote" ).each(function( index ) {
				  jQuery(this).val(jQuery(this).code());
			});
		},
		fvReset : function (){
			fv.resetForm(false);
		},
		init :  function(){
			form.submitForm();
		}
	}
}();
form.init();

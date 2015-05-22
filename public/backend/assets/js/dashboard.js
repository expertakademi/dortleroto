var dashboard = function (){
	var minDate = '';
	var maxDate = '';
	return {
		getMinDate : function (){
			return minDate;
		},
		setMinDate : function (date){
			minDate = date;
		},
		getMaxDate : function (){
			return maxDate;
		},
		setMaxDate : function (date){
			maxDate = date;
		},
		gorevListele : function(type){
			if(minDate == '' && maxDate == ''){
				if(type!= null){
					app.loadGetContent(".task-list","admin/gorev/listele/type:"+type);
				
				}else{
					app.loadGetContent(".task-list","admin/gorev/listele");
				}
			}else{
				if(type!= null){
					app.loadGetContent(".task-list","admin/gorev/listele/type:"+type+"/minDate:"+minDate+"/maxDate:"+maxDate);
				
				}else{
					app.loadGetContent(".task-list","admin/gorev/listele/minDate:"+minDate+"/maxDate:"+maxDate);
				}
				
			}
		},
		satislar : function (){
			if(minDate == '' && maxDate == ''){
				app.loadGetContent("#satislar","admin/chart/satis");
			}else{
				app.loadGetContent("#satislar","admin/chart/satis/minDate:"+minDate+"/maxDate:"+maxDate);
			}
		},
		erisimler : function (type){
			if(minDate == '' && maxDate == ''){
				if(type!= null){
					app.loadGetContent("#erisimler","admin/chart/erisim/type:"+type);
				}else{
					app.loadGetContent("#erisimler","admin/chart/erisim");
				}
				
			}else{
				if(type!= null){
					app.loadGetContent("#erisimler","admin/chart/erisim/minDate:"+minDate+"/maxDate:"+maxDate+"/type:"+type);
				}else{
					app.loadGetContent("#erisimler","admin/chart/erisim/minDate:"+minDate+"/maxDate:"+maxDate);
				}
			}
			
		},
		sosyalMedya :  function (){
			if(minDate == '' && maxDate == ''){
				app.loadGetContent("#sosyalMedya","admin/chart/sosyal");
			}else{
				app.loadGetContent("#sosyalMedya","admin/chart/sosyal/minDate:"+minDate+"/maxDate:"+maxDate);
			}
		},
		ucretliReklamlar : function(){
			if(minDate == '' && maxDate == ''){
				app.loadGetContent("#ucretliReklamlar","admin/chart/reklam");
			}else{
				app.loadGetContent("#ucretliReklamlar","admin/chart/reklam/minDate:"+minDate+"/maxDate:"+maxDate);
			}
		},
		yazismalar : function (){
			if(minDate == '' && maxDate == ''){
				app.loadGetContent(".chats","admin/yazisma/listele");
			}else{
				app.loadGetContent(".chats","admin/yazisma/listele/minDate:"+minDate+"/maxDate:"+maxDate);
			}

		},
		ustMetrikler :  function (){
			if(minDate == '' && maxDate == ''){
				app.loadGetContent("#ustMetrikler","admin/index/ust");
			}else{
				app.loadGetContent("#ustMetrikler","admin/index/ust/minDate:"+minDate+"/maxDate:"+maxDate);
			}
		},
		hareketler : function(type){
			if(type != null){
				type= app.arrayToStringList(type);
				if(minDate == '' && maxDate == ''){
					app.loadGetContent("#hareketler","admin/index/hareketler/type:"+type);
				}else{
					app.loadGetContent("#hareketler","admin/index/hareketler/type:"+type+"/minDate:"+minDate+"/maxDate:"+maxDate);
				}
			}else{
				if(minDate == '' && maxDate == ''){
					app.loadGetContent("#hareketler","admin/index/hareketler");
				}else{
					app.loadGetContent("#hareketler","admin/index/hareketler/minDate:"+minDate+"/maxDate:"+maxDate);
				}
			}
			

		},
		applyDateRange : function (){
			$('#dashboard-report-range').on('apply.daterangepicker', function(ev, picker) {
			  minDate = picker.startDate.format('YYYY-MM-DD');
			  maxDate = picker.endDate.format('YYYY-MM-DD') ;
			  dashboard.init(true);
			});
			
		},
		takvim : function(){
			app.loadGetContent("#takvim","admin/takvim/index");
		},
	    initCalendar: function (data) {
            if (!jQuery().fullCalendar) {
                return;
            }

            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();

            var h = {};

            if ($('#calendar').width() <= 400) {
                $('#calendar').addClass("mobile");
                h = {
                    left: 'title, prev, next',
                    center: '',
                    right: 'today,month,agendaWeek,agendaDay'
                };
            } else {
                $('#calendar').removeClass("mobile");
                if (Metronic.isRTL()) {
                    h = {
                        right: 'title',
                        center: '',
                        left: 'prev,next,today,month,agendaWeek,agendaDay'
                    };
                } else {
                    h = {
                        left: 'title',
                        center: '',
                        right: 'prev,next,today,month,agendaWeek,agendaDay'
                    };
                }
            }

           

            $('#calendar').fullCalendar('destroy'); // destroy the calendar
            $('#calendar').fullCalendar({ //re-initialize the calendar
                disableDragging : false,
                header: h,
                editable: true,
                dayClick : function(date,jsEvent,view){
                	var date = date.format('DD-MM-YYYY');
                    var data = {
                    		target:'#generalModal',
                    		href:app.getBase() + 'admin/takvim/ekle/tarih:'+date,
                    		form: true
                    }
                    modal.loadModal(data);
                },
                events: data,
                eventDrop: function(event, delta, revertFunc) {
                	console.log(event);
                    if (!confirm("Eminmisiniz?")) {
                        //Geri Al
                    	revertFunc();
                    }else{
                    	$.post( app.getBase()+"admin/takvim/tasi",{id:event.id, start:event.start.format(), end:event.end.format()}, function( data ) {
                    		  	if(data!="success"){
                    		  		alert(data);
                    		  	}
                    	});
                    }

                }
            });
        },
		init : function(yenileme){
			if(yenileme != true){
				pickers.handleDashboardDateRange();
			}
			dashboard.applyDateRange();
			dashboard.ustMetrikler();
			dashboard.erisimler();
			dashboard.satislar();
			dashboard.hareketler();
			dashboard.gorevListele();
			dashboard.sosyalMedya();
			dashboard.ucretliReklamlar();
			dashboard.yazismalar();
			dashboard.takvim();
			
		}
	}
}();
dashboard.init();
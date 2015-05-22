var pickers = function (){
	return {
		handleDatetimePicker :  function (){
	        if (!jQuery().datetimepicker) {
	            return;
	        }

	        $(".form_datetime").datetimepicker({
	            autoclose: true,
	            isRTL: Metronic.isRTL(),
	            format: "dd-mm-yyyy - hh:ii",
	            pickerPosition: (Metronic.isRTL() ? "bottom-right" : "bottom-left")
	        });
		},
		handleDashboardDateRange: function () {

            if (!jQuery().daterangepicker) {
                return;
            }
            var maxDate = new Date();
            

            $('#dashboard-report-range').daterangepicker({
                    opens: (Metronic.isRTL() ? 'right' : 'left'),
                    startDate: moment(),
                    endDate: moment(),
                    minDate: moment().subtract('year', 3),
                    maxDate:  moment(),
                    dateLimit: {
                        days: 365
                    },
                    showDropdowns: false,
                    showWeekNumbers: true,
                    timePicker: false,
                    timePickerIncrement: 1,
                    timePicker12Hour: true,
                    ranges: {
                        'Bugün': [moment(), moment()],
                        'Dün': [moment().subtract('days', 1), moment().subtract('days', 1)],
                        'Son 7 Gün': [moment().subtract('days', 6), moment()],
                        'Son 30 Gün': [moment().subtract('days', 29), moment()],
                        'Bu Ay': [moment().startOf('month'), moment().endOf('month')],
                        'Geçen Ay': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                    },
                    buttonClasses: ['btn btn-sm'],
                    applyClass: ' blue',
                    cancelClass: 'default',
                    format: 'MM/DD/YYYY',
                    separator: ' to ',
                    locale: {
                        applyLabel: 'Seç',
                        fromLabel: 'Başlangıç',
                        toLabel: 'Bitiş',
                        customRangeLabel: 'Aralık Seç',
                        daysOfWeek: ['Paz', 'Pts', 'Sal', 'Çar', 'Per', 'Cum', 'Cts'],
                        monthNames: ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'],
                        firstDay: 1
                    }
                },
                function (start, end) {
                    $('#dashboard-report-range span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                }
            );


            $('#dashboard-report-range span').html(moment().format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
            $('#dashboard-report-range').show();
        } 
	}
}();
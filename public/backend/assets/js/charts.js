var charts = function (){
	return {
		showChartTooltip :  function (x, y, xValue, yValue){
			 $('<div id="tooltip" class="chart-tooltip">' + yValue + '<\/div>').css({
                position: 'absolute',
                display: 'none',
                top: y - 40,
                left: x - 40,
                border: '0px solid #ccc',
                padding: '2px 6px',
                'background-color': '#fff'
            }).appendTo("body").fadeIn(200);
		},
		satisChart : function (data){
            if ($('#site_activities').size() != 0) {
                //site activities
                var previousPoint2 = null;
                $('#site_activities_loading').hide();
                $('#site_activities_content').show();
                data1 = data;
                var plot_statistics = $.plot($("#site_activities"),
	                [{
	                    data: data1,
	                    lines: {
	                        fill: 0.2,
	                        lineWidth: 0,
	                    },
	                    color: ['#BAD9F5']
	                }, {
	                    data: data1,
	                    points: {
	                        show: true,
	                        fill: true,
	                        radius: 4,
	                        fillColor: "#9ACAE6",
	                        lineWidth: 2
	                    },
	                    color: '#9ACAE6',
	                    shadowSize: 1
	                }, {
	                    data: data1,
	                    lines: {
	                        show: true,
	                        fill: false,
	                        lineWidth: 3
	                    },
	                    color: '#9ACAE6',
	                    shadowSize: 0
	                }],
	
	                {
	
	                    xaxis: {
	                        tickLength: 0,
	                        tickDecimals: 0,
	                        mode: "categories",
	                        min: 0,
	                        font: {
	                            lineHeight: 18,
	                            style: "normal",
	                            variant: "small-caps",
	                            color: "#6F7B8A"
	                        }
	                    },
	                    yaxis: {
	                        ticks: 5,
	                        tickDecimals: 0,
	                        tickColor: "#eee",
	                        font: {
	                            lineHeight: 14,
	                            style: "normal",
	                            variant: "small-caps",
	                            color: "#6F7B8A"
	                        }
	                    },
	                    grid: {
	                        hoverable: true,
	                        clickable: true,
	                        tickColor: "#eee",
	                        borderColor: "#eee",
	                        borderWidth: 1
	                    }
                });

                $("#site_activities").bind("plothover", function (event, pos, item) {
                    $("#x").text(pos.x.toFixed(2));
                    $("#y").text(pos.y.toFixed(2));
                    if (item) {
                        if (previousPoint2 != item.dataIndex) {
                            previousPoint2 = item.dataIndex;
                            $("#tooltip").remove();
                            var x = item.datapoint[0].toFixed(2),
                                y = item.datapoint[1].toFixed(2);
                            charts.showChartTooltip(item.pageX, item.pageY, item.datapoint[0], item.datapoint[1] + ' ₺');
                        }
                    }
                });

                $('#site_activities').bind("mouseleave", function () {
                    $("#tooltip").remove();
                });
            }
		},
		erisimChart :  function(data){
			var visitors = data;
            if ($('#site_statistics').size() != 0) {

                $('#site_statistics_loading').hide();
                $('#site_statistics_content').show();

                var plot_statistics = $.plot($("#site_statistics"),
                    [{
                        data: visitors,
                        lines: {
                            fill: 0.6,
                            lineWidth: 0
                        },
                        color: ['#f89f9f']
                    }, {
                        data: visitors,
                        points: {
                            show: true,
                            fill: true,
                            radius: 5,
                            fillColor: "#f89f9f",
                            lineWidth: 3
                        },
                        color: '#fff',
                        shadowSize: 0
                    }],

                    {
                        xaxis: {
                            tickLength: 0,
                            tickDecimals: 0,
                            mode: "categories",
                            min: 0,
                            font: {
                                lineHeight: 14,
                                style: "normal",
                                variant: "small-caps",
                                color: "#6F7B8A"
                            }
                        },
                        yaxis: {
                            ticks: 5,
                            tickDecimals: 0,
                            tickColor: "#eee",
                            font: {
                                lineHeight: 14,
                                style: "normal",
                                variant: "small-caps",
                                color: "#6F7B8A"
                            }
                        },
                        grid: {
                            hoverable: true,
                            clickable: true,
                            tickColor: "#eee",
                            borderColor: "#eee",
                            borderWidth: 1
                        }
                    });

                var previousPoint = null;
                $("#site_statistics").bind("plothover", function (event, pos, item) {
                    $("#x").text(pos.x.toFixed(2));
                    $("#y").text(pos.y.toFixed(2));
                    if (item) {
                        if (previousPoint != item.dataIndex) {
                            previousPoint = item.dataIndex;

                            $("#tooltip").remove();
                            var x = item.datapoint[0].toFixed(2),
                                y = item.datapoint[1].toFixed(2);

                            charts.showChartTooltip(item.pageX, item.pageY, item.datapoint[0], item.datapoint[1] + ' erişim');
                        }
                    } else {
                        $("#tooltip").remove();
                        previousPoint = null;
                    }
                });
            }
		},
		sosyalMedyaChart :  function(){
	        if (!jQuery().easyPieChart ) {
	            return;
	        }
	        // IE8 Fix: function.bind polyfill
	        if (Metronic.isIE8() && !Function.prototype.bind) {
	            Function.prototype.bind = function (oThis) {
	                if (typeof this !== "function") {
	                    // closest thing possible to the ECMAScript 5 internal IsCallable function
	                    throw new TypeError("Function.prototype.bind - what is trying to be bound is not callable");
	                }

	                var aArgs = Array.prototype.slice.call(arguments, 1),
	                    fToBind = this,
	                    fNOP = function () {},
	                    fBound = function () {
	                        return fToBind.apply(this instanceof fNOP && oThis ? this : oThis,
	                    aArgs.concat(Array.prototype.slice.call(arguments)));
	                };

	                fNOP.prototype = this.prototype;
	                fBound.prototype = new fNOP();

	                return fBound;
	            };
	        }
	        
	        $('.easy-pie-chart .number.diger').easyPieChart({
	            animate: 1000,
	            size: 75,
	            lineWidth: 3,
	            barColor: Metronic.getBrandColor('yellow')
	        });

	        $('.easy-pie-chart .number.facebook').easyPieChart({
	            animate: 1000,
	            size: 75,
	            lineWidth: 3,
	            barColor: Metronic.getBrandColor('green')
	        });

	        $('.easy-pie-chart .number.twitter').easyPieChart({
	            animate: 1000,
	            size: 75,
	            lineWidth: 3,
	            barColor: Metronic.getBrandColor('red')
	        });

	        $('.easy-pie-chart-reload').click(function () {
	        	dashboard.sosyalMedya();
	        });

		},
		reklamChart: function (adwords,adroll,facebook) {
	        if (!jQuery().sparkline) {
	            return;
	        }

	        // IE8 Fix: function.bind polyfill
	        if (Metronic.isIE8() && !Function.prototype.bind) {
	            Function.prototype.bind = function (oThis) {
	                if (typeof this !== "function") {
	                    // closest thing possible to the ECMAScript 5 internal IsCallable function
	                    throw new TypeError("Function.prototype.bind - what is trying to be bound is not callable");
	                }

	                var aArgs = Array.prototype.slice.call(arguments, 1),
	                    fToBind = this,
	                    fNOP = function () {},
	                    fBound = function () {
	                        return fToBind.apply(this instanceof fNOP && oThis ? this : oThis,
	                    aArgs.concat(Array.prototype.slice.call(arguments)));
	                };

	                fNOP.prototype = this.prototype;
	                fBound.prototype = new fNOP();

	                return fBound;
	            };
	        }


	        $("#sparkline_adwords").sparkline(adwords, {
	            type: 'bar',
	            width: '100',
	            barWidth: 5,
	            height: '55',
	            barColor: '#35aa47',
	            negBarColor: '#e02222'
	        });

	        $("#sparkline_adroll").sparkline(adroll, {
	            type: 'bar',
	            width: '100',
	            barWidth: 5,
	            height: '55',
	            barColor: '#ffb848',
	            negBarColor: '#e02222'
	        });

	        $("#sparkline_facebook").sparkline(facebook, {
	            type: 'bar',
	            width: '100',
	            height: '55',
	            lineColor: '#ffb848'
	        });

	    }
	}
}();
/*FormPicker Init*/

$(document).ready(function() {
	"use strict";
	
	/* Bootstrap Colorpicker Init*/
	$('.colorpicker').colorpicker();

	$('.colorpicker-rgb').colorpicker({
		color: '#AA3399',
		format: 'rgba'
	});

	$('.colorpicker-inline').colorpicker({
		color: '#ffaa00',
		container: true,
		inline: true
	});
	

	if ($('#datetimepicker1').length > 0) {
		/* Datetimepicker Init*/
		$('#datetimepicker1').datetimepicker({
			locale: 'pt',
			useCurrent: false,
			format: 'DD-MM-YYYY',
			icons:
			{
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down"
            },
		}).on('dp.show', function() {
			if($(this).data("DateTimePicker").date() === null)
			$(this).data("DateTimePicker").date(moment());
		});			
	}

	if ($('#datetimepicker2').length > 0) {
		$('#datetimepicker2').datetimepicker({
			locale: 'pt',
			format: '',
			useCurrent: false,
			icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                },
		}).data("DateTimePicker").date(moment());
	}

	if ($('#datetimepicker3').length > 0) {
		
		$('#datetimepicker3').datetimepicker({
				format: 'DD-MM-YYYY',
				inline:true,
				sideBySide: true,
				icons: {
	                    time: "fa fa-clock-o",
	                    date: "fa fa-calendar",
	                    up: "fa fa-arrow-up",
	                    down: "fa fa-arrow-down"
	                },
		});
	}

	if ($('#datetimepicker4').length > 0) {

		$('#datetimepicker4').datetimepicker({
				inline:true,
				sideBySide: true,
				useCurrent: false,
				icons: {
	                    time: "fa fa-clock-o",
	                    date: "fa fa-calendar",
	                    up: "fa fa-arrow-up",
	                    down: "fa fa-arrow-down"
	                },
		}).data("DateTimePicker").date(moment());
	};
	
	/* Daterange picker Init*/
	$('.input-daterange-datepicker').daterangepicker({
	  buttonClasses: ['btn', 'btn-sm'],
			applyClass: 'btn-info',
			cancelClass: 'btn-default'
	});
	$('.input-daterange-timepicker').daterangepicker({
		timePicker: true,
		format: 'MM/DD/YYYY h:mm A',
		timePickerIncrement: 30,
		timePicker12Hour: true,
		timePickerSeconds: false,
		buttonClasses: ['btn', 'btn-sm'],
		applyClass: 'btn-info',
		cancelClass: 'btn-default'
	});
	$('.input-limit-datepicker').daterangepicker({
		format: 'MM/DD/YYYY',
		minDate: '06/01/2015',
		maxDate: '06/30/2015',
		buttonClasses: ['btn', 'btn-sm'],
		applyClass: 'btn-info',
		cancelClass: 'btn-default',
		dateLimit: {
			days: 6
		}
	});
});
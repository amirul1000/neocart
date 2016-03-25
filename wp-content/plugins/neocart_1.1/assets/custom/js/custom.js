// JavaScript Document
$( ".datetimepicker" ).datetimepicker({
		dateFormat: 'yy-mm-dd',
		timeFormat: 'HH:mm:ss',
		changeYear: true,
		changeMonth: true,
		showOn: 'button',
		buttonText: 'Show Date',
		buttonImageOnly: true,
		buttonImage: PLUGIN_URL+'/images/calendar.gif',
	});


function isNumberKey(evt){
		var charCode = (evt.which) ? evt.which : evt.keyCode
		if (charCode == 46 )
			return true;
		if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
		return true;
	}
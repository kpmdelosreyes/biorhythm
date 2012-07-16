//jQuery.noConflict();

//jQuery('document').ready(function($) {
$('document').ready(function() {

	var options = {'years_between' : [1900,2030] };

	$("#pg_biorythm_birth_date, #pg_biorythm_target_date").BuilderCalendar(options);

	$(".img_calendar").click(function() {
    	var sId = $(this).parent().prev().attr('id');
    	$("#"+sId).click();
    	return false;
    });

});

var PLUGIN_Biorythm = {

	error : {
			'bgcolor' : '#FEF0C9',
			'div' : '<div class="error"></div>'
	},
	
	errmsg : {
		'required' : 'This field is required.'
	},

	displayError: function(obj, errmsg) { 
		obj.parents('td').append($(this.error.div).text(errmsg));
		obj.css('background-color', this.error.bgcolor);
	},

	errColor: function(obj) {
		obj.css('background-color', this.error.bgcolor);
	},

	errColorNone: function(obj) {
		obj.css('background-color', 'white');
	},

	viewResult : function() {
		var sUrl = $("#PG_biorythm_url").val();
		var sDir = $("#PG_biorythm_dir").val();
		var focusto = '';
		var aParam = new Array();
		$('.error').remove();
		$(":input").css('background-color', '');

		var name = $("input[name='pg_biorythm_owner_name']");
		var birthDate = $("input[name='pg_biorythm_birth_date']");
		var targetDate = $("input[name='pg_biorythm_target_date']");

		var err = "";
		if (name.val() == "") {
			name.css('background-color', this.error.bgcolor);
			focusto = focusto != '' ? focusto : name;
			err = name;
		} 
		if (birthDate.val() == "") {
			birthDate.css('background-color', this.error.bgcolor);
			focusto = focusto != '' ? focusto : birthDate;
			err = birthDate;
		}

		if (err != "") {
			err.parents('.owner_info').append($(this.error.div).text(this.errmsg.required));
		}
		
		if (focusto != '') {
			focusto.focus();
		} else {
			var aData = {
				url: sUrl,
				name: name.val(),
				birthDate: birthDate.val(),
				targetDate: targetDate.val(),
				Page: 'Result'
			};
			$("#pg_biorythm_ajax_loader").append('<img src="'+sDir+'img/ajax-loader.gif"/>');
			PLUGIN.post('#pg_biorythm_result',aData, 'custom', 'HTML', PLUGIN_Biorythm.viewResultCallback);
		}
	},

	viewResultCallback : function(result) {
		$("#pg_biorythm_ajax_loader img").remove();
		$('#pg_biorythm_result').html(result);
	}
};
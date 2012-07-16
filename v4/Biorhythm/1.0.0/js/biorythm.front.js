//jQuery.noConflict();
jQuery(document).ready(function($){
//$(document).ready(function(){

	$("#pg_biorythm_birth_date").live("click", function() {
		setTimeout(function(){
			$(".pop_calendar").addClass("calendar_popup_birthdate");
			//$(".pop_calendar").css({"marginTop": -85,"marginLeft": -77 });
		}, 0);	 
	});
	
	$("#pg_biorythm_target_date").live("click", function() {
		setTimeout(function(){
			//$(".pop_calendar").addClass("calendar_popup");
			$(".pop_calendar").addClass("calendar_popup_targetdate");
			//$(".pop_calendar").css({"marginTop": -125,"marginLeft": -77 });
		}, 0);	 
	});


	
	$(".pg_biorythm_calendaricon").click(function() {
    	var sId = $(this).prev().children().attr('id');
    	$("#"+sId).click();
    	return false;
    });
    
	var date = new Date();
	var options = {'years_between' : [2000, (date.getFullYear() + 20)] };
	$("#pg_biorythm_birth_date, #pg_biorythm_target_date").BuilderCalendar(options);
		
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
		obj.parents('p').append($(this.error.div).text(errmsg));
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
			this.displayError(name, this.errmsg.required);
			name.css('background-color', this.error.bgcolor);
			focusto = focusto != '' ? focusto : name;
			err = name;
		} 
		if (birthDate.val() == "") {
			this.displayError(birthDate, this.errmsg.required);
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
			PLUGIN.post('.pg_biorythm_results',aData, 'custom', 'HTML', PLUGIN_Biorythm.viewResultCallback);
		}
	},

	viewResultCallback : function(result) {
		$("#pg_biorythm_ajax_loader img").remove();
		$('.pg_biorythm_results').empty();
		$('.pg_biorythm_results').hide()
		$('.pg_biorythm_results').append(result)
		$('.pg_biorythm_results').slideDown();
	}
};


$('document').ready(function() {

	var options = {'years_between' : [1900,2030] };

	$("#birth_date, #target_date").BuilderCalendar(options);

	$(".img_calendar").click(function() {
    	var sId = $(this).parent().prev().attr('id');
    	$("#"+sId).click();
    	return false;
    });

});

var PLUGIN_Biorythm = {
	submit: false,

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

	isNum: function(obj) {
		if (!obj.match(/^\d+$/)) return false
		return true;
	},

	showMessage: function(selector, msg) {
		$(selector).show().html(msg);
		$(selector).delay(800).fadeOut('slow');
	},


	submitSetting: function() {
		var sUrl = $("#sUrl").val();
		var idx = $("#idx").val();
		var action = $("#Action").val();
		var title = $("input[name='title']");
		var displayType = $("input[name='display_type']:checked");
		var name = $("input[name='owner_name']");
		var birthDate = $("input[name='birth_date']");
		var targetDate = $("input[name='target_date']");

		var focusto = '';
		var aParam = new Array();

		$('.error').remove();
		$(":input").css('background-color', '');
		
		if (title.val() == '') {
			this.displayError(title, this.errmsg.required);
			focusto = focusto != '' ? focusto : title;
		}

		if (displayType.val() == 'owner') {
			var err;
			if (name.val() == "") {
				name.css('background-color', this.error.bgcolor);
				focusto = focusto != '' ? focusto : name;
			} 
			if (birthDate.val() == "") {
				birthDate.css('background-color', this.error.bgcolor);
				focusto = focusto != '' ? focusto : birthDate;
			}
		}
		
		if (focusto != '') {
			focusto.focus();
		} else {
			$.ajax({
				url: sUrl,
				type: 'POST',
				data: {		
					aData : {
						title: title.val(),
						displayType : displayType.val(),
						name: name.val(),
						birthDate: birthDate.val(),
						targetDate: targetDate.val()
					},
					Action : action,
					idx : idx
				},
				success : function(result) {
					var aResult = jQuery.parseJSON(result);
					if (aResult.idx != "") {
						if (action == 'Save') {
							$("#idx").val(aResult.idx);
							$("#Action").val('Modify');
						}
						PLUGIN_Biorythm.showMessage('#msg', 'Setting saved successfully');
					}
				}
			});
		}
	},

	displayType : function(val) {
		if (val == 'owner') {
			$('#owner_boirythm').css('display','block');
		} else {
			$('#owner_boirythm').css('display','none');
		}
	}
};

$.extend({
  getUrlVars: function(){
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
      hash = hashes[i].split('=');
      vars.push(hash[0]);
      vars[hash[0]] = hash[1];
    }
    return vars;
  },
  getUrlVar: function(name){
    return $.getUrlVars()[name];
  }
});
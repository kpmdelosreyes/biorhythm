$('document').ready(function() {
	
	$('.msg_suc_box').hide();
	
	var options = {'years_between' : [1900,2030] };
	
	$("#birth_date, #target_date").BuilderCalendar(options);
	


	$(".calendar_icon").click(function() {
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
		obj.parents('span').append($(this.error.div).text(errmsg));
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

	// showMessage: function(selector, msg) {
		// $(selector).show().html(msg);
		// $(selector).delay(800).fadeOut('slow');
	// },
	
	
	changeIframe : function(action, value, time){
		time = time != undefined ? time : 0;
		if (action == "auto"){
			setTimeout(function(){
				var selector = value && value != null ? $(value) : $("body").children(":first");
				var iframe = parent.document.getElementById('plugin_contents');
				documentHeight = Math.max(iframe.scrollHeight, iframe.clientHeight);
				parent.iframeHeight(parent.document.getElementById('plugin_contents'), (selector.height() - documentHeight));
			}, time);	
		}
		else {
			var body = document.body, html = document.documentElement;
			var documentHeight = Math.max(body.offsetHeight, html.clientHeight, html.offsetHeight);
			if (action == "add"){
				setTimeout(function(){
					parent.iframeHeight(parent.document.getElementById('plugin_contents'), ((documentHeight + parseInt(value)) - documentHeight)); 
				}, time);
			}
			else {
				setTimeout(function(){
					parent.iframeHeight(parent.document.getElementById('plugin_contents'), (documentHeight - (documentHeight + ((parseInt(value) * 2) - 10)))); 
				}, time);
			}
		}
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
		var template = $("input[name='pg_scheduler_template']:checked");
		

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
				this.displayError(name, this.errmsg.required);
				name.css('background-color', this.error.bgcolor);
				focusto = focusto != '' ? focusto : name;
			} 
			if (birthDate.val() == "") {
			this.displayError(birthDate, this.errmsg.required);
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
						targetDate: targetDate.val(),
						template: template.val()
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
						// PLUGIN_Biorythm.showMessage('#msg', 'Setting saved successfully');
						$('.msg_suc_box').show().fadeOut(5000);
					}
				}
			});
		}
	},
	
	resetSettings : function(){
		var sUrl = $("#sUrl").val();
		var idx = $("#idx").val();
		var action = $("#Action").val();
		var title = $("input[name='title']").val("Biorhythm");
		var displayType = $("#member").attr("checked", "checked");
		var name = $("input[name='owner_name']").val("");
		var birthDate = $("input[name='birth_date']").val("");
		var targetDate = $("input[name='target_date']").val("");
		var template = $("#radio_blue").attr("checked", "checked");
		
		$('#owner_boirythm').css('display','none');
		
		$.ajax({
			url: sUrl,
			type: 'POST',
			data: {
				Action: 'setDefault'
			},
			success: function(response) {
				if (response == 'true') {
					window.location.href=sUrl;
				}
			}
		});

	
	},
	

	displayType : function(val) {
		if (val == 'owner') {
			$('#owner_boirythm').css('display','block');
			PLUGIN_Biorythm.changeIframe("add", 180);
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
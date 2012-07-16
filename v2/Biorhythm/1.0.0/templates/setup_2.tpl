<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Biorhythm Setting</title>
	
	<link href="{$sPgDir}css/biorythm.admin.css" type="text/css" rel="stylesheet" />
	<link href="{$sPgLib}css/popup.calendaradv.css" type="text/css" rel="stylesheet" />
	<link href="{$sPgDir}css/plugin.css" type="text/css" rel="stylesheet" />
	
	<script type="text/javascript" src="{$jquery}"></script>
	<script type="text/javascript" src="{$sPgLib}js/jquery.calendaradv.js"></script> 
	<script type="text/javascript" src="{$sPgDir}js/biorythm.admin.js"></script>
	
	<!--[if IE]>
	<link href="{$sPgDir}css/ie.css" rel="stylesheet" type="text/css" media="screen" />	
	<![endif]-->
</head>

<body>
	{$sScriptCrossDomain}
	<form method="post" autocomplete="off" id="plugin_biorythmform">
	<input type="hidden" name="sUrl" id="sUrl" value="{$sUrl}" />
	<input type="hidden" name="idx" id="idx" value="{$idx}" />
	<input type="hidden" name="Action" id="Action" value="{$action}" />	
	<!-- message box -->			
			<div class="msg_suc_box">
				<p><span>Saved successfully.</span></p>
			</div>	
			<p class="require"><span class="neccesary">*</span> Required</p>
			<!-- input area -->
                        
                     
			<table border="1" cellspacing="0" class="table_input_vr">
				<colgroup>
					<col width="115px" />
					<col width="*" />
				</colgroup>
				<tr><td colspan="2" >PLUGIN ID : {$pluginName}</td></tr>
				<tr>
					<th><label>Template</label></th>
					<td>	
						<div class="template_setting" id="template_setting">
							<div class="template_icon">
								<input type="radio" name="pg_scheduler_template" value="blue" class="input_rdo" id="radio_blue" checked {if $sTemplate eq "blue"}checked{/if} />&nbsp;
								<label for = "radio_blue">Blue</label>
								<label for="template_blue"><img src="images/blue.jpg" alt="Original Template Blue" /></label>
							</div>
							<div class="template_icon">
								<input type="radio" name="pg_scheduler_template" value="gray" class="input_rdo" id="radio_gray" {if $sTemplate eq "gray"}checked{/if} />&nbsp;
								<label for = "radio_gray">Gray</label>
								<label for="template_gray"><img src="images/gray.jpg" alt="Original Template Gray" /></label>
							</div>
						</div>
					</td>
				</tr>	
				<tr>
					<th><label for="module_label">Title</label></th>
					<td>
						<span class="neccesary">*</span><span><input type="text" name="title" id="title"  value="{$title}" class="fix" maxlength="30"/></span>
					</td>
				</tr>
				<tr>
					<th>Display Type</th>
					<td>
						<table border="0" cellspacing="0" cellpadding="0" class="display_type_table" >
							<tr>
								<td valign="top" class="site_manager" >
									<input type="radio" name="display_type" id="member" class="input_rdo table_display_type" value="member" {if $displayType neq 'owner'}checked{/if} onclick="PLUGIN_Biorythm.displayType(this.value)"/>
									<label for="member"> Site Member</label>
								</td>
								<td class="site_owner">
									<input type="radio" name="display_type" id="owner" class="input_rdo table_display_type" value="owner" {if $displayType eq 'owner'}checked{/if} onclick="PLUGIN_Biorythm.displayType(this.value)"/>
									<label for="owner"> Site Owner</label>
								</td>
							</tr>
							<tr>	
								<td colspan="2">
									<table id="owner_boirythm" style="display: {if $displayType eq 'owner'}block{else}none{/if}">
										<tr>
											<td colspan="2"><p style="font-weight:bold">Owner's {$pluginName}</p></td>
										</tr>
										<tr>
											<td class="owner_title" ><label>Name</label></td>
											<td>	
												<span class="neccesary">*</span>
												<span class="display_type_nameborder">
													<input type="text" name="owner_name" id="owner_name" value="{$name}" class="fix" style="width:150px;font-size:12px !important;font-family: Arial !important;"/>
												</span>
											</td>
										</tr>
										<tr>
											<td class="owner_bdate"><label>Birth Date</label></td>
											<td>
												<span class="neccesary2">*</span>
												<span class="display_type_calendarborder">
													<input type="text" name="birth_date" id="birth_date" value="{$birthDate}" class="fix" readonly="readonly" style="width:65px;font-size:11px !important;font-family: Arial !important;"/>
													<a href="#"><img src="{$sPgDir}images/biorythm_ico.gif" alt="" class="calendar_icon" /></a>
												</span>
											</td>
										</tr>
									</table>
									<!--<div class="display_type_settings" id="owner_boirythm" style="display: {if $displayType eq 'owner'}block{else}none{/if}">
										<p>Owner's Biorythm</p>
										<p><label>Name</label><span class="neccesary">*</span><span class="display_type_nameborder">
										<input type="text" name="owner_name" id="owner_name" value="{$name}" class="fix" style="width:150px;"/></span></p>
										<p><label>Birth Date</label><span class="neccesary2" style="float:left;" >*</span>
										<span class="display_type_calendarborder">
											<input type="text" name="birth_date" id="birth_date" value="{$birthDate}" class="fix" readonly="readonly" style="width:65px;"/>
											<a href="#"><img src="{$sPgDir}images/biorythm_ico.gif" alt="" class="calendar_icon" /></a>
										</span></p>
									</div> -->
								</td>
							</tr>
							
									
							
						</table>
						
						
					</td>
				</tr>	
				<tr>
					<td colspan="2">
						<div class="tbl_lb_wide_btn">
							<a href="#" class="btn_apply" title="Save changes" onclick="PLUGIN_Biorythm.submitSetting();">Save</a>
							<a href="#" class="add_link" title="Reset to default" onclick="PLUGIN_Biorythm.resetSettings();">Reset to Default</a>
						</div>
					</td>
				</tr>
				
			</table>
	</form>
</body>
</html>	
								
				
			
				
				
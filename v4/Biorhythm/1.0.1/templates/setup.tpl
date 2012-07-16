<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Biorythm Setting</title>
	<link href="{$sPgDir}css/biorythm.admin.css" type="text/css" rel="stylesheet" />
	<link href="{$sPgLib}css/popup.calendar.css" type="text/css" rel="stylesheet" />
	<script type="text/javascript" src="{$jquery}"></script>
	<script type="text/javascript" src="{$sPgDir}js/biorythm.admin.js"></script>
	<script type="text/javascript" src="{$sPgLib}js/jquery.calendar.js"></script>
</head>
<body>
	<form method="post" autocomplete="off" id="plugin_biorythmform">
	<input type="hidden" name="sUrl" id="sUrl" value="{$sUrl}" />
	<input type="hidden" name="idx" id="idx" value="{$idx}" />
	<input type="hidden" name="Action" id="Action" value="{$action}" />	
	<div id="wrap_02">
		<h4><span>Biorythm Setting</span></h4>
		<div id="msg"></div>
		<table class="table_02" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<th>Title</th>
				<td>
					<input type="text" name="title" id="title" style="width:300px;" value="{$title}" class="input" maxlength="30"/>
				</td>
			</tr>
			<tr class="header_txt">
				<th>Display Type</th>
				<td style="padding-top:3px;">
					<input type="radio" name="display_type" id="member" value="member" {if $displayType neq 'owner'}checked{/if} onclick="PLUGIN_Biorythm.displayType(this.value)"/><label for="member"> Site Member</label>
					<input type="radio" name="display_type" id="owner" value="owner" {if $displayType eq 'owner'}checked{/if} onclick="PLUGIN_Biorythm.displayType(this.value)"/><label for="owner"> Site Owner</label>
					<div id="owner_boirythm" style="display: {if $displayType eq 'owner'}block{else}none{/if}">
					<p class="title">Owner's Biorythm</p>
					<ul class="owner_info">
						<li class="label">Name</li>
						<li><input tyle="text" name="owner_name" id="owner_name" value="{$name}" class="input" style="width:150px;"/></li>
						<li class="label">Birth Date</li>
						<li>
							<input tyle="text" name="birth_date" id="birth_date" value="{$birthDate}" class="input" readonly style="width:75px;"/>
							<a href="#"><img src="{$sPgDir}img/ico_calendar.gif" alt="" class="img_calendar" /></a>
						</li>
						<li class="label">Target Date</li>
						<li>
							<input tyle="text" name="target_date" id="target_date" value="{$targetDate}" class="input" readonly style="width:75px;"/>
							<a href="#"><img src="{$sPgDir}img/ico_calendar.gif" alt="" class="img_calendar" /></a>
						</li>
					</ul>
					<!--<p style="display:block; padding-top:5px;clear:both; ">
						<span class="btn_01"><input type="button" name="" value="View Results" onclick="" /></span>
					</p>-->
					</div>
				</td>
			</tr>
		</table>
		<span class="btn_02"><input type="button" value="Submit" title="submit" name="" onclick="PLUGIN_Biorythm.submitSetting();"/></span>
	</div>
	</form>
</body>
</html>
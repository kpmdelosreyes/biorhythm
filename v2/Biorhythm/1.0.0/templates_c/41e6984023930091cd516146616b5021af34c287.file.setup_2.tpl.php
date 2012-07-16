<?php /* Smarty version Smarty-3.0.6, created on 2011-11-25 08:50:58
         compiled from "./templates/setup_2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13311100154ecee672953da2-06673236%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '41e6984023930091cd516146616b5021af34c287' => 
    array (
      0 => './templates/setup_2.tpl',
      1 => 1322181975,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13311100154ecee672953da2-06673236',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Biorhythm Setting</title>
	
	<link href="<?php echo $_smarty_tpl->getVariable('sPgDir')->value;?>
css/biorythm.admin.css" type="text/css" rel="stylesheet" />
	<link href="<?php echo $_smarty_tpl->getVariable('sPgLib')->value;?>
css/popup.calendaradv.css" type="text/css" rel="stylesheet" />
	<link href="<?php echo $_smarty_tpl->getVariable('sPgDir')->value;?>
css/plugin.css" type="text/css" rel="stylesheet" />
	
	<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('jquery')->value;?>
"></script>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('sPgLib')->value;?>
js/jquery.calendaradv.js"></script> 
	<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('sPgDir')->value;?>
js/biorythm.admin.js"></script>
	
	<!--[if IE]>
	<link href="<?php echo $_smarty_tpl->getVariable('sPgDir')->value;?>
css/ie.css" rel="stylesheet" type="text/css" media="screen" />	
	<![endif]-->
</head>

<body>
	<?php echo $_smarty_tpl->getVariable('sScriptCrossDomain')->value;?>

	<form method="post" autocomplete="off" id="plugin_biorythmform">
	<input type="hidden" name="sUrl" id="sUrl" value="<?php echo $_smarty_tpl->getVariable('sUrl')->value;?>
" />
	<input type="hidden" name="idx" id="idx" value="<?php echo $_smarty_tpl->getVariable('idx')->value;?>
" />
	<input type="hidden" name="Action" id="Action" value="<?php echo $_smarty_tpl->getVariable('action')->value;?>
" />	
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
				<tr><td colspan="2" >PLUGIN ID : <?php echo $_smarty_tpl->getVariable('pluginName')->value;?>
</td></tr>
				<tr>
					<th><label>Template</label></th>
					<td>	
						<div class="template_setting" id="template_setting">
							<div class="template_icon">
								<input type="radio" name="pg_scheduler_template" value="blue" class="input_rdo" id="radio_blue" checked <?php if ($_smarty_tpl->getVariable('sTemplate')->value=="blue"){?>checked<?php }?> />&nbsp;
								<label for = "radio_blue">Blue</label>
								<label for="template_blue"><img src="images/blue.jpg" alt="Original Template Blue" /></label>
							</div>
							<div class="template_icon">
								<input type="radio" name="pg_scheduler_template" value="gray" class="input_rdo" id="radio_gray" <?php if ($_smarty_tpl->getVariable('sTemplate')->value=="gray"){?>checked<?php }?> />&nbsp;
								<label for = "radio_gray">Gray</label>
								<label for="template_gray"><img src="images/gray.jpg" alt="Original Template Gray" /></label>
							</div>
						</div>
					</td>
				</tr>	
				<tr>
					<th><label for="module_label">Title</label></th>
					<td>
						<span class="neccesary">*</span><span><input type="text" name="title" id="title"  value="<?php echo $_smarty_tpl->getVariable('title')->value;?>
" class="fix" maxlength="30"/></span>
					</td>
				</tr>
				<tr>
					<th>Display Type</th>
					<td>
						<table border="0" cellspacing="0" cellpadding="0" class="display_type_table" >
							<tr>
								<td valign="top" class="site_manager" >
									<input type="radio" name="display_type" id="member" class="input_rdo table_display_type" value="member" <?php if ($_smarty_tpl->getVariable('displayType')->value!='owner'){?>checked<?php }?> onclick="PLUGIN_Biorythm.displayType(this.value)"/>
									<label for="member"> Site Member</label>
								</td>
								<td class="site_owner">
									<input type="radio" name="display_type" id="owner" class="input_rdo table_display_type" value="owner" <?php if ($_smarty_tpl->getVariable('displayType')->value=='owner'){?>checked<?php }?> onclick="PLUGIN_Biorythm.displayType(this.value)"/>
									<label for="owner"> Site Owner</label>
								</td>
							</tr>
							<tr>	
								<td colspan="2">
									<table id="owner_boirythm" style="display: <?php if ($_smarty_tpl->getVariable('displayType')->value=='owner'){?>block<?php }else{ ?>none<?php }?>">
										<tr>
											<td colspan="2"><p style="font-weight:bold">Owner's <?php echo $_smarty_tpl->getVariable('pluginName')->value;?>
</p></td>
										</tr>
										<tr>
											<td class="owner_title" ><label>Name</label></td>
											<td>	
												<span class="neccesary">*</span>
												<span class="display_type_nameborder">
													<input type="text" name="owner_name" id="owner_name" value="<?php echo $_smarty_tpl->getVariable('name')->value;?>
" class="fix" style="width:150px;font-size:12px !important;font-family: Arial !important;"/>
												</span>
											</td>
										</tr>
										<tr>
											<td class="owner_bdate"><label>Birth Date</label></td>
											<td>
												<span class="neccesary2">*</span>
												<span class="display_type_calendarborder">
													<input type="text" name="birth_date" id="birth_date" value="<?php echo $_smarty_tpl->getVariable('birthDate')->value;?>
" class="fix" readonly="readonly" style="width:65px;font-size:11px !important;font-family: Arial !important;"/>
													<a href="#"><img src="<?php echo $_smarty_tpl->getVariable('sPgDir')->value;?>
images/biorythm_ico.gif" alt="" class="calendar_icon" /></a>
												</span>
											</td>
										</tr>
									</table>
									<!--<div class="display_type_settings" id="owner_boirythm" style="display: <?php if ($_smarty_tpl->getVariable('displayType')->value=='owner'){?>block<?php }else{ ?>none<?php }?>">
										<p>Owner's Biorythm</p>
										<p><label>Name</label><span class="neccesary">*</span><span class="display_type_nameborder">
										<input type="text" name="owner_name" id="owner_name" value="<?php echo $_smarty_tpl->getVariable('name')->value;?>
" class="fix" style="width:150px;"/></span></p>
										<p><label>Birth Date</label><span class="neccesary2" style="float:left;" >*</span>
										<span class="display_type_calendarborder">
											<input type="text" name="birth_date" id="birth_date" value="<?php echo $_smarty_tpl->getVariable('birthDate')->value;?>
" class="fix" readonly="readonly" style="width:65px;"/>
											<a href="#"><img src="<?php echo $_smarty_tpl->getVariable('sPgDir')->value;?>
images/biorythm_ico.gif" alt="" class="calendar_icon" /></a>
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
								
				
			
				
				
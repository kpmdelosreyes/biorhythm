<?php /* Smarty version Smarty-3.0.6, created on 2011-05-15 15:59:42
         compiled from ".\templates\setup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:300854dcfdc4ed64dc3-35262863%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4e2a6bd866f4ccabb8af1051fcad470355ec3aa3' => 
    array (
      0 => '.\\templates\\setup.tpl',
      1 => 1305194560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '300854dcfdc4ed64dc3-35262863',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Biorythm Setting</title>
	<link href="<?php echo $_smarty_tpl->getVariable('sPgDir')->value;?>
css/biorythm.admin.css" type="text/css" rel="stylesheet" />
	<link href="<?php echo $_smarty_tpl->getVariable('sPgLib')->value;?>
css/popup.calendar.css" type="text/css" rel="stylesheet" />
	<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('jquery')->value;?>
"></script>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('sPgDir')->value;?>
js/biorythm.admin.js"></script>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('sPgLib')->value;?>
js/jquery.calendar.js"></script>
</head>
<body>
	<form method="post" autocomplete="off" id="plugin_biorythmform">
	<input type="hidden" name="sUrl" id="sUrl" value="<?php echo $_smarty_tpl->getVariable('sUrl')->value;?>
" />
	<input type="hidden" name="idx" id="idx" value="<?php echo $_smarty_tpl->getVariable('idx')->value;?>
" />
	<input type="hidden" name="Action" id="Action" value="<?php echo $_smarty_tpl->getVariable('action')->value;?>
" />	
	<div id="wrap_02">
		<h4><span>Biorythm Setting</span></h4>
		<div id="msg"></div>
		<table class="table_02" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<th>Title</th>
				<td>
					<input type="text" name="title" id="title" style="width:300px;" value="<?php echo $_smarty_tpl->getVariable('title')->value;?>
" class="input" maxlength="30"/>
				</td>
			</tr>
			<tr class="header_txt">
				<th>Display Type</th>
				<td style="padding-top:3px;">
					<input type="radio" name="display_type" id="member" value="member" <?php if ($_smarty_tpl->getVariable('displayType')->value!='owner'){?>checked<?php }?> onclick="PLUGIN_Biorythm.displayType(this.value)"/><label for="member"> Site Member</label>
					<input type="radio" name="display_type" id="owner" value="owner" <?php if ($_smarty_tpl->getVariable('displayType')->value=='owner'){?>checked<?php }?> onclick="PLUGIN_Biorythm.displayType(this.value)"/><label for="owner"> Site Owner</label>
					<div id="owner_boirythm" style="display: <?php if ($_smarty_tpl->getVariable('displayType')->value=='owner'){?>block<?php }else{ ?>none<?php }?>">
					<p class="title">Owner's Biorythm</p>
					<ul class="owner_info">
						<li class="label">Name</li>
						<li><input tyle="text" name="owner_name" id="owner_name" value="<?php echo $_smarty_tpl->getVariable('name')->value;?>
" class="input" style="width:150px;"/></li>
						<li class="label">Birth Date</li>
						<li>
							<input tyle="text" name="birth_date" id="birth_date" value="<?php echo $_smarty_tpl->getVariable('birthDate')->value;?>
" class="input" readonly style="width:75px;"/>
							<a href="#"><img src="<?php echo $_smarty_tpl->getVariable('sPgDir')->value;?>
img/ico_calendar.gif" alt="" class="img_calendar" /></a>
						</li>
						<li class="label">Target Date</li>
						<li>
							<input tyle="text" name="target_date" id="target_date" value="<?php echo $_smarty_tpl->getVariable('targetDate')->value;?>
" class="input" readonly style="width:75px;"/>
							<a href="#"><img src="<?php echo $_smarty_tpl->getVariable('sPgDir')->value;?>
img/ico_calendar.gif" alt="" class="img_calendar" /></a>
						</li>
					</ul>
					<p style="display:block; padding-top:5px;clear:both; ">
						<span class="btn_01"><input type="button" name="" value="View Results" onclick="" /></span>
					</p>
					</div>
				</td>
			</tr>
		</table>
		<span class="btn_02"><input type="button" value="Submit" title="submit" name="" onclick="PLUGIN_Biorythm.submitSetting();"/></span>
	</div>
	</form>
</body>
</html>
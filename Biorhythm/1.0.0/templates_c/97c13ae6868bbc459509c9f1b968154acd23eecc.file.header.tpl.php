<?php /* Smarty version Smarty-3.0.6, created on 2011-11-25 11:19:50
         compiled from "./templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15638641764ecf0956996757-35813000%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97c13ae6868bbc459509c9f1b968154acd23eecc' => 
    array (
      0 => './templates/header.tpl',
      1 => 1322190905,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15638641764ecf0956996757-35813000',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Biorhythm Plug-in</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<?php if ($_smarty_tpl->getVariable('aData')->value['pbd_template']=='blue'){?>
		<link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('sPgDir')->value;?>
css/blue.css" media="screen" />
	<?php }else{ ?>
		<link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('sPgDir')->value;?>
css/gray.css" media="screen" />
	<?php }?> 
	<link href="<?php echo $_smarty_tpl->getVariable('frontcss')->value;?>
" type="text/css" rel="stylesheet" />

	<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('jquery')->value;?>
"></script>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('emulation')->value;?>
"></script>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('frontjs')->value;?>
"></script> 
	<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('sPgDir')->value;?>
js/biorythm.front.js"></script>
</head>

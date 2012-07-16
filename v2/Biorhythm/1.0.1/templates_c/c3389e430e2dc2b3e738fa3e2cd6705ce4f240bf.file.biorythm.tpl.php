<?php /* Smarty version Smarty-3.0.6, created on 2011-05-16 09:14:40
         compiled from "./templates/biorythm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:645996894dcb99dcbb8df8-57019255%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c3389e430e2dc2b3e738fa3e2cd6705ce4f240bf' => 
    array (
      0 => './templates/biorythm.tpl',
      1 => 1305507524,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '645996894dcb99dcbb8df8-57019255',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="biorythm_view_result">
	<div id="biorythm_result">
		<span class="icon"><img src="<?php echo $_smarty_tpl->getVariable('sPgDir')->value;?>
img/<?php echo $_smarty_tpl->getVariable('aResult')->value['physical']['icon'];?>
.png" class="" /></span><span class="bio" id="physical">Physical : <?php echo $_smarty_tpl->getVariable('aResult')->value['physical']['percent'];?>
%</span>
		<span class="icon"><img src="<?php echo $_smarty_tpl->getVariable('sPgDir')->value;?>
img/<?php echo $_smarty_tpl->getVariable('aResult')->value['emotional']['icon'];?>
.png" class="" /></span><span class="bio" id="emotional">Emotional : <?php echo $_smarty_tpl->getVariable('aResult')->value['emotional']['percent'];?>
%</span>
		<span class="icon"><img src="<?php echo $_smarty_tpl->getVariable('sPgDir')->value;?>
img/<?php echo $_smarty_tpl->getVariable('aResult')->value['intellectual']['icon'];?>
.png" class="" /></span><span class="bio" id="intellectual">Intellectual : <?php echo $_smarty_tpl->getVariable('aResult')->value['intellectual']['percent'];?>
%</span>
		<span class="icon"><img src="<?php echo $_smarty_tpl->getVariable('sPgDir')->value;?>
img/<?php echo $_smarty_tpl->getVariable('avgIcon')->value;?>
.png" class="" /></span><span class="bio" id="average">Average : <?php echo $_smarty_tpl->getVariable('avg')->value;?>
%</span>
	</div>
	<div id="biorythm_result1">
		<div id="biorythm_percent">
			<ul class="ave">
				<li>100%</li>
				<li>50%</li>
				<li>mid</li>
				<li>-50%</li>
				<li>-100%</li>
			</ul>
		</div>	
		<div id="img_area">
			<img src="<?php echo $_smarty_tpl->getVariable('imgSrc')->value;?>
">
		</div>
	</div>
</div>

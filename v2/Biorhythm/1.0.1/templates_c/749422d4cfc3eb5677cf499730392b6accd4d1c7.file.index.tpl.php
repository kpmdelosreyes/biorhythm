<?php /* Smarty version Smarty-3.0.6, created on 2011-05-15 17:12:42
         compiled from ".\templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:53814dcfed6a958a32-81748829%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '749422d4cfc3eb5677cf499730392b6accd4d1c7' => 
    array (
      0 => '.\\templates\\index.tpl',
      1 => 1305472359,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '53814dcfed6a958a32-81748829',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
					<input type="hidden" name="PG_biorythm_url" value="<?php echo $_smarty_tpl->getVariable('sUrl')->value;?>
" id="PG_biorythm_url"/>
					<input type="hidden" name="PG_biorythm_dir" value="<?php echo $_smarty_tpl->getVariable('sPgDir')->value;?>
" id="PG_biorythm_dir"/>
					<div class="biorythm">
					   <h5><?php if ($_smarty_tpl->getVariable('aData')->value){?><?php echo $_smarty_tpl->getVariable('aData')->value['pbd_title'];?>
<?php }else{ ?>Biorythm Plug-in<?php }?></h5>
						<?php if ($_smarty_tpl->getVariable('aData')->value['pbd_display_type']=='owner'){?>
						<div id="pg_biorythm_result"><?php echo $_smarty_tpl->getVariable('biorythm')->value;?>
</div>
						<?php }else{ ?>
						<ul class="owner_info">
                            <li class="label">Name</li>
                            <li><input tyle="text" name="pg_biorythm_owner_name" id="pg_biorythm_owner_name"  class="input" /></li>
                            <li class="label">Birth Date</li>
                            <li>
                                <input tyle="text" name="pg_biorythm_birth_date" id="pg_biorythm_birth_date" class="input_date" readonly />
                                <a href="#"><img src="<?php echo $_smarty_tpl->getVariable('sPgDir')->value;?>
img/ico_calendar.gif" alt="" class="img_calendar" /></a>
                            </li>
                            <li class="label">Target Date</li>
                            <li>
                                <input tyle="text" name="pg_biorythm_target_date" id="pg_biorythm_target_date" value="<?php echo $_smarty_tpl->getVariable('targetDate')->value;?>
" class="input_date" readonly />
                                <a href="#"><img src="<?php echo $_smarty_tpl->getVariable('sPgDir')->value;?>
img/ico_calendar.gif" alt="" class="img_calendar" /></a>
                            </li>
                        </ul>
                        <p class="btn">
                            <span class="btn_01"><input type="button" name="" value="View Results" onclick="PLUGIN_Biorythm.viewResult()" /></span>
                            <span id="pg_biorythm_ajax_loader"></span>
                        </p>
                        <div id="pg_biorythm_result">&nbsp;</div>
					    <?php }?>
					</div>
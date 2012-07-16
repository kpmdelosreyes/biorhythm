<?php /* Smarty version Smarty-3.0.6, created on 2011-07-07 14:29:06
         compiled from "./templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:473234594e15523222bd77-09128897%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0360d049dff10f364dfc53ba2cc3958abf6ee6d' => 
    array (
      0 => './templates/index.tpl',
      1 => 1310020145,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '473234594e15523222bd77-09128897',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
				
					<input type="hidden" name="PG_biorythm_url" value="<?php echo $_smarty_tpl->getVariable('sUrl')->value;?>
" id="PG_biorythm_url"/>
					<input type="hidden" name="PG_biorythm_dir" value="<?php echo $_smarty_tpl->getVariable('sPgDir')->value;?>
" id="PG_biorythm_dir"/>
					<div id="pg_biorythm_holder">
						<div id="pg_biorythm_container">
							<h3 class="pg_biorythm_title"><?php if ($_smarty_tpl->getVariable('aData')->value){?><?php echo $_smarty_tpl->getVariable('aData')->value['pbd_title'];?>
<?php }else{ ?>Biorythm Plug-in<?php }?></h3>
							<div class="pg_biorythm_expand">
								<div class="pg_biorythm_content">
									<p><label>Name</label><span class="pg_biorythm_nameborder"><input tyle="text" name="pg_biorythm_owner_name" id="pg_biorythm_owner_name"  class="input" <?php if ($_smarty_tpl->getVariable('aData')->value['pbd_display_type']=="owner"){?>value="<?php echo $_smarty_tpl->getVariable('aData')->value['pbd_name'];?>
" disabled<?php }?> /></span></p>
									<p class="1">
										<label>Birth Date</label>
										<span class="pg_biorythm_calendarborder"><input type="text" name="pg_biorythm_birth_date" class="input_date" <?php if ($_smarty_tpl->getVariable('aData')->value['pbd_display_type']=="owner"){?>value="<?php echo $_smarty_tpl->getVariable('aData')->value['pbd_birth_date'];?>
"<?php }else{ ?> id="pg_biorythm_birth_date"<?php }?> readonly /></span>
										<?php if ($_smarty_tpl->getVariable('aData')->value['pbd_display_type']!="owner"){?><input type="image" src="<?php echo $_smarty_tpl->getVariable('sPgDir')->value;?>
images/biorythm_ico.gif" alt="calendar icon" class="pg_biorythm_calendaricon" /><?php }?>
									</p>
									<p>
										<label>Target Date</label>
										<span class="pg_biorythm_calendarborder""><input type="text" name="pg_biorythm_target_date" id="pg_biorythm_target_date" value="<?php echo $_smarty_tpl->getVariable('targetDate')->value;?>
" class="input_date" readonly /></span>
										<input type="image" src="<?php echo $_smarty_tpl->getVariable('sPgDir')->value;?>
images/biorythm_ico.gif" alt="calendar icon" class="pg_biorythm_calendaricon" />
									</p>
									
									<p class="pg_biorythm_submitcontainer">
										<input type="button" name="" value="View Results" class="pg_biorythm_submit" onclick="PLUGIN_Biorythm.viewResult()" />
									</p>
								</form>
								<div id="pg_biorythm_result"></div>
							</div>
						</div>
					</div>
<?php /* Smarty version Smarty-3.0.6, created on 2011-11-25 11:11:01
         compiled from "./templates/body.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2821615694ecf0745ee0828-49932083%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9e18d6fb3a7bf78c9125bd8a203c08b6c395f71f' => 
    array (
      0 => './templates/body.tpl',
      1 => 1322190444,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2821615694ecf0745ee0828-49932083',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<body id="PLUGIN_Biorythm">

<input type="hidden" name="PG_biorythm_url" value="<?php echo $_smarty_tpl->getVariable('sUrl')->value;?>
" id="PG_biorythm_url"/>
<input type="hidden" name="PG_biorythm_dir" value="<?php echo $_smarty_tpl->getVariable('sPgDir')->value;?>
" id="PG_biorythm_dir"/>


<div id="pg_biorythm_holder">

		<div id="pg_biorythm_container">
			<h3 class="pg_biorythm_title"><?php if ($_smarty_tpl->getVariable('aData')->value){?><?php echo $_smarty_tpl->getVariable('aData')->value['pbd_title'];?>
<?php }else{ ?>Biorhythm Plug-in<?php }?></h3>

			<div class="pg_biorythm_expand">

				<div class="pg_biorythm_form">
					<p class="extra" ><label>Name</label>
					<span class="pg_biorythm_nameborder"><input tyle="text" name="pg_biorythm_owner_name" id="pg_biorythm_owner_name"   class="input" <?php if ($_smarty_tpl->getVariable('aData')->value['pbd_display_type']=="owner"){?>value="<?php echo $_smarty_tpl->getVariable('aData')->value['pbd_name'];?>
" disabled<?php }?> /></span>
						</p>
					<p class="1">
						<label >Birth Date</label>
						<span class="pg_biorythm_calendarborder">
						<input type="text"  name="pg_biorythm_birth_date"  id="pg_biorythm_birth_date" class="input_date" <?php if ($_smarty_tpl->getVariable('aData')->value['pbd_display_type']=="owner"){?>value="<?php echo $_smarty_tpl->getVariable('aData')->value['pbd_birth_date'];?>
"<?php }else{ ?> id="pg_biorythm_birth_date"<?php }?> readonly="readonly"  /></span>
						<?php if ($_smarty_tpl->getVariable('aData')->value['pbd_display_type']!="owner"){?>
						<input type="image" src="<?php echo $_smarty_tpl->getVariable('sPgDir')->value;?>
images/biorythm_ico.gif" alt="calendar icon" class="pg_biorythm_calendaricon" />
						<?php }?>
						
					</p>
					<p>
						<label>Target Date</label>
						<span class="pg_biorythm_calendarborder""><input type="text" style="width:60px;" name="pg_biorythm_target_date" id="pg_biorythm_target_date" value="<?php echo $_smarty_tpl->getVariable('targetDate')->value;?>
" class="input_date" readonly="readonly"  /></span>
						<input type="image" src="<?php echo $_smarty_tpl->getVariable('sPgDir')->value;?>
images/biorythm_ico.gif" alt="calendar icon" class="pg_biorythm_calendaricon" /> 
						
					</p>
					<p class="pg_biorythm_submitcontainer">
						<input type="button" name="" value="View Results" class="pg_biorythm_submit" onclick="PLUGIN_Biorythm.viewResult()" />
					</p>
				</div>
				<div class="pg_biorythm_results">
				</div>
			</div>



		</div>

</div>


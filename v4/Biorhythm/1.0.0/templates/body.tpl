


<body id="PLUGIN_Biorythm">
{$sScriptCrossDomain}
<input type="hidden" name="PG_biorythm_url" value="{$sUrl}" id="PG_biorythm_url"/>
<input type="hidden" name="PG_biorythm_dir" value="{$sPgDir}" id="PG_biorythm_dir"/>


<div id="pg_biorythm_holder">

		<div id="pg_biorythm_container">
			<h3 class="pg_biorythm_title">{if $aData}{$aData.pbd_title}{else}Biorhythm{/if}</h3>

			<div class="pg_biorythm_expand">

				<div class="pg_biorythm_form">
					<p class="extra" ><label>Name</label>
					<span class="pg_biorythm_nameborder"><input tyle="text" name="pg_biorythm_owner_name" id="pg_biorythm_owner_name"   class="input" {if $aData.pbd_display_type eq "owner"}value="{$aData.pbd_name}" disabled{/if} /></span>
						</p>
					<p class="1">
						<label >Birth Date</label>
						<span class="pg_biorythm_calendarborder">
						<input type="text"  name="pg_biorythm_birth_date"  id="pg_biorythm_birth_date" class="input_date" {if $aData.pbd_display_type eq "owner"}value="{$aData.pbd_birth_date}"{else} id="pg_biorythm_birth_date"{/if} readonly="readonly"  /></span>
						{if $aData.pbd_display_type neq "owner"}
						<input type="image" src="{$sPgDir}images/biorythm_ico.gif" alt="calendar icon" class="pg_biorythm_calendaricon" />
						{/if}
						
					</p>
					<p>
						<label>Target Date</label>
						<span class="pg_biorythm_calendarborder""><input type="text" style="width:60px;" name="pg_biorythm_target_date" id="pg_biorythm_target_date" value="{$targetDate}" class="input_date" readonly="readonly"  /></span>
						<input type="image" src="{$sPgDir}images/biorythm_ico.gif" alt="calendar icon" class="pg_biorythm_calendaricon" /> 
						
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


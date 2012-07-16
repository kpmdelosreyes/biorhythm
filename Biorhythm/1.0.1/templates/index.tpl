					<input type="hidden" name="PG_biorythm_url" value="{$sUrl}" id="PG_biorythm_url"/>
					<input type="hidden" name="PG_biorythm_dir" value="{$sPgDir}" id="PG_biorythm_dir"/>
					<div class="biorythm">
					   <h5>{if $aData}{$aData.pbd_title}{else}Biorythm Plug-in{/if}</h5>
						{if $aData.pbd_display_type eq 'owner'}
						<div id="pg_biorythm_result">{$biorythm}</div>
						{else}
						<ul class="owner_info">
                            <li class="label">Name</li>
                            <li><input tyle="text" name="pg_biorythm_owner_name" id="pg_biorythm_owner_name"  class="input" /></li>
                            <li class="label">Birth Date</li>
                            <li>
                                <input tyle="text" name="pg_biorythm_birth_date" id="pg_biorythm_birth_date" class="input_date" readonly />
                                <a href="#"><img src="{$sPgDir}img/ico_calendar.gif" alt="" class="img_calendar" /></a>
                            </li>
                            <li class="label">Target Date</li>
                            <li>
                                <input tyle="text" name="pg_biorythm_target_date" id="pg_biorythm_target_date" value="{$targetDate}" class="input_date" readonly />
                                <a href="#"><img src="{$sPgDir}img/ico_calendar.gif" alt="" class="img_calendar" /></a>
                            </li>
                        </ul>
                        <p class="btn">
                            <span class="btn_01"><input type="button" name="" value="View Results" onclick="PLUGIN_Biorythm.viewResult()" /></span>
                            <span id="pg_biorythm_ajax_loader"></span>
                        </p>
                        <div id="pg_biorythm_result">&nbsp;</div>
					    {/if}
					</div>
<div id="biorythm_view_result" style="float:left;" >
	<div id="biorythm_result">
		<ul>
			<li>
				<span class="icon"><img src="{$sPgDir}images/{$aResult.physical.icon}.png" class="" /></span>
				<span class="bio" id="physical">Physical : {$aResult.physical.percent}%</span>	
			</li>
			<li>
				<span class="icon"><img src="{$sPgDir}images/{$aResult.emotional.icon}.png" class="" /></span>
				<span class="bio" id="emotional">Emotional : {$aResult.emotional.percent}%</span>
			</li>
			<li>
				<span class="icon"><img src="{$sPgDir}images/{$aResult.intellectual.icon}.png" class="" /></span>
				<span class="bio" id="intellectual">Intellectual : {$aResult.intellectual.percent}%</span>
			</li>
			<li>
				<span class="icon"><img src="{$sPgDir}images/{$avgIcon}.png" class="" /></span>
				<span class="bio" id="average">Average : {$avg}%</span>
			</li>
		</ul>
	</div>
	<div id="biorythm_result1">
		<div id="img_area">
			<img src="{$imgSrc}">
		</div>
		<div id="biorythm_percent">
			<ul class="ave">
				<li>100%</li>
				<li>50%</li>
				<li>mid</li>
				<li>-50%</li>
				<li>-100%</li>
			</ul>
		</div>
	</div>
</div>

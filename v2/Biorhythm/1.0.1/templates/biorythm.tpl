<div id="biorythm_view_result">
	<div id="biorythm_result">
		<span class="icon"><img src="{$sPgDir}img/{$aResult.physical.icon}.png" class="" /></span><span class="bio" id="physical">Physical : {$aResult.physical.percent}%</span>
		<span class="icon"><img src="{$sPgDir}img/{$aResult.emotional.icon}.png" class="" /></span><span class="bio" id="emotional">Emotional : {$aResult.emotional.percent}%</span>
		<span class="icon"><img src="{$sPgDir}img/{$aResult.intellectual.icon}.png" class="" /></span><span class="bio" id="intellectual">Intellectual : {$aResult.intellectual.percent}%</span>
		<span class="icon"><img src="{$sPgDir}img/{$avgIcon}.png" class="" /></span><span class="bio" id="average">Average : {$avg}%</span>
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
			<img src="{$imgSrc}">
		</div>
	</div>
</div>

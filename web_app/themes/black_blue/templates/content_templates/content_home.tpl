
{if not empty( $all_achievements )}
	
	<ul id="achievements">
		{foreach from=$all_achievements item=achievement}
			
			<li>
				<div class="filler" style="width: {$achievement.percent}"></div>
				<div class="container">
					<p>
						<strong>{$achievement.name}</strong>
						<span>{$achievement.desc}</strong>
					</p>
					
					<span class="icon">
						<img src="public/achievement_images/{$achievement.icon}" alt="" width="64" height="64">
					</span>
					
					<div class="tokens">
						<strong>{$achievement.tokens} {$Lang.tokens}</strong>
						<span class="date">
							<b>{$achievement.percent}</b> ( <b>{$achievement.players_unlocked}</b> ) {$Lang.players_earned_this}
						</span>
					</div>
				</div>
			</li>
		{/foreach}
	</ul>
{else}
	<div class="error">
		<p>{$Lang.no_achievements_yet}</p>
	</div>
{/if}
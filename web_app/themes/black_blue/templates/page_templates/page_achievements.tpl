

<div class="achievements-header">
	<h3>{$category_name}</h3>
		<p>{$Lang.cat_completed}</p>
		
	<div class="pbarc">
		<span>{$achievements_unlocked} / {$total_achievements } ( {$completion}% )</span>
		<div class="pbar" style="width: {$completion}%"></div>
	</div>

</div>

<ul id="achievements">
	
	{foreach $completed_achievements as $achievement => $value}
		
		<li class="ac {$value.locked}">
			<p>
				<strong>{$value.name}</strong>
				<span>{$value.desc}</span>
			</p>
			
			{if $value.showbar}
				<div class="pbarc small ac">
					<span>{$value.completed} / {$value.max} ({$value.percent})%</span>
					<div class="pbar" style="width: {$value.percent}%;"></div>
				</div>
			{/if}
			
			<span class="icon">
				<img src="public/achievement_images/{$value.icon}" alt="" width="64" height="64">
			</span>
				
				
			<div class="tokens">
				<strong>{$value.tokens}</strong>
				<span class="date">{$value.date}</span>
			</div>
		</li>
	{/foreach}
</ul>
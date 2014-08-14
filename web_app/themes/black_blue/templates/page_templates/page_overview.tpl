

<div class="achievements-header min-350">
	<h3>{$Lang.achievements_ovr}</h3>
	
	<a class="total-achievements" href="{$achievements_total_url}">
		<p>{$Lang.achievements_completed}</p>
		
		<div class="pbarc medium">
			<span>{$achievements_unlocked} / {$achievements_total} ({$achievements_ratio}%)</span>
			<div class="pbar" style="width: {$achievements_ratio}%;"></div>
		</div>
	</a>
	
	<div class="achievement-cat-container">
		
		{foreach $achievement_categories as $category => $value}
			
			<a class="achievement-cat" href="{$value.url}">
				<h5>{$value.name}</h5>
				<div class="pbarc small">
					{if $value.total_achievements neq 0}
						<span>{$value.total_unlocks} / {$value.total_achievements} ({$value.ratio}%)</span>
					{else}
						<span>{$Lang.no_achievements}</span>
					{/if}
					<div class="pbar" style="width: {$value.ratio}%;"></div>
				</div>
			</a>
		{/foreach}
		
		
		<div style="clear: both;"></div>
		
	</div>
</div>
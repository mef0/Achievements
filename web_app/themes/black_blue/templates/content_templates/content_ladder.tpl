<table class="top3">
	
	<tr>
		{for $player = 0 to 2}
			<td>
				{if isset( $ladder_players.$player ) }
					<h3><a href="{$ladder_players.$player.link}">{$ladder_players.$player.name}</a></h3>
					
					<p>{$Lang.tokens_on_server}: <strong>{$ladder_players.$player.tokens}</strong></p>
				{else}
					<h3><a href="{$script_name}#noPlayer">{$Lang.noplayer}</a></h3>
					<p>---</p>
				{/if}
			</td>
		{/for}
	</tr>
	
</table>

<table class="topstandard">

	<tr>
		<th>{$Lang.ldrtable_id}</th>
		<th>{$Lang.ldrtable_name}</th>
		<th>{$Lang.ldrtable_tokens}</th>
	</tr>
	
	{if $ladder_players|@count gt 0}
		{foreach  $ladder_players as $player => $val}
			{if $player gt 2 } 
				<tr>
					<td>{$val.rank|@ordinal}</td>
					<td><a href="{$val.link}">{$val.name}</a></td>
					<td>{$val.tokens}</td>
				</tr>
			{/if}
		{/foreach}
	{else}
		<tr>
			<td colspan="3">{$Lang.ldrtable_nomoreplayers}</td>
		</tr>
	{/if}
	
</table>
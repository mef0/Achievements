
<h2>{$Lang.searchmsg} ("{$search_string}"):</h2>

<table class="topstandard">

	<tr>
		<th>{$Lang.searchtable_rank} {$server_name}</th>
		<th>{$Lang.searchtable_name}</th>
		<th>{$Lang.searchtable_tokens}</th>
		<th>{$Lang.searchtable_totaltokens}</th>
	</tr>

	
	{foreach $search_results as $player }
		<tr>
			<td>{$player.rank|ordinal}</td>
			<td><a href="{$player.url}" target="_blank">{$player.name}</a></td>
			<td>{$player.tokens}</td>
			<td>{$player.total_tokens}</td>
		</tr>
	{foreachelse}
		
		<tr>
			<td colspan="4">
				{if $too_short eq 1}
					{$Lang.searchshort}
				{else}
					{$Lang.noresults}
				{/if}
			</td>
		</tr>

	{/foreach}
</table>
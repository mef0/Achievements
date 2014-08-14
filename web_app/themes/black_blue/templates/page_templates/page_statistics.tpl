

<div class="achievements-header min-500">
	<h3>{$Lang.stats_header} {$server_name}</h3>
	
	<table class="stats-table">
		<tr>
			<td>{$Lang.stats_totalac}</td>
			<td>{$player.total_achievements}</td>
		</tr>
		
		<tr>
			<td>{$Lang.stats_playtime}</td>
			<td>{$player.play_hours} hours</td>
		</tr>
		
		<tr>
			<td>{$Lang.stats_name}</td>
			<td>{$player.name}</td>
		</tr>
		
		<tr>
			<td>{$Lang.stats_lconnection}</td>
			<td>{$player.last_connection}</td>
		</tr>
		
		<tr>
			<td>{$Lang.stats_fconnection}</td>
			<td>{$player.first_connection}</td>
		</tr>
		
		<tr>
			<td>{$Lang.stats_tconnections}</td>
			<td>{$player.total_connections} connections</td>
		</tr>
	</table>
	
	<table class="stats-table">
		<tr>
			<td>{$Lang.stats_kills}</td>
			<td>{$player.kills}</td>
		</tr>
		
		<tr>
			<td>{$Lang.stats_deaths}</td>
			<td>{$player.deaths}</td>
		</tr>
		
		<tr>
			<td>{$Lang.stats_suicides}</td>
			<td>{$player.suicides}</td>
		</tr>
		
		<tr>
			<td>{$Lang.stats_kd}</td>
			<td>{$player.kdr}</td>
		</tr>
	</table>
</div>
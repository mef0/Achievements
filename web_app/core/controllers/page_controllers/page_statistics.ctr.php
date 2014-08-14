<?php

$plr_achievements = $achievements -> getSinglePlayerAchievementsStatus( $achievements -> player_auth );
$plr_statistics = $achievements -> getSinglePlayerByAuth( $achievements -> player_auth );

$player[ 'total_achievements' ] = 0;

if( !is_array( $plr_achievements ) ) $plr_achievements = array( );

foreach( $plr_achievements AS $achievement => $value )
{
	if( $value[ 'unlocked_date' ] > 0 )
	{
		$player[ 'total_achievements' ] ++;
	}
}

$player[ 'play_hours' ] = round( $plr_statistics[ 'playtime' ] / 60, 1 );
$player[ 'name' ] = $plr_statistics[ 'name' ];
$player[ 'last_connection' ] = date( $format, $plr_statistics[ 'lastconnection' ] );
$player[ 'first_connection' ] = date( $format, $plr_statistics[ 'firstconnection' ] );
$player[ 'total_connections' ] = $plr_statistics[ 'totalconnections' ];

$player[ 'kills' ] = $plr_statistics[ 'kills' ];
$player[ 'deaths' ] = $plr_statistics[ 'deaths' ];
$player[ 'suicides' ] = $plr_statistics[ 'suicides' ];
$player[ 'kdr' ] = $plr_statistics[ 'deaths' ] > 0 ? round( $plr_statistics[ 'kills' ] / $plr_statistics[ 'deaths' ], 2 ) : 0.00;

$smarty -> assignSingleVariable( "player", $player );
?>
<?php

$new_achievements = array( );
$all_achievements = $achievements -> getAchievements( ) or array( );

$achievement_completions = array( );
$new_achievements = array( );

if( !empty( $all_achievements ) )
{
	foreach( $all_achievements AS $achievement => $value )
	{
		$achievement_completions[ ] = $value[ 'column' ];
	}

	$achievement_completions = $achievements -> getPlayerAchievementsCompletion( $achievement_completions );
	$players_total = $achievement_completions[ 'TOTAL_RECORDS' ];



	foreach ( $all_achievements AS $achievement => $value )
	{
		
		$d = $players_total == 0 ? 0 : ( $achievement_completions[ $value[ 'column' ] ] / $players_total );
		
		array_push( $new_achievements, array( 
				'name' 				=> $value[ 'name' ],
				'desc'				=> $value[ 'desc' ],
				'icon'				=> $value[ 'icon' ],
				'tokens'			=> $value[ 'tokens' ],
				'percent'			=> round( ( $d ) * 100, 1 ) . "%",
				'players_unlocked'	=> $achievement_completions[ $value[ 'column' ] ]
			)
		);
	}
	
	$new_achievements = ACLIB :: ArrSort( $new_achievements, 'players_unlocked' );
}

$smarty -> assign( "all_achievements", $new_achievements );

?>
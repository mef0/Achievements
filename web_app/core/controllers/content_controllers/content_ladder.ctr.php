<?php


$top_players = $achievements -> getTopPlayers( );

if( !empty( $top_players ) )
{
	$x = 0;
	foreach( $top_players as $player => $value )
	{
		$top_players[ $player ][ 'rank' ] = $x + 1;
		$top_players[ $player ][ 'link' ] = ACLIB :: BuildUrl( '', array( 'plr' => $value[ 'plrid' ] ), 'ovr' );
		
		$x ++;
	}
}

$smarty -> assign( "ladder_players", $top_players );

?>
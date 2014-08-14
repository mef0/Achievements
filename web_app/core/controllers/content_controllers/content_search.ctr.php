<?php

$search_string = mysql_real_escape_string( $_GET[ 'searchinput' ] );

if( strlen( $search_string ) < 3 )
{
	$smarty -> assign( "too_short", 1 );
}
else
{
	$smarty -> assign( "too_short", 0 );
	$search_results = $achievements -> searchForPlayers( $search_string );
}

if( !empty( $search_results ) )
{
	foreach( $search_results AS $result => $value )
	{
		$search_results[ $result ][ 'url' ] = ACLIB :: BuildUrl( '', array( "plr" => $value[ 'plrid' ] ), 'ovr' );
	}
}
else
{
	$search_results = array( );
}


$smarty -> assign( "search_string", $search_string );
$smarty -> assign( "search_results", $search_results );

?>
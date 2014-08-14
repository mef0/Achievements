<?php

$achievements_total_url = ACLIB :: BuildUrl( '', array( "cat_id" => "0", "plr" => $achievements -> player_id ), 'cat' );

$player_achievements = $achievements -> getSinglePlayerAchievementsStatus( $achievements -> player_auth );
if( !is_array( $player_achievements ) ) $player_achievements = array( );


$achievements_unlocked = 0;
$achievements_total = 0;

$all_categories = $achievements -> getAllCategories( );

$category_achievements = array( );

foreach( $player_achievements AS $achievement => $value )
{
	
	
	if( !isset( $category_achievements[ $value[ 'cat' ] ][ 'unlocked' ] ) )
	{
		$category_achievements[ $value[ 'cat' ] ] = array( );
		$category_achievements[ $value[ 'cat' ] ][ 'unlocked' ] = 0;
		$category_achievements[ $value[ 'cat' ] ][ 'total' ] = 0;
	}
	
	if( $value[ 'unlocked_date' ] )
	{
		$achievements_unlocked ++;
		$category_achievements[ $value[ 'cat' ] ][ 'unlocked' ] ++;
	}
	
	$category_achievements[ $value[ 'cat' ] ][ 'total' ] ++;
	$achievements_total ++;
}



$final_categories = array( );
foreach( $all_categories AS $category => $value )
{
	
	$final_categories[ $category ][ 'url' ] = ACLIB :: BuildUrl( '', array( "cat_id" => $category, "plr" => $achievements -> player_id ), 'cat' );
	$final_categories[ $category ][ 'name' ] = $value;
	
	if( isset( $category_achievements[ $category ][ 'total' ] ) )
	{
		$final_categories[ $category ][ 'total_unlocks' ] = $category_achievements[ $category ][ 'unlocked' ];
		
		$final_categories[ $category ][ 'total_achievements' ] = $category_achievements[ $category ][ 'total' ];
		$final_categories[ $category ][ 'ratio' ] = $category_achievements[ $category ][ 'total' ] > 0 ? ( round( ( $category_achievements[ $category ][ 'unlocked' ] / $category_achievements[ $category ][ 'total' ] ) * 100, 1 ) ) : 0.0;
	}
	else
	{
		$final_categories[ $category ][ 'total_achievements' ] = 0;
		$final_categories[ $category ][ 'ratio' ] = 0.0;
	}
}

$smarty -> assign( "achievements_total_url", $achievements_total_url );
$smarty -> assign( "achievements_unlocked", $achievements_unlocked );
$smarty -> assign( "achievements_total", $achievements_total );
$smarty -> assign( "achievements_ratio", $achievements_total > 0 ? ( round( ( $achievements_unlocked / $achievements_total ) * 100, 1 ) ) : 0.0 );
$smarty -> assign( "achievement_categories", $final_categories );
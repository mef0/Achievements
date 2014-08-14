<?php

$__CAT = ( isset( $_GET[ 'cat_id' ] ) && is_numeric( $_GET[ 'cat_id' ] ) ) ? $_GET[ 'cat_id' ] : 0;

foreach( $achievements -> getAllCategories( ) AS $category => $value )
{
	if( $category == $__CAT )
	{
		$category_name = $value;
		break;
	}
}

if( !isset( $category_name ) )
{
	$category_name = "All Achievements";
	$__CAT = 0;
}

$achievements_in_category = $achievements -> getAchievementsInCategory( $__CAT );
$achievements_plr_status = $achievements -> getSinglePlayerAchievementsStatus( $achievements -> player_auth );

if( !is_array( $achievements_in_category ) )
	$achievements_in_category = array( );

$completed_achievements = array( );

$total_achievements = 0;
$achievements_unlocked = 0;

foreach( $achievements_in_category AS $achievement => $value )
{
	$column = $value[ 'column' ];
	$locked = $achievements_plr_status[ $column ][ 'unlocked_date' ] == 0 ? true : false;
	
	$total_achievements ++;
	$completed_achievements[ $column ][ 'showbar' ] = false;
	$completed_achievements[ $column ][ 'locked' ] = '';
	if( $locked )
	{
		$completed_achievements[ $column ][ 'locked' ] = "locked";
		
		if( $value[ 'value' ] )
		{
			$completed_achievements[ $column ][ 'showbar' ] = true;
			$completed_achievements[ $column ][ 'completed' ] = $achievements_plr_status[ $column ][ 'progress' ];
			$completed_achievements[ $column ][ 'max' ] = $value[ 'max' ];
			$completed_achievements[ $column ][ 'percent' ] = $value[ 'max' ] > 0 ? ( round( ( $achievements_plr_status[ $column ][ 'progress' ] / $value[ 'max' ] ) * 100, 1 ) ) : 0.0;
		}
	}
	else
	{
		$achievements_unlocked ++;
	}
	
	$completed_achievements[ $column ][ 'name' ] = $value[ 'name' ];
	$completed_achievements[ $column ][ 'desc' ] = $value[ 'desc' ];
	$completed_achievements[ $column ][ 'tokens' ] = $value[ 'tokens' ];
	$completed_achievements[ $column ][ 'icon' ] = $value[ 'icon' ];
	$completed_achievements[ $column ][ 'date' ] = $locked ? "0" : date( $format, $achievements_plr_status[ $column ][ 'unlocked_date' ] );
}

$completed_achievements = ACLIB :: ArrSort( $completed_achievements, "date" );

foreach( $completed_achievements AS $achievement => $value )
{
	if( $value[ 'date' ] == "0" )
	{
		$completed_achievements[ $achievement ][ 'date' ] = $Lang[ 'achievement_locked' ];
	}
}

$smarty -> assignSingleVariable( "category_name", $category_name );
$smarty -> assignSingleVariable( "total_achievements", $total_achievements );
$smarty -> assignSingleVariable( "achievements_unlocked", $achievements_unlocked );
$smarty -> assignSingleVariable( "completion", $total_achievements > 0 ? ( round( ( $achievements_unlocked / $total_achievements ) * 100, 1 ) ) : 0.0 );

$smarty -> assignSingleVariable( "completed_achievements", $completed_achievements );
	
<?php

$player_row = $achievements -> getSinglePlayerByAuth( $achievements -> player_auth );

$player[ 'name' ] = $player_row[ 'name' ];
$player[ 'tokens' ] = $player_row[ 'total_tokens' ];
$player[ 'auth' ] = $player_row[ 'player_auth' ];
$player[ 'stokens' ] = $player_row[ 'tokens' ];
$player[ 'rank' ] = $achievements -> getPlayerRankOnServer( $achievements -> player_auth );

$__PAGE = $achievements -> page;


$ovr_classes = '';
$aac_classes = '';

$page_file = '';

if( $__PAGE == 'ovr' )
{
	$overview = $Lang[ 'overview' ];
	$all_ac = $Lang[ 'all_achievements' ].' <span class="arr2">&rsaquo;&nbsp;</span>';
	$ovr_classes = 'current';
	
	$page_file = 'page_overview';
}
else if( $__PAGE == 'cat' && isset( $_GET[ 'cat_id' ] ) && $_GET[ 'cat_id' ] != 0 )
{
	$overview = '<span class="arr">&lsaquo;&nbsp;</span> '.$Lang[ 'overview' ];
	$all_ac = '<span class="arr">&lsaquo;&nbsp;</span> '.$Lang[ 'all_achievements' ];
	
	$page_file = 'page_achievements';
}

else if( $__PAGE == 'sts' )
{
	$overview = '<span class="arr">&lsaquo;&nbsp;</span> '.$Lang[ 'overview' ];
	$all_ac = '<span class="arr">&lsaquo;&nbsp;</span> '.$Lang[ 'all_achievements' ];
	
	$page_file = 'page_statistics';
}

else
{
	$overview = '<span class="arr">&lsaquo;&nbsp;</span> '.$Lang[ 'overview' ];
	$all_ac = $Lang[ 'all_achievements' ];
	$aac_classes = 'current';
	
	$page_file = 'page_achievements';
}


$menuitem[ ] = array( "classes" => $ovr_classes, "url" => ACLIB :: BuildUrl( '', array( 'plr' => $achievements -> player_id ), 'ovr' ), "name" => $overview );
$menuitem[ ] = array( "classes" => $aac_classes, "url" => ACLIB :: Buildurl( '', array( 'plr' => $achievements -> player_id ), 'cat' ), "name" => $all_ac );


$all_categories = $achievements -> getAllCategories( );
if( !empty( $all_categories ) )
{
	
	$arr = "<span class='arr2'>&rsaquo;&nbsp;</span>";
	
	foreach( $all_categories AS $category => $value )
	{
		
		$class = '';
		$show_arr = true;
		
		if( isset( $_GET[ 'cat_id' ] ) && $_GET[ 'cat_id' ] == $category )
		{
			$class = "current";
			$show_arr = false;
		}
		
		$cat_name = $value;
		
		if( $show_arr ) $cat_name .= $arr;
		
		$menuitem[ ] = array(
			"classes" => $class,
			"url" => ACLIB :: BuildUrl( '', array( 
				'plr' => $achievements -> player_id, 
				'cat_id' => $category ), 
				'cat' 
			),
			
			"name" => $cat_name
		);
	}
}


$tab_achievements_class = $__PAGE == 'sts' ? '' : 'tab-active';
$tab_statistics_class = $__PAGE == 'sts' ? 'tab-active' : '';

$tab_achievements_url = ACLIB :: BuildUrl( '', array( 'plr' => $achievements -> player_id ), 'ovr' );
$tab_statistics_url = ACLIB :: BuildUrl( '', array( 'plr' => $achievements -> player_id ), 'sts' );

$smarty -> assign( "player", $player );
$smarty -> assign( "menuitems", $menuitem );
$smarty -> assign( "tab_achievements_class", $tab_achievements_class );
$smarty -> assign( "tab_achievements_url", $tab_achievements_url );
$smarty -> assign( "tab_statistics_class", $tab_statistics_class );
$smarty -> assign( "tab_statistics_url", $tab_statistics_url );

$smarty -> assign( "page_file", $page_file );

require_once __ROOT__."core/controllers/page_controllers/".$page_file.".ctr.php";

?>
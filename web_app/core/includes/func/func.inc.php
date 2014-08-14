<?php


class ACLIB
{
	public static function ArrSort($array, $key, $sort_flags = SORT_REGULAR) {
    if (is_array($array) && count($array) > 0) {
        if (!empty($key)) {
            $mapping = array();
            foreach ($array as $k => $v) {
                $sort_key = '';
                if (!is_array($key)) {
                    $sort_key = $v[$key];
                } else {
                    // @TODO This should be fixed, now it will be sorted as string
                    foreach ($key as $key_key) {
                        $sort_key .= $v[$key_key];
                    }
                    $sort_flags = SORT_STRING;
                }
                $mapping[$k] = $sort_key;
            }
			
            arsort($mapping, $sort_flags);
            $sorted = array();
            foreach ($mapping as $k => $v) {
                $sorted[] = $array[$k];
            }
            return $sorted;
        }
    }
    return $array;
}
	
	public static function GetArrCount ($arr, $depth=1) { 
		if (!is_array($arr) || !$depth) return 0; 
		
		$res=count($arr); 
		
		foreach ($arr as $in_ar) 
		$res+=self :: GetArrCount($in_ar, $depth-1); 
		
		return $res; 
	} 
	
	public static function OrdinalSuffix( $num ) {
		if($num < 11 || $num > 13){
			switch($num % 10){
				case 1: return 'st';
				case 2: return 'nd';
				case 3: return 'rd';
			}
		}
		return 'th';
	}
	
	public static function GetContent( )
	{
		$page = isset( $_GET[ 'pg' ] ) ? $_GET[ 'pg' ] : '';
		
		global $achievements;
		global $smarty;
		
		$exists = isset( $_GET[ 'plr' ] ) ? $achievements -> playerExists( mysql_real_escape_string(  $_GET[ 'plr' ] ) ) : false;
		if( ( $page == 'cat' || $page == 'ovr' || $page == 'sts' ) && !$exists )
		{
			$smarty -> displayPageError( "Wrong Player", "Sorry, this player doesn't exist or have any record on this server. Try changing the server from the top menu." );
			
			return 'content_error';
		}
		
		if( !$page )
		{
			return 'content_home';
		}
		
		switch( $page )
		{
			case 'hom':		return 'content_home'; break;
			case 'ldr':		return 'content_ladder'; break;
			
			case 'cat': /* OR */ 
			case 'ovr': /* OR */ 
			case 'sts':		return 'content_player'; break;
			
			case 'sch':		return 'content_search'; break;
			
			default: die( "Access denied" );
		}
	}
	
	public static function GetPage( )
	{
		
		if( !isset( $_GET[ 'pg' ] ) )
			return 'NONE';
		
		$page = $_GET[ 'pg' ];
		
		switch( $page )
		{
			case 'cat': return 'page_achievements'; break;
			case 'ovr': return 'page_overview'; break;
			case 'sts': return 'page_statistics'; break;
			
			default: return 'NONE';
		}
		
		return 'NONE';
	} 
	
	
	public static function GetServers(  )
	{
		global $servers;
		$servers_loop = array( );
		
		$array = isset( $_GET[ 'plr' ] ) ? array( "plr" => $_GET[ 'plr' ] ) : array( );
		
		if( isset( $_GET[ 'searchinput' ] ) )
			$array[ 'searchinput' ] = $_GET[ 'searchinput' ];
		
		foreach( $servers AS $server => $value )
		{
			
			$url = self :: BuildUrl( $server, $array, ( isset( $_GET[ 'pg' ] ) && self :: IsPageValid( $_GET[ 'pg' ] ) ) ? '' : 'hom'  );
			
			//array_push( $servers_loop, array( $value => 'index.php?'.$url ) );
			
			$servers_loop[ $value ] = $url;
		}
		
		return $servers_loop;
	}
	
	public static function IsPageValid( $page )
	{
		$valid_pages = array( 'hom', 'ldr', 'sch', 'ovr', 'cat', 'sts' );
	
		return in_array( $page, $valid_pages ) ? true : false;
	}
	
	public static function BuildUrl( $server = '', $arguments = array( ), $page = '' )
	{
		
		if( !$server && isset( $_GET[ 'server' ] ) )
		{
			$server = mysql_real_escape_string( $_GET[ 'server' ] );
		}
		
		if( !$page && isset( $_GET[ 'pg' ] ) )
		{
			$page = mysql_real_escape_string( $_GET[ 'pg' ] );
		}
		
		global $friendly_urls;
		global $website_url;
		
		if( $friendly_urls && strpos( $_SERVER[ 'REQUEST_URI' ], "&" ) === FALSE )
		{
			$link = "$website_url/$server/";
			
			if( $page == 'cat' )
			{
				$category = ( isset( $arguments[ 'cat_id' ] ) && $arguments[ 'cat_id' ] != 0 ) ? "category/".$arguments[ 'cat_id' ] : "all_achievements";
			}
			
			$player = isset( $arguments[ 'plr' ] ) ? $arguments[ 'plr' ] : '';
			
			$input = isset( $arguments[ 'searchinput' ] ) ? $arguments[ 'searchinput' ] : '';
			
			switch( $page )
			{
				case 'hom':		$link .= "home/"; break;
				case 'ldr':		$link .= "leaderboards/"; break;
				case 'ovr':		$link .= "player/". $player."/overview"; break;
				case 'sts':		$link .= "player/". $player."/statistics"; break;
				case 'cat':		$link .= "player/". $player."/$category"; break;
				case 'sch':		$link .= "search/$input"; break;
			}
		
			return $link;
		}
		
		$linkarr = array(  'pg' => $page, 'server' => $server );
		
		if( isset( $_GET[ 'simplified' ] ) )
			$linkarr[ 'simplified' ] = 1;
		
		if( !empty( $arguments ) )
		{
			foreach( $arguments as $argument => $value )
			{
				$linkarr[ $argument ] = $value;
			}
		}
		
		$link = http_build_query( $linkarr );
		
		return "index.php?".$link;
	}
}

?>
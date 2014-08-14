<?php

class Achievements
{
	
	const SEARCH_LIMIT	=	200;
	const LADDER_LIMIT	=	200;
	
	const GLOBAL_TABLE 	=	"ac_global";
	
	public $all_achievements;
	public $all_categories;
	
	public $server;
	public $server_name;
	public $server_exists;
	
	public $player_auth;
	public $player_id;
	public $page;
	
	public $dbh;
	
	public function __construct( )
	{
		
		global $db;
		global $servers;
		
		$this -> dbh = $db;
		
		$this -> server = isset( $_GET[ 'server' ] ) ? mysql_real_escape_string( $_GET[ 'server' ] ) : '';
		$this -> server_name = @$servers[ $this -> server ];
		
		
		if( !$this -> server_name ) 
		{
			$this -> server_name = 'NONE';
		}
		
		
		$s = $db -> Query( "SHOW TABLES LIKE 'ac_{$this->server}_data2'" );
		$this -> server_exists = $db -> RowCount( ) == 1 ? true : false;
		
		if( $this -> server_exists ) 
		{
			$this -> all_achievements = @$this -> dbh -> QueryArray( "SELECT * FROM ac_{$this->server}_list" );
			$category_results = $this -> dbh -> QueryArray( "SELECT * FROM ac_{$this->server}_cats ORDER BY cat_id ASC" );
			
			if( !is_array( $category_results ) )
				$category_results = array( );
			
			$categories = array( );
			foreach( $category_results AS $category => $result )
			{
				$categories[ $result[ 'cat_id' ] ] = $result[ 'cat_name' ];
			}
			
			$this -> all_categories = $categories;
				
		}
		else
		{
			$this -> server_name = 'NONE';
		}
		
		$this -> player_auth = 'NO_PLAYER';
		$this -> player_id = 0;
		
		
		if( isset( $_GET[ 'plr' ] ) )
		{
			
			$player = mysql_real_escape_string( $_GET[ 'plr' ] );
			$exists = $this -> playerExistsById( $player );
			
			
			if( $exists ) 
			{	
				$this -> player_auth = $exists;
				$this -> player_id = $player;
			}
		}
		
		
		$this -> page = isset( $_GET[ 'pg' ] ) ? $_GET[ 'pg' ] : 'hom';
	}
	
	public function getAchievements( $get_all = true, $which = array( ) )
	{
		if( $get_all )
		{
			return $this -> all_achievements;
		}
		
		else
		{
			$achievements = array( );
			
			$achievements_object = $this -> all_achievements;
			
			foreach( $achievements_object AS $achievement => $value )
			{
				if( in_array( $value[ 'column' ], $which ) )
				{
					array_push( $achievements, $achievements_object[ $achievement ] );
				}
			}
			
			return $achievements;
		}
	
	}
	
	public function getPlayerAchievementsCompletion( $achievements_array )
	{
		
		$query = "SELECT value_id, sum( value_extra > 0 ) AS total FROM ac_{$this->server}_data2 WHERE value_id NOT LIKE 'stats_%' GROUP BY value_id";
		$result = $this -> dbh -> QueryArray( $query );
		
		$player_unlocks = array( );
		
		echo "<pre>".print_r( $result )."</pre>";
		
		foreach( $result as $k => $v )
		{
			echo "$k:$v<br>";
		}
		
		return 0;
	}
	
	public function getSinglePlayerAchievementsStatus( $player_auth )
	{
		$query = "SELECT * FROM ac_{$this->server}_data WHERE player_auth='$player_auth'";
		$result = $this -> dbh -> QuerySingleRowArray( $query );
		
		if( empty( $result ) )
		{
			return 0;
		}
		
		$player_achievements = array( );
		$all_achievements = $this -> getAchievements( );
		
		foreach( $result AS $achievement => $value )
		{
			if( $achievement == 'player_auth' || is_numeric( $achievement ) )
				continue;
			
			if( strpos( $achievement, "num_" ) !== false )
			{
				$player_achievements[ str_replace( "num_", "", $achievement ) ][ 'progress' ] = $value;
				continue;
			}
			
			$player_achievements[ $achievement ][ 'unlocked_date' ] = $value;
			
			foreach( $all_achievements AS $achievement2 => $value2 )
			{
				if( $value2[ 'column' ] == $achievement )
				{
					$player_achievements[ $achievement ][ 'cat' ] = $value2[ 'cat' ];
					break;
				}
			}
		}
		
		return $player_achievements;
	}
	
	public function getPlayerId( $player_auth )
	{
		$query = "SELECT plrid FROM ac_{$this->server}_plrdata WHERE player_auth='$player_auth'";
		return $this -> dbh -> QuerySingleValue( $query );
	}
		
	
	public function getSinglePlayerByAuth( $player_auth )
	{
		$query = 	"SELECT g.total_tokens, g.name, d.*, pd.*
		
					FROM ". self :: GLOBAL_TABLE ." g
					
					LEFT JOIN ac_{$this -> server}_data d
					ON d.player_auth = g.player_auth
					
					LEFT JOIN ac_{$this -> server}_plrdata pd
					ON pd.player_auth = g.player_auth
					
					WHERE g.player_auth = '$player_auth'
					";
						
		$result =  $this -> dbh -> QuerySingleRowArray( $query );
		
		$result[ 'name' ] = htmlentities( $result[ 'name' ] );
		return $result;
	}
	
	public function getPlayerRankOnServer( $player, $server = '' )
	{
		
		if( !$server ) $server = $this -> server;
		
		$query = "
			SELECT
				t.rank
			FROM
				(SELECT
					@rank:=@rank+1 AS rank, player_auth
				FROM
					ac_{$server}_plrdata, (SELECT @rank := 0) r
				ORDER BY 
					tokens DESC
				) t
			
			WHERE t.player_auth = '$player'";
			
		$result = $this -> dbh -> QuerySingleRowArray( $query );
		
		return $result[ 'rank' ];
	}
		
	public function getTopPlayers( $max = self :: LADDER_LIMIT )
	{
		
		$query = "	SELECT ". self :: GLOBAL_TABLE .".player_auth, ". self :: GLOBAL_TABLE .".name, ac_{$this->server}_plrdata.plrid, ac_{$this -> server}_plrdata.player_auth, ac_{$this -> server}_plrdata.tokens 
					FROM ac_{$this -> server}_plrdata 
					
					LEFT JOIN ". self :: GLOBAL_TABLE ."
					ON ". self :: GLOBAL_TABLE .".player_auth = ac_{$this -> server}_plrdata.player_auth 
					
					ORDER BY ac_{$this -> server}_plrdata.tokens DESC LIMIT 0, ". self :: LADDER_LIMIT;
					
					
					
		$result = $this -> dbh -> QueryArray( $query );
		
		foreach( $result AS $player => $value )
		{
			$result[ $player ][ 'name' ] = htmlentities( $value[ 'name' ] );
		}
		
		return $result;
	}
		
	
	public function playerExists( $player_auth )
	{
		$query = "SELECT player_auth FROM ac_{$this -> server}_plrdata WHERE player_auth = '$player_auth'";
		$check = $this -> dbh -> QuerySingleValue( $query );
		
		return $this -> dbh -> RowCount( ) != 0 ? true : false;
	}
	
	public function playerExistsById( $player_id )
	{
		$query = "SELECT player_auth FROM ac_{$this -> server}_plrdata WHERE plrid = $player_id";
		$check = $this -> dbh -> QuerySingleValue( $query );
		
		return mysql_real_escape_string( $check );
	}
			
	
	public function getAllCategories( )
	{
		return $this -> all_categories;
	}
	
	public function getAchievementsInCategory( $cat )
	{
		
		if( $cat == 0 )
		{
			return $this -> all_achievements;
		}
		
		$achievements_in_cat = array( );
		
		$achievements = $this -> all_achievements;
		
		foreach( $achievements AS $achievement => $value )
		{
			if( $value[ 'cat' ] == $cat )
			{
				array_push( $achievements_in_cat, $achievements[ $achievement ] );
			}
		}
		
		return $achievements_in_cat;
	}
	
	public function searchForPlayers( $search_string )
	{
		$query = "
		SELECT
			t.rank, 
			". self :: GLOBAL_TABLE .".player_auth, 
			t.tokens, 
			". self :: GLOBAL_TABLE .".total_tokens, 
			". self :: GLOBAL_TABLE .".name,
			t.plrid
		FROM
			(SELECT
				@rank:=@rank+1 AS rank, 
				player_auth, 
				tokens,
				plrid
			FROM
				ac_{$this->server}_plrdata, (SELECT @rank := 0) r
			ORDER BY 
				tokens DESC
			) t
		
		LEFT JOIN ". self :: GLOBAL_TABLE ." 
			ON ". self :: GLOBAL_TABLE .".player_auth = t.player_auth
		
		WHERE ". self :: GLOBAL_TABLE .".player_auth LIKE '%$search_string%' OR ". self :: GLOBAL_TABLE .".name LIKE '%$search_string%'";
		
		return $this -> dbh -> QueryArray( $query );
		
	}
}
<?php

include( "../user/config.php" );
include( "../core/includes/class/mysql.class.php" );

$db = new MySQL( false, $sql_dbname, $sql_host, $sql_user, $sql_pass, $sql_charset, $sql_pcon );
$db -> Open( );

$result = $db -> Query( "CREATE TABLE IF NOT EXISTS `ac_global` (
		`player_identifier` int(11) NOT NULL AUTO_INCREMENT,
		`player_auth` varchar(36) COLLATE utf8_unicode_ci NOT NULL,
		`total_tokens` int(11) NOT NULL,
		`name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
		PRIMARY KEY (`player_identifier`),
		UNIQUE KEY `player_auth` (`player_auth`)
	) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;" );

if( !$result )
{
	die( "MySQL: ".$db -> Error( )."" );
}


foreach( $servers AS $k => $unimportant )
{
	$result = $db -> Query( "CREATE TABLE IF NOT EXISTS `ac_{$k}_list` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`name` varchar(64) NOT NULL,
			`desc` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
			`value_id` varchar(32) NOT NULL,
			`icon` varchar(256) NOT NULL,
			`available` int(11) NOT NULL DEFAULT '1',
			`value` int(11) NOT NULL DEFAULT '0',
			`tokens` int(11) NOT NULL DEFAULT '0',
			`max` int(11) NOT NULL DEFAULT '0',
			`created` int(11) NOT NULL DEFAULT '0',
			`cat` int(11) NOT NULL DEFAULT '0',
			PRIMARY KEY (`id`),
			UNIQUE KEY `id` (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;" );
		
	if( !$result )
	{
		die( "There was an error processing the SQL query. Check if any of the server shorts in config file are incorrect. Only alphanumeric values are allowed." );
	}
	
	$result = $db -> Query( "CREATE TABLE IF NOT EXISTS `ac_{$k}_data` (
			 `player_auth` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
				`value_id` varchar(32) CHARACTER SET latin1 NOT NULL,
				`value_status` int(11) NOT NULL,
				`value_extra` int(11) NOT NULL,
				PRIMARY KEY (`player_auth`,`value_id`),
				KEY `player_auth` (`player_auth`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;");
	
	if( !$result )
	{
		die( "There was an error processing the SQL query. Check if any of the server shorts in config file are incorrect. Only alphanumeric values are allowed." );
	}
	
	$result = $db -> Query( "CREATE TABLE IF NOT EXISTS `ac_{$k}_cats` (
			`cat_id` int(11) NOT NULL AUTO_INCREMENT,
			`cat_name` varchar(32) NOT NULL,
			PRIMARY KEY (`cat_id`),
			UNIQUE KEY `cat_id` (`cat_id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;" );
		
	if( !$result )
	{
		die( "There was an error processing the SQL query. Check if any of the server shorts in config file are incorrect. Only alphanumeric values are allowed." );
	}
}

echo "All missing tables (if there were any) were successfully created.";

?>
<?php

 $sql_host    = "127.0.0.1";		// server hostname; if localhost, use "127.0.0.1" instead of "localhost" for better performance
 $sql_user    = "root";				// user name
 $sql_pass    = "";					// password
 $sql_dbname  = "ac_beta";			// database name
 $sql_charset = "utf8";				// optional character set (i.e. utf8)
 $sql_pcon    = true;				// use persistent connection?
 
 $friendly_urls = true;				// requires mod_rewrite module
 
 $current_theme = 'black_blue';		// template
 $format = "d/m/Y";					// the format the date will be displayed in
 
 
 // the URL the achievements are installed on. Without slash at the end.
 $website_url = 'http://ac28.dev';
 
 /* SERVERS */
 
 $servers = 
	Array
	(
		"zombie" => "Zombie Plague",
		"classic" => "Classic Server"
	);
	
	
 /* SMARTY */
 
 $smarty_debug	= false;					// opens a popup window displaying general template info and all loaded variables
 define( "LANGUAGE_PACKAGE", "english" );	// language files (i.e. "english" will load files from core/language/english/)
 
?>
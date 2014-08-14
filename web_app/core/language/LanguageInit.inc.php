<?php

$ConfigLang = LANGUAGE_PACKAGE;

$Lang = Array( );
$SmartyLang = Array( );

$content = ACLIB :: GetContent( );
$page = ACLIB :: GetPage( );


$dir = dirname( __FILE__ );


$LangFiles = array( 
	"$dir/$ConfigLang/php/$content.lang.php",
	"$dir/$ConfigLang/php/$page.lang.php",
	"$dir/$ConfigLang/php/main.lang.php",
	"$dir/$ConfigLang/smarty/main.lang.php",
	"$dir/$ConfigLang/smarty/$content.lang.php",
	"$dir/$ConfigLang/smarty/$page.lang.php"
);

foreach( $LangFiles as $file )
{
	if( file_exists( $file ) )
	{
		include( $file );
	}
}
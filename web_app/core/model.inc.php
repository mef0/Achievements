<?php

/* Basic Achievements MVC model */

require_once __ROOT__."core/includes/class/mysql.class.php";
require_once __ROOT__."core/includes/smarty/Smarty.class.php";


$db = new MySQL( false, $sql_dbname, $sql_host, $sql_user, $sql_pass, $sql_charset, $sql_pcon );

$success = $db -> Open( );

if( ! $success )
{
	die( "Couldn't establish database connection. Check your configuration file." );
}

$db -> TimerStart( );





require_once __ROOT__."core/includes/achievements/achievements.class.php";
$achievements = new Achievements( );

require_once __ROOT__."core/includes/func/func.inc.php";
require_once __ROOT__."core/controllers/initialize.php";

$smarty = new Controller( );
$smarty -> setTemplateDir( __ROOT__."themes/$current_theme/" );


require_once __ROOT__."/core/language/LanguageInit.inc.php";


require_once __ROOT__."core/controllers/main.ctr.php";
require_once __ROOT__."core/controllers/content_controllers/".ACLIB::GetContent( ).".ctr.php";

$smarty -> debugging = $smarty_debug;
$db -> TimerStop( );

if( isset( $_GET[ 'simplified' ] ) )
	$smarty -> displayTemplate( __ROOT__ . "themes/$current_theme/templates/main_game.tpl" );
else
	$smarty -> displayTemplate( __ROOT__ . "themes/$current_theme/templates/main.tpl" );
?>
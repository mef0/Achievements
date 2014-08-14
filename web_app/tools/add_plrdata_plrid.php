<?php

include( "../user/config.php" );
include( "../core/includes/class/mysql.class.php" );

$db = new MySQL( false, $sql_dbname, $sql_host, $sql_user, $sql_pass, $sql_charset, $sql_pcon );
$db -> Open( );

foreach( $servers AS $k => $unimportant )
{
	$result = $db -> Query( "ALTER IGNORE TABLE  `ac_{$k}_plrdata` ADD COLUMN  `plrid` INT NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (  `plrid` )" );
	
	if( $result )
		echo "Done adding column plrid to table ac_{$k}_plrdata.<br>";
	else
	{
		echo "There was a problem adding column plrid to table ac_{$k}_plrdata. MySQL says: <i>";
		echo $db -> Error( );
		echo "</i><br>";
	}
}

?>
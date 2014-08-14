<?php

	$content = ACLIB :: GetContent( );
		
	$form_link = ACLIB :: BuildUrl( '', array( ), 'sch' );
	
	if( $achievements -> server_exists )
	{
		$url = array( 
			"home" => ACLIB :: BuildUrl( '', array( ), 'hom' ),
			"ldr" => ACLIB :: BuildUrl( '', array( ), 'ldr' )
		);
	}
	else
	{
		$url = array( 
			"home" => "#z",
			"ldr" => "#z"
		);
		
		echo "<script> window.location.hash = 'openServerSelection' </script>";
	}
	
	$template_dir = $smarty -> getTemplateDir( );
	
	$all_ac = $achievements -> getAchievements( );
	$ac_count = ( is_array( $all_ac ) && !empty( $all_ac ) ) ? count( $all_ac ) : 0;
	
	$smarty -> assignSingleVariable( "Lang", $SmartyLang );
	
	$smarty -> assignMultipleVariables( array(
		'page_title' 			=> 	'Achievements v2',
		'server_exists' 		=> 	$achievements -> server_exists,
		'server' 				=> 	$achievements -> server,
		'server_name' 			=> 	$achievements -> server_name,
		'total_achievements'	=>	$ac_count,
		'servers'				=>	ACLIB::GetServers( ),
		'home_page_content'		=> 	( $content != 'content_player' ) ? true : false,
		'content_file'			=>	$content,
		'template_dir'			=> 	$template_dir[ 0 ],
		'form_link'				=> 	$form_link,
		'url'					=>	$url,
		'show_content'			=> $achievements -> server_exists,
		'search_value'			=> isset( $_GET[ 'searchinput' ] ) ? $_GET[ 'searchinput' ] : "Name/Auth",
		'root_path'				=> __ROOT__,
		'relative_path'			=> "themes/$current_theme/",
		'script_name'			=> $_SERVER[ 'REQUEST_URI' ],
		'website_url'			=> $website_url
	) );
	
?>
	
<script type="text/javascript">
	function search_navigate( obj )
	{
		var keyword = obj.value;
		var dst = "<?php echo $achievements -> server; ?>/search/" + keyword;
		window.location = dst;
	}
		
	function formHandler( obj )
	{
		var gid = document.getElementById( 'input_search' );
		
		if( gid.value.length < 3 ) 
		{ 
			alert( '<?php echo $Lang[ 'search_short' ]; ?>' ); 
			return false; 
		}
		
		search_navigate( gid );
		return false;
	}
</script>
<!DOCTYPE html>

<html>
	<head>
		<title>{$page_title}</title>
		<base href='{$website_url}/'>
		<link rel="stylesheet" href="{$relative_path}assets/css/styles.css">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
		<meta charset="utf-8">

	<body>
		<div id="wrapper">
		
			<div id="header"></div>
			
			<div id="topbar">
				<ul>			
					<li><a href="{$url.home}">{$Lang.menu_home}</a></li>
					<li><a href="{$url.ldr}">{$Lang.menu_leaderboards}</a></li>
					<li><a href="{$script_name}#openServerSelection">{$Lang.menu_serverprefix} <strong>{$server_name}</strong></a></li>
				</ul>
				
				<ul class="right">
				
					{if $server_exists}
						<li>{$Lang.total_achievements}: {$total_achievements}</li>
						
						<form action="" method="" OnSubmit="formHandler(this); return false;">
							
							<input type="hidden" name="pg" value="sch">
							<input type="hidden" name="server" value="{$server}">
							<input id="input_search" type="text" name="searchinput" value="{$search_value}" OnFocus="if( this.value == '{$Lang.searchfiller}' ) this.value='';">
						</form>
						
					{else}
						<li>{$Lang.total_achievements}: 0</li>
						<input type="text" value="{$Lang.select_a_server}" disabled>
					{/if}
				</ul>
			</div>
			
			<div id="content" {if $home_page_content} class="home" {/if}>
				
				{if not $server_exists }
					<div class="error">
						<p>{$Lang.welcome_msg}</p>
					</div>
				{/if}
				
				
				{if $show_content }
					{include file="{$template_dir}templates/content_templates/$content_file.tpl"}
				{/if}
			</div>
		</div>
		
		<div id="footer">
			&copy; 2013 idiotstrike<br>all rights reserved
		</div>
		
		<div id="openServerSelection" class="modalDialog">
			<div>
				<a href="{$script_name}#close" title="{$Lang.closemodal}" class="close">X</a>
				<h3>{$Lang.select_a_server}</h3>
					
				<div class="servers-container">
					{foreach from=$servers item=server key=value}
						<a href="{$server}">{$value}</a>
					{/foreach}
				</div>
			</div>
		</div>
		
		{if isset( $page_error ) }
			<div id="showErrorModal" class="modalDialog">
				<div>
					<a href="{$script_name}#close" title="{$Lang.closemodal}" class="close">X</a>
					<h3>{$page_error.header}</h3>
					
					<div class="error-container">
						<p>{$page_error.message}</p>
					</div>
				</div>
			</div>
		{/if}
		
	</body>
</html>
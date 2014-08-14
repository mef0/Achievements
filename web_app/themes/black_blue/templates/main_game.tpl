<!DOCTYPE html><html><head><title>{$page_title}</title><base href='{$website_url}/'><link rel="stylesheet" href="{$relative_path}assets/css/styles_game.css">

	<body>
		<div id="wrapper">
		
			<div id="header"></div>
			
			<div id="content" {if $home_page_content} class="home" {/if}>
				
				{if $show_content }
					{include file="{$template_dir}templates/content_templates/$content_file.tpl"}
				{/if}
			</div>
		</div>
	</body>
</html>
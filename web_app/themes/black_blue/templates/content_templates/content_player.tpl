<div id="bgfill">
	<div id="left">
		<div class="profile">
			<div class="avatar">
				<a href="asfa">
					<img src="public/images/no_avatar.jpg" alt="">
				</a>
			</div>
			<div class="info">
				<p class="first-row">
					<span class="rank"><i>{$Lang.profile_ranked}:</i> {$player.rank|@ordinal}</span>
					<span class="tokens"><i>{$Lang.profile_tokens}:</i> {$player.tokens}</span>
				</p>
				
				<h3>{$player.name}</h3>
				<p class="authid">({$player.auth})</p>
				<p class="stokens"><i>{$Lang.profile_tokensonserver}:</i> {$player.stokens}</p>
				
				
			</div>
		</div>
		
		<ul class="menu">
			{foreach from=$menuitems item=menuitem}
				<li class="{$menuitem.classes}"><a href="{$menuitem.url}">{$menuitem.name}</a></li>
			{/foreach}
		</ul>
	</div>

	<div id="right">
		<div class="profile-section-header">
			<ul class="profile-tabs">
			
				<li class="{$tab_achievements_class}">
					<a href="{$tab_achievements_url}">
						<span class="r"><span class="m">
							{$Lang.profiletab_achievements}
						</span></span>
					</a>
				</li>
				
				<li class="{$tab_statistics_class}">
					<a href="{$tab_statistics_url}">
						<span class="r"><span class="m">
							{$Lang.profiletab_statistics}
						</span></span>
					</a>
				</li>
			</ul>
		</div>
		
		{include file="{$template_dir}templates/page_templates/$page_file.tpl"}
		
	</div>
</div>
<?php /* Smarty version Smarty-3.1.13, created on 2013-07-23 16:53:16
         compiled from "C:\Program Files (x86)\EasyPHP-12.1\www\ac\themes\black_blue\templates\content_templates\content_player.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1518951eb1cd2a57de7-89453103%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fffeaa66ee64ac2055ae96a1ecd442aba9d01e8f' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\ac\\themes\\black_blue\\templates\\content_templates\\content_player.tpl',
      1 => 1374591117,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1518951eb1cd2a57de7-89453103',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51eb1cd2e272b0_46836034',
  'variables' => 
  array (
    'player' => 0,
    'menuitems' => 0,
    'menuitem' => 0,
    'tab_achievements_class' => 0,
    'tab_achievements_url' => 0,
    'tab_statistics_class' => 0,
    'tab_statistics_url' => 0,
    'template_dir' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51eb1cd2e272b0_46836034')) {function content_51eb1cd2e272b0_46836034($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_ordinal')) include 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\ac\\core\\includes\\smarty\\plugins\\modifier.ordinal.php';
?><div id="bgfill">
	<div id="left">
		<div class="profile">
			<div class="avatar">
				<a href="asfa">
					<img src="public/images/no_avatar.jpg" alt="">
				</a>
			</div>
			<div class="info">
				<p class="first-row">
					<span class="rank"><i>ranked:</i> <?php echo smarty_modifier_ordinal($_smarty_tpl->tpl_vars['player']->value['rank']);?>
</span>
					<span class="tokens"><i>tokens:</i> <?php echo $_smarty_tpl->tpl_vars['player']->value['tokens'];?>
</span>
				</p>
				
				<h3><?php echo $_smarty_tpl->tpl_vars['player']->value['name'];?>
</h3>
				<p class="authid">(<?php echo $_smarty_tpl->tpl_vars['player']->value['auth'];?>
)</p>
				<p class="stokens"><i>Tokens on this server:</i> <?php echo $_smarty_tpl->tpl_vars['player']->value['stokens'];?>
</p>
				
				
			</div>
		</div>
		
		<ul class="menu">
			<?php  $_smarty_tpl->tpl_vars['menuitem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menuitem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menuitems']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['menuitem']->key => $_smarty_tpl->tpl_vars['menuitem']->value){
$_smarty_tpl->tpl_vars['menuitem']->_loop = true;
?>
				<li class="<?php echo $_smarty_tpl->tpl_vars['menuitem']->value['classes'];?>
"><a href="<?php echo $_smarty_tpl->tpl_vars['menuitem']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['menuitem']->value['name'];?>
</a></li>
			<?php } ?>
		</ul>
	</div>

	<div id="right">
		<div class="profile-section-header">
			<ul class="profile-tabs">
			
				<li class="<?php echo $_smarty_tpl->tpl_vars['tab_achievements_class']->value;?>
">
					<a href="<?php echo $_smarty_tpl->tpl_vars['tab_achievements_url']->value;?>
">
						<span class="r"><span class="m">
							Achievements
						</span></span>
					</a>
				</li>
				
				<li class="<?php echo $_smarty_tpl->tpl_vars['tab_statistics_class']->value;?>
">
					<a href="<?php echo $_smarty_tpl->tpl_vars['tab_statistics_url']->value;?>
">
						<span class="r"><span class="m">
							Statistics
						</span></span>
					</a>
				</li>
			</ul>
		</div>
		
		<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template_dir']->value)."templates/page_templates/".((string)$_smarty_tpl->tpl_vars['page_file']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		
	</div>
</div><?php }} ?>
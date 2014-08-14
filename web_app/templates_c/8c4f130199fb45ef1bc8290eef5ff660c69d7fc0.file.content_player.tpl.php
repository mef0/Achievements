<?php /* Smarty version Smarty-3.1.13, created on 2013-07-17 00:35:01
         compiled from ".\templates\content_templates\content_player.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1906751e2c73281dc34-26726413%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c4f130199fb45ef1bc8290eef5ff660c69d7fc0' => 
    array (
      0 => '.\\templates\\content_templates\\content_player.tpl',
      1 => 1373991578,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1906751e2c73281dc34-26726413',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51e2c732b039b4_72474788',
  'variables' => 
  array (
    'root_path' => 0,
    'player' => 0,
    'menuitems' => 0,
    'menuitem' => 0,
    'tab_achievements_class' => 0,
    'tab_achievements_url' => 0,
    'tab_statistics_class' => 0,
    'tab_statistics_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e2c732b039b4_72474788')) {function content_51e2c732b039b4_72474788($_smarty_tpl) {?>
<div id="left">
	<div class="profile">
		<div class="avatar">
			<a href="asfa">
				<img src="<?php echo $_smarty_tpl->tpl_vars['root_path']->value;?>
/public/images/no_avatar.jpg" alt="">
			</a>
		</div>
		<div class="info">
			<h3><?php echo $_smarty_tpl->tpl_vars['player']->value['name'];?>
</h3>
				<p class="tokens">Total Tokens: <?php echo $_smarty_tpl->tpl_vars['player']->value['tokens'];?>
</p>
				<p class="authid"><?php echo $_smarty_tpl->tpl_vars['player']->value['auth'];?>
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
	
	<?php echo $_smarty_tpl->getSubTemplate ("page_templates/".((string)$_smarty_tpl->tpl_vars['page_file']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	
</div><?php }} ?>
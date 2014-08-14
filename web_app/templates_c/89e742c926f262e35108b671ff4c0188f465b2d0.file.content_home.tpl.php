<?php /* Smarty version Smarty-3.1.13, created on 2013-07-30 22:16:19
         compiled from "C:\Program Files (x86)\EasyPHP-12.1\www\ac\themes\black_blue\templates\content_templates\content_home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:564451eb1c8d688739-72555008%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '89e742c926f262e35108b671ff4c0188f465b2d0' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\ac\\themes\\black_blue\\templates\\content_templates\\content_home.tpl',
      1 => 1374591848,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '564451eb1c8d688739-72555008',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51eb1c8da71c41_36866947',
  'variables' => 
  array (
    'all_achievements' => 0,
    'achievement' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51eb1c8da71c41_36866947')) {function content_51eb1c8da71c41_36866947($_smarty_tpl) {?>
<?php if (!empty($_smarty_tpl->tpl_vars['all_achievements']->value)){?>
	
	<ul id="achievements">
		<?php  $_smarty_tpl->tpl_vars['achievement'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['achievement']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['all_achievements']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['achievement']->key => $_smarty_tpl->tpl_vars['achievement']->value){
$_smarty_tpl->tpl_vars['achievement']->_loop = true;
?>
			
			<li>
				<div class="filler" style="width: <?php echo $_smarty_tpl->tpl_vars['achievement']->value['percent'];?>
"></div>
				<div class="container">
					<p>
						<strong><?php echo $_smarty_tpl->tpl_vars['achievement']->value['name'];?>
</strong>
						<span><?php echo $_smarty_tpl->tpl_vars['achievement']->value['desc'];?>
</strong>
					</p>
					
					<span class="icon">
						<img src="public/achievement_images/<?php echo $_smarty_tpl->tpl_vars['achievement']->value['icon'];?>
" alt="" width="64" height="64">
					</span>
					
					<div class="tokens">
						<strong><?php echo $_smarty_tpl->tpl_vars['achievement']->value['tokens'];?>
 TOKENS</strong>
						<span class="date">
							<b><?php echo $_smarty_tpl->tpl_vars['achievement']->value['percent'];?>
</b> ( <b><?php echo $_smarty_tpl->tpl_vars['achievement']->value['players_unlocked'];?>
</b> ) PLAYERS EARNED THIS
						</span>
					</div>
				</div>
			</li>
		<?php } ?>
	</ul>
<?php }else{ ?>
	<div class="error">
		<p>There are no achievements on this server yet.</p>
	</div>
<?php }?><?php }} ?>
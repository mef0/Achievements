<?php /* Smarty version Smarty-3.1.13, created on 2013-07-18 15:45:45
         compiled from ".\templates\content_templates\content_home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2027951d971f13d95f0-57352304%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '45a9b6ac77fb7676748bb91da586f0b59298de85' => 
    array (
      0 => '.\\templates\\content_templates\\content_home.tpl',
      1 => 1374155141,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2027951d971f13d95f0-57352304',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51d971f16f1473_72511608',
  'variables' => 
  array (
    'all_achievements' => 0,
    'achievement' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51d971f16f1473_72511608')) {function content_51d971f16f1473_72511608($_smarty_tpl) {?>
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
			</li>
		<?php } ?>
	</ul>
<?php }else{ ?>
	<div class="error">
		<p>There are no achievements on this server yet.</p>
	</div>
<?php }?><?php }} ?>
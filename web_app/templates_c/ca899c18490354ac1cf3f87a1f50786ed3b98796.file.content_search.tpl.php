<?php /* Smarty version Smarty-3.1.13, created on 2013-08-16 20:41:45
         compiled from "C:\Program Files (x86)\EasyPHP-12.1\www\ac\themes\black_blue\templates\content_templates\content_search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1240751ec0e3e91c5b1-08457855%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca899c18490354ac1cf3f87a1f50786ed3b98796' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\ac\\themes\\black_blue\\templates\\content_templates\\content_search.tpl',
      1 => 1376678503,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1240751ec0e3e91c5b1-08457855',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51ec0e3ec0a9d7_07811257',
  'variables' => 
  array (
    'search_string' => 0,
    'server_name' => 0,
    'search_results' => 0,
    'player' => 0,
    'too_short' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51ec0e3ec0a9d7_07811257')) {function content_51ec0e3ec0a9d7_07811257($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_ordinal')) include 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\ac\\core\\includes\\smarty\\plugins\\modifier.ordinal.php';
?>
<h2>The following users were found by given search input ("<?php echo $_smarty_tpl->tpl_vars['search_string']->value;?>
"):</h2>

<table class="topstandard">

	<tr>
		<th>Rank on <?php echo $_smarty_tpl->tpl_vars['server_name']->value;?>
</th>
		<th>Name</th>
		<th>Tokens on server</th>
		<th>Total Tokens</th>
	</tr>

	
	<?php  $_smarty_tpl->tpl_vars['player'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['player']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['search_results']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['player']->key => $_smarty_tpl->tpl_vars['player']->value){
$_smarty_tpl->tpl_vars['player']->_loop = true;
?>
		<tr>
			<td><?php echo smarty_modifier_ordinal($_smarty_tpl->tpl_vars['player']->value['rank']);?>
</td>
			<td><a href="<?php echo $_smarty_tpl->tpl_vars['player']->value['url'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['player']->value['name'];?>
</a></td>
			<td><?php echo $_smarty_tpl->tpl_vars['player']->value['tokens'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['player']->value['total_tokens'];?>
</td>
		</tr>
	<?php }
if (!$_smarty_tpl->tpl_vars['player']->_loop) {
?>
		
		<tr>
			<td colspan="4">
				<?php if ($_smarty_tpl->tpl_vars['too_short']->value==1){?>
					The search query is too short. Minimum 3 characters required.
				<?php }else{ ?>
					No players were found.
				<?php }?>
			</td>
		</tr>

	<?php } ?>
</table><?php }} ?>
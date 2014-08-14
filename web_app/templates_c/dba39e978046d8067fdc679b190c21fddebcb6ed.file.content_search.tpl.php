<?php /* Smarty version Smarty-3.1.13, created on 2013-07-17 22:24:18
         compiled from ".\templates\content_templates\content_search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2229651e3343e5b37e1-23183884%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dba39e978046d8067fdc679b190c21fddebcb6ed' => 
    array (
      0 => '.\\templates\\content_templates\\content_search.tpl',
      1 => 1374092655,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2229651e3343e5b37e1-23183884',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51e3343e7845c9_78523245',
  'variables' => 
  array (
    'search_string' => 0,
    'server_name' => 0,
    'search_results' => 0,
    'player' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e3343e7845c9_78523245')) {function content_51e3343e7845c9_78523245($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_ordinal')) include 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\ac\\core\\smarty\\plugins\\modifier.ordinal.php';
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
			<td colspan="4">No players were found.</td>
		</tr>

	<?php } ?>
</table><?php }} ?>
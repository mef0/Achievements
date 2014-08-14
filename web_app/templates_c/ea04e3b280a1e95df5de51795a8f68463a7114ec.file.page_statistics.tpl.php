<?php /* Smarty version Smarty-3.1.13, created on 2013-07-21 01:27:25
         compiled from "C:\Program Files (x86)\EasyPHP-12.1\www\ac\themes\black_blue\templates\page_templates\page_statistics.tpl" */ ?>
<?php /*%%SmartyHeaderCode:331551eb1cdd156b55-86345996%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ea04e3b280a1e95df5de51795a8f68463a7114ec' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\ac\\themes\\black_blue\\templates\\page_templates\\page_statistics.tpl',
      1 => 1374329296,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '331551eb1cdd156b55-86345996',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'server_name' => 0,
    'player' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51eb1cdd4d8e68_65904257',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51eb1cdd4d8e68_65904257')) {function content_51eb1cdd4d8e68_65904257($_smarty_tpl) {?>

<div class="achievements-header min-500">
	<h3>Player Statistics On Server <?php echo $_smarty_tpl->tpl_vars['server_name']->value;?>
</h3>
	
	<table class="stats-table">
		<tr>
			<td>Total Achievements</td>
			<td><?php echo $_smarty_tpl->tpl_vars['player']->value['total_achievements'];?>
</td>
		</tr>
		
		<tr>
			<td>Play Time</td>
			<td><?php echo $_smarty_tpl->tpl_vars['player']->value['play_hours'];?>
 hours</td>
		</tr>
		
		<tr>
			<td>Last Seen As</td>
			<td><?php echo $_smarty_tpl->tpl_vars['player']->value['name'];?>
</td>
		</tr>
		
		<tr>
			<td>Last Connection</td>
			<td><?php echo $_smarty_tpl->tpl_vars['player']->value['last_connection'];?>
</td>
		</tr>
		
		<tr>
			<td>First Connection</td>
			<td><?php echo $_smarty_tpl->tpl_vars['player']->value['first_connection'];?>
</td>
		</tr>
		
		<tr>
			<td>Total Connections</td>
			<td><?php echo $_smarty_tpl->tpl_vars['player']->value['total_connections'];?>
 connections</td>
		</tr>
	</table>
	
	<table class="stats-table">
		<tr>
			<td>Kills</td>
			<td><?php echo $_smarty_tpl->tpl_vars['player']->value['kills'];?>
</td>
		</tr>
		
		<tr>
			<td>Deaths</td>
			<td><?php echo $_smarty_tpl->tpl_vars['player']->value['deaths'];?>
</td>
		</tr>
		
		<tr>
			<td>Suicides</td>
			<td><?php echo $_smarty_tpl->tpl_vars['player']->value['suicides'];?>
</td>
		</tr>
		
		<tr>
			<td>Kills/Deaths Ratio</td>
			<td><?php echo $_smarty_tpl->tpl_vars['player']->value['kdr'];?>
</td>
		</tr>
	</table>
</div><?php }} ?>
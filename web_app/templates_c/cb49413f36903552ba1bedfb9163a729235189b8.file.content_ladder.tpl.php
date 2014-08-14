<?php /* Smarty version Smarty-3.1.13, created on 2013-10-02 21:46:05
         compiled from "S:\achievements\acv2.8b\web_app\themes\black_blue\templates\content_templates\content_ladder.tpl" */ ?>
<?php /*%%SmartyHeaderCode:31472524c77fdcba4d2-44380278%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb49413f36903552ba1bedfb9163a729235189b8' => 
    array (
      0 => 'S:\\achievements\\acv2.8b\\web_app\\themes\\black_blue\\templates\\content_templates\\content_ladder.tpl',
      1 => 1380060692,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31472524c77fdcba4d2-44380278',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'player' => 0,
    'ladder_players' => 0,
    'Lang' => 0,
    'script_name' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_524c77fe5c5a17_65928463',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_524c77fe5c5a17_65928463')) {function content_524c77fe5c5a17_65928463($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_ordinal')) include 'S:\\achievements\\acv2.8b\\web_app\\core\\includes\\smarty\\plugins\\modifier.ordinal.php';
?><table class="top3">
	
	<tr>
		<?php $_smarty_tpl->tpl_vars['player'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['player']->step = 1;$_smarty_tpl->tpl_vars['player']->total = (int)ceil(($_smarty_tpl->tpl_vars['player']->step > 0 ? 2+1 - (0) : 0-(2)+1)/abs($_smarty_tpl->tpl_vars['player']->step));
if ($_smarty_tpl->tpl_vars['player']->total > 0){
for ($_smarty_tpl->tpl_vars['player']->value = 0, $_smarty_tpl->tpl_vars['player']->iteration = 1;$_smarty_tpl->tpl_vars['player']->iteration <= $_smarty_tpl->tpl_vars['player']->total;$_smarty_tpl->tpl_vars['player']->value += $_smarty_tpl->tpl_vars['player']->step, $_smarty_tpl->tpl_vars['player']->iteration++){
$_smarty_tpl->tpl_vars['player']->first = $_smarty_tpl->tpl_vars['player']->iteration == 1;$_smarty_tpl->tpl_vars['player']->last = $_smarty_tpl->tpl_vars['player']->iteration == $_smarty_tpl->tpl_vars['player']->total;?>
			<td>
				<?php if (isset($_smarty_tpl->tpl_vars['ladder_players']->value[$_smarty_tpl->tpl_vars['player']->value])){?>
					<h3><a href="<?php echo $_smarty_tpl->tpl_vars['ladder_players']->value[$_smarty_tpl->tpl_vars['player']->value]['link'];?>
"><?php echo $_smarty_tpl->tpl_vars['ladder_players']->value[$_smarty_tpl->tpl_vars['player']->value]['name'];?>
</a></h3>
					
					<p><?php echo $_smarty_tpl->tpl_vars['Lang']->value['tokens_on_server'];?>
: <strong><?php echo $_smarty_tpl->tpl_vars['ladder_players']->value[$_smarty_tpl->tpl_vars['player']->value]['tokens'];?>
</strong></p>
				<?php }else{ ?>
					<h3><a href="<?php echo $_smarty_tpl->tpl_vars['script_name']->value;?>
#noPlayer"><?php echo $_smarty_tpl->tpl_vars['Lang']->value['noplayer'];?>
</a></h3>
					<p>---</p>
				<?php }?>
			</td>
		<?php }} ?>
	</tr>
	
</table>

<table class="topstandard">

	<tr>
		<th><?php echo $_smarty_tpl->tpl_vars['Lang']->value['ldrtable_id'];?>
</th>
		<th><?php echo $_smarty_tpl->tpl_vars['Lang']->value['ldrtable_name'];?>
</th>
		<th><?php echo $_smarty_tpl->tpl_vars['Lang']->value['ldrtable_tokens'];?>
</th>
	</tr>
	
	<?php if (count($_smarty_tpl->tpl_vars['ladder_players']->value)>0){?>
		<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['player'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ladder_players']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['player']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
			<?php if ($_smarty_tpl->tpl_vars['player']->value>2){?> 
				<tr>
					<td><?php echo smarty_modifier_ordinal($_smarty_tpl->tpl_vars['val']->value['rank']);?>
</td>
					<td><a href="<?php echo $_smarty_tpl->tpl_vars['val']->value['link'];?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
</a></td>
					<td><?php echo $_smarty_tpl->tpl_vars['val']->value['tokens'];?>
</td>
				</tr>
			<?php }?>
		<?php } ?>
	<?php }else{ ?>
		<tr>
			<td colspan="3"><?php echo $_smarty_tpl->tpl_vars['Lang']->value['ldrtable_nomoreplayers'];?>
</td>
		</tr>
	<?php }?>
	
</table><?php }} ?>
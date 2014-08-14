<?php /* Smarty version Smarty-3.1.13, created on 2013-07-21 01:27:18
         compiled from "C:\Program Files (x86)\EasyPHP-12.1\www\ac\themes\black_blue\templates\page_templates\page_achievements.tpl" */ ?>
<?php /*%%SmartyHeaderCode:367551eb1cd6149f11-66341172%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '05025ed53214462f82596a5386d30a7bdda62648' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\ac\\themes\\black_blue\\templates\\page_templates\\page_achievements.tpl',
      1 => 1374155181,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '367551eb1cd6149f11-66341172',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'category_name' => 0,
    'achievements_unlocked' => 0,
    'total_achievements' => 0,
    'completion' => 0,
    'completed_achievements' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51eb1cd66ec5d5_22021065',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51eb1cd66ec5d5_22021065')) {function content_51eb1cd66ec5d5_22021065($_smarty_tpl) {?>

<div class="achievements-header">
	<h3><?php echo $_smarty_tpl->tpl_vars['category_name']->value;?>
</h3>
		<p>Achievements completed in this category</p>
		
	<div class="pbarc">
		<span><?php echo $_smarty_tpl->tpl_vars['achievements_unlocked']->value;?>
 / <?php echo $_smarty_tpl->tpl_vars['total_achievements']->value;?>
 ( <?php echo $_smarty_tpl->tpl_vars['completion']->value;?>
% )</span>
		<div class="pbar" style="width: <?php echo $_smarty_tpl->tpl_vars['completion']->value;?>
%"></div>
	</div>

</div>

<ul id="achievements">
	
	<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['achievement'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['completed_achievements']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['achievement']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
		
		<li class="ac <?php echo $_smarty_tpl->tpl_vars['value']->value['locked'];?>
">
			<p>
				<strong><?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
</strong>
				<span><?php echo $_smarty_tpl->tpl_vars['value']->value['desc'];?>
</span>
			</p>
			
			<?php if ($_smarty_tpl->tpl_vars['value']->value['showbar']){?>
				<div class="pbarc small ac">
					<span><?php echo $_smarty_tpl->tpl_vars['value']->value['completed'];?>
 / <?php echo $_smarty_tpl->tpl_vars['value']->value['max'];?>
 (<?php echo $_smarty_tpl->tpl_vars['value']->value['percent'];?>
)%</span>
					<div class="pbar" style="width: <?php echo $_smarty_tpl->tpl_vars['value']->value['percent'];?>
%;"></div>
				</div>
			<?php }?>
			
			<span class="icon">
				<img src="public/achievement_images/<?php echo $_smarty_tpl->tpl_vars['value']->value['icon'];?>
" alt="" width="64" height="64">
			</span>
				
				
			<div class="tokens">
				<strong><?php echo $_smarty_tpl->tpl_vars['value']->value['tokens'];?>
</strong>
				<span class="date"><?php echo $_smarty_tpl->tpl_vars['value']->value['date'];?>
</span>
			</div>
		</li>
	<?php } ?>
</ul><?php }} ?>
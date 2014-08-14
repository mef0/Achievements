<?php /* Smarty version Smarty-3.1.13, created on 2013-07-21 01:27:14
         compiled from "C:\Program Files (x86)\EasyPHP-12.1\www\ac\themes\black_blue\templates\page_templates\page_overview.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2289051eb1cd2e41de3-49005429%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6fa9f1db15bea9844eff7bdf93cca4f1e72b302a' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\ac\\themes\\black_blue\\templates\\page_templates\\page_overview.tpl',
      1 => 1374022592,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2289051eb1cd2e41de3-49005429',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'achievements_total_url' => 0,
    'achievements_unlocked' => 0,
    'achievements_total' => 0,
    'achievements_ratio' => 0,
    'achievement_categories' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51eb1cd336df02_80339862',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51eb1cd336df02_80339862')) {function content_51eb1cd336df02_80339862($_smarty_tpl) {?>

<div class="achievements-header min-350">
	<h3>Achievements Overview</h3>
	
	<a class="total-achievements" href="<?php echo $_smarty_tpl->tpl_vars['achievements_total_url']->value;?>
">
		<p>Total achievements completed</p>
		
		<div class="pbarc medium">
			<span><?php echo $_smarty_tpl->tpl_vars['achievements_unlocked']->value;?>
 / <?php echo $_smarty_tpl->tpl_vars['achievements_total']->value;?>
 (<?php echo $_smarty_tpl->tpl_vars['achievements_ratio']->value;?>
%)</span>
			<div class="pbar" style="width: <?php echo $_smarty_tpl->tpl_vars['achievements_ratio']->value;?>
%;"></div>
		</div>
	</a>
	
	<div class="achievement-cat-container">
		
		<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['achievement_categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['category']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
			
			<a class="achievement-cat" href="<?php echo $_smarty_tpl->tpl_vars['value']->value['url'];?>
">
				<h5><?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
</h5>
				<div class="pbarc small">
					<?php if ($_smarty_tpl->tpl_vars['value']->value['total_achievements']!=0){?>
						<span><?php echo $_smarty_tpl->tpl_vars['value']->value['total_unlocks'];?>
 / <?php echo $_smarty_tpl->tpl_vars['value']->value['total_achievements'];?>
 (<?php echo $_smarty_tpl->tpl_vars['value']->value['ratio'];?>
%)</span>
					<?php }else{ ?>
						<span>NO ACHIEVEMENTS</span>
					<?php }?>
					<div class="pbar" style="width: <?php echo $_smarty_tpl->tpl_vars['value']->value['ratio'];?>
%;"></div>
				</div>
			</a>
		<?php } ?>
		
		
		<div style="clear: both;"></div>
		
	</div>
</div><?php }} ?>
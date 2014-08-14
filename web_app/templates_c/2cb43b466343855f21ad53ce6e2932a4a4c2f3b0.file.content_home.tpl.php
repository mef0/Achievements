<?php /* Smarty version Smarty-3.1.13, created on 2013-10-02 21:46:03
         compiled from "S:\achievements\acv2.8b\web_app\themes\black_blue\templates\content_templates\content_home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:30515524c77fbd00e42-93938479%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2cb43b466343855f21ad53ce6e2932a4a4c2f3b0' => 
    array (
      0 => 'S:\\achievements\\acv2.8b\\web_app\\themes\\black_blue\\templates\\content_templates\\content_home.tpl',
      1 => 1380060376,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30515524c77fbd00e42-93938479',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'all_achievements' => 0,
    'achievement' => 0,
    'Lang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_524c77fc2e6d33_35481615',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_524c77fc2e6d33_35481615')) {function content_524c77fc2e6d33_35481615($_smarty_tpl) {?>
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
 <?php echo $_smarty_tpl->tpl_vars['Lang']->value['tokens'];?>
</strong>
						<span class="date">
							<b><?php echo $_smarty_tpl->tpl_vars['achievement']->value['percent'];?>
</b> ( <b><?php echo $_smarty_tpl->tpl_vars['achievement']->value['players_unlocked'];?>
</b> ) <?php echo $_smarty_tpl->tpl_vars['Lang']->value['players_earned_this'];?>

						</span>
					</div>
				</div>
			</li>
		<?php } ?>
	</ul>
<?php }else{ ?>
	<div class="error">
		<p><?php echo $_smarty_tpl->tpl_vars['Lang']->value['no_achievements_yet'];?>
</p>
	</div>
<?php }?><?php }} ?>
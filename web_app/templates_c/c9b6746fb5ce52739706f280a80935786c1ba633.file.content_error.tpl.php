<?php /* Smarty version Smarty-3.1.13, created on 2013-07-21 21:02:36
         compiled from "C:\Program Files (x86)\EasyPHP-12.1\www\ac\themes\black_blue\templates\content_templates\content_error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1065551ec28f87a7535-68333208%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c9b6746fb5ce52739706f280a80935786c1ba633' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\ac\\themes\\black_blue\\templates\\content_templates\\content_error.tpl',
      1 => 1374433356,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1065551ec28f87a7535-68333208',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51ec28f87a9ea8_82964417',
  'variables' => 
  array (
    'page_error' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51ec28f87a9ea8_82964417')) {function content_51ec28f87a9ea8_82964417($_smarty_tpl) {?><div class="error">
	<h3><?php echo $_smarty_tpl->tpl_vars['page_error']->value['header'];?>
</h3>
	<p><?php echo $_smarty_tpl->tpl_vars['page_error']->value['message'];?>
</p>
</div><?php }} ?>
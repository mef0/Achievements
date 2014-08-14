<?php /* Smarty version Smarty-3.1.13, created on 2013-07-23 13:58:25
         compiled from "C:\Program Files (x86)\EasyPHP-12.1\www\ac\themes\black_blue\templates\main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:667451eb179bcd84e1-34697511%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd046dcb921ea0478e9fbce46b1fc9ebac6ef4aa9' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\ac\\themes\\black_blue\\templates\\main.tpl',
      1 => 1374580704,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '667451eb179bcd84e1-34697511',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51eb179c742be7_23209349',
  'variables' => 
  array (
    'page_title' => 0,
    'website_url' => 0,
    'relative_path' => 0,
    'url' => 0,
    'script_name' => 0,
    'server_name' => 0,
    'server_exists' => 0,
    'total_achievements' => 0,
    'server' => 0,
    'search_value' => 0,
    'home_page_content' => 0,
    'show_content' => 0,
    'template_dir' => 0,
    'servers' => 0,
    'value' => 0,
    'page_error' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51eb179c742be7_23209349')) {function content_51eb179c742be7_23209349($_smarty_tpl) {?><!DOCTYPE html>

<html>
	<head>
		<title><?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
</title>
		<base href='<?php echo $_smarty_tpl->tpl_vars['website_url']->value;?>
/'>
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['relative_path']->value;?>
assets/css/styles.css">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>

	<body>
		<div id="wrapper">
		
			<div id="header"></div>
			
			<div id="topbar">
				<ul>			
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value['home'];?>
">HOME</a></li>
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value['ldr'];?>
">LEADERBOARDS</a></li>
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['script_name']->value;?>
#openServerSelection">SERVER: <strong><?php echo $_smarty_tpl->tpl_vars['server_name']->value;?>
</strong></a></li>
				</ul>
				
				<ul class="right">
				
					<?php if ($_smarty_tpl->tpl_vars['server_exists']->value){?>
						<li>Total Achievements: <?php echo $_smarty_tpl->tpl_vars['total_achievements']->value;?>
</li>
						
						<form action="" method="" OnSubmit="formHandler(this); return false;">
							
							<input type="hidden" name="pg" value="sch">
							<input type="hidden" name="server" value="<?php echo $_smarty_tpl->tpl_vars['server']->value;?>
">
							<input id="input_search" type="text" name="searchinput" value="<?php echo $_smarty_tpl->tpl_vars['search_value']->value;?>
" OnFocus="if( this.value == 'Name/Auth' ) this.value='';">
						</form>
						
					<?php }else{ ?>
						<li>Total Achievements: 0</li>
						<input type="text" value="Select a server" disabled>
					<?php }?>
				</ul>
			</div>
			
			<div id="content" <?php if ($_smarty_tpl->tpl_vars['home_page_content']->value){?> class="home" <?php }?>>
				
				<?php if (!$_smarty_tpl->tpl_vars['server_exists']->value){?>
					<div class="error">
						<p>Welcome to the Achievements page. Please select a server from the top menu.</p>
					</div>
				<?php }?>
				
				
				<?php if ($_smarty_tpl->tpl_vars['show_content']->value){?>
					<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template_dir']->value)."templates/content_templates/".((string)$_smarty_tpl->tpl_vars['content_file']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

				<?php }?>
			</div>
		</div>
		
		<div id="footer">
			&copy; 2013 idiotstrike<br>all rights reserved
		</div>
		
		<div id="openServerSelection" class="modalDialog">
			<div>
				<a href="<?php echo $_smarty_tpl->tpl_vars['script_name']->value;?>
#close" title="Close" class="close">X</a>
				<h3>Select Server</h3>
					
				<div class="servers-container">
					<?php  $_smarty_tpl->tpl_vars['server'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['server']->_loop = false;
 $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['servers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['server']->key => $_smarty_tpl->tpl_vars['server']->value){
$_smarty_tpl->tpl_vars['server']->_loop = true;
 $_smarty_tpl->tpl_vars['value']->value = $_smarty_tpl->tpl_vars['server']->key;
?>
						<a href="<?php echo $_smarty_tpl->tpl_vars['server']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</a>
					<?php } ?>
				</div>
			</div>
		</div>
		
		<?php if (isset($_smarty_tpl->tpl_vars['page_error']->value)){?>
			<div id="showErrorModal" class="modalDialog">
				<div>
					<a href="<?php echo $_smarty_tpl->tpl_vars['script_name']->value;?>
#close" title="Close" class="close">X</a>
					<h3><?php echo $_smarty_tpl->tpl_vars['page_error']->value['header'];?>
</h3>
					
					<div class="error-container">
						<p><?php echo $_smarty_tpl->tpl_vars['page_error']->value['message'];?>
</p>
					</div>
				</div>
			</div>
		<?php }?>
		
	</body>
</html><?php }} ?>
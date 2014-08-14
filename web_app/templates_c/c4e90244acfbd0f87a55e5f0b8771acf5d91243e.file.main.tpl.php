<?php /* Smarty version Smarty-3.1.13, created on 2013-07-17 22:19:00
         compiled from "C:\Program Files (x86)\EasyPHP-12.1\www\ac\templates\main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1436851c4b265c6af44-02838716%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c4e90244acfbd0f87a55e5f0b8771acf5d91243e' => 
    array (
      0 => 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\ac\\templates\\main.tpl',
      1 => 1374092304,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1436851c4b265c6af44-02838716',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51c4b265e639d7_51231873',
  'variables' => 
  array (
    'page_title' => 0,
    'template_dir' => 0,
    'url' => 0,
    'server_name' => 0,
    'server_exists' => 0,
    'total_achievements' => 0,
    'server' => 0,
    'search_value' => 0,
    'home_page_content' => 0,
    'show_content' => 0,
    'load_time' => 0,
    'sql_time' => 0,
    'servers' => 0,
    'value' => 0,
    'page_error' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51c4b265e639d7_51231873')) {function content_51c4b265e639d7_51231873($_smarty_tpl) {?><!DOCTYPE html>

<html>
	<head>
		<title><?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
</title>
		
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['template_dir']->value;?>
/assets/css/styles.css">
	</head>
	
	<body>
		<div id="wrapper">
		
			<div id="header"></div>
			
			<div id="topbar">
				<ul>			
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value['home'];?>
">HOME</a></li>
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value['ldr'];?>
">LEADERBOARDS</a></li>
					<li><a href="#openServerSelection">SERVER: <strong><?php echo $_smarty_tpl->tpl_vars['server_name']->value;?>
</strong></a></li>
				</ul>
				
				<ul class="right">
				
					<?php if ($_smarty_tpl->tpl_vars['server_exists']->value){?>
						<li>Total Achievements: <?php echo $_smarty_tpl->tpl_vars['total_achievements']->value;?>
</li>
						
						<form action="" method="GET" OnSubmit="if( document.getElementById( 'input_search' ).value.length < 3 ) { alert( 'Your search query is too short. Minimum 3 characters required.' ); return false; }">
							
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
					<?php echo $_smarty_tpl->getSubTemplate ("content_templates/".((string)$_smarty_tpl->tpl_vars['content_file']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

				<?php }?>
			</div>
		</div>
		
		<div id="footer">
			&copy; 2013 idiotstrike<br>
			Page took <?php echo $_smarty_tpl->tpl_vars['load_time']->value;?>
s to load<br>
			MySQL took <?php echo $_smarty_tpl->tpl_vars['sql_time']->value;?>
s to load all queries
		</div>
		
		<div id="openServerSelection" class="modalDialog">
			<div>
				<a href="#close" title="Close" class="close">X</a>
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
					<a href="#close" title="Close" class="close">X</a>
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
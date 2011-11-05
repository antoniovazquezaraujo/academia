<?php /* Smarty version Smarty-3.0.7, created on 2011-11-05 20:06:09
         compiled from "templates\basicList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:279324eb58921b25613-75225187%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '940218bda8a50bdcaffb335407dfbd97636b9e29' => 
    array (
      0 => 'templates\\basicList.tpl',
      1 => 1320519967,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '279324eb58921b25613-75225187',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="wrapper">

	<div id="header">
		<?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	</div>
	<div id="navigation">
	<h2><?php echo $_smarty_tpl->getVariable('view')->value;?>
</h2>
	</div>
	<div id="leftcolumn">
		<?php $_template = new Smarty_Internal_Template("menu.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	</div>
	<div id="content">
		<?php $_template = new Smarty_Internal_Template("table.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	</div>
	<div id="footer">
		<?php $_template = new Smarty_Internal_Template("footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	</div>
</div>





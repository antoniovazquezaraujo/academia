<?php /* Smarty version Smarty-3.0.7, created on 2011-11-05 20:10:20
         compiled from "templates\basicForm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:115574eb58a1c33a7d7-32644084%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab771b1aeb3f2dff7f7c449ec9dad560e958ba2f' => 
    array (
      0 => 'templates\\basicForm.tpl',
      1 => 1320520216,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '115574eb58a1c33a7d7-32644084',
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
		<?php $_template = new Smarty_Internal_Template("form.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	</div>
	<div id="footer">
		<?php $_template = new Smarty_Internal_Template("footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	</div>
</div>

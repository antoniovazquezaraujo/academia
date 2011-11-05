<?php /* Smarty version Smarty-3.0.7, created on 2011-11-05 13:20:58
         compiled from "templates\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:279434eb52a2a05f373-35687711%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '64dc0f53a42be5b3a7d2ba591c653348a6eeab8a' => 
    array (
      0 => 'templates\\login.tpl',
      1 => 1320489465,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '279434eb52a2a05f373-35687711',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<?php $_template = new Smarty_Internal_Template("menu.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<form action="<?php echo $_smarty_tpl->getVariable('SCRIPT_NAME')->value;?>
?action=login" method="post">
Nombre:
  <input 
	  type="text" 
	  name="nombre" 
  >
  <br />
 Password: 
  <input 
	  type="password" 
	  name="password" 
  >
  <br />
  <input type="submit" value="Submit">
</form>
<?php $_template = new Smarty_Internal_Template("footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

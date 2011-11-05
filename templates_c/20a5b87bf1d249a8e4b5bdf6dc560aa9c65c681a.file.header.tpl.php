<?php /* Smarty version Smarty-3.0.7, created on 2011-11-05 13:20:49
         compiled from "templates\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:183064eb52a21966f21-15744539%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '20a5b87bf1d249a8e4b5bdf6dc560aa9c65c681a' => 
    array (
      0 => 'templates\\header.tpl',
      1 => 1320489465,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '183064eb52a21966f21-15744539',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
<?php $_template = new Smarty_Internal_Template("html_header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<body <?php if ($_smarty_tpl->getVariable('nivel_usuario')->value=="10"){?>style="background-color:yellow;"<?php }?>>
<div style="text-align:center;">
<h1>Formatic Escuela de Programadores</h1>
<h3>Gestion de alumnos</h3>
</div>
<?php if ($_smarty_tpl->getVariable('nivel_usuario')->value>0){?>Usuario: <?php echo $_smarty_tpl->getVariable('nombre_usuario')->value;?>
 (Nivel: <?php echo $_smarty_tpl->getVariable('nivel_usuario')->value;?>
)<?php }?>
<hr>

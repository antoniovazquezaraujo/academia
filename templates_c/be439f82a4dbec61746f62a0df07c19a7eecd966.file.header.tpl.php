<?php /* Smarty version Smarty-3.0.7, created on 2011-10-26 18:18:36
         compiled from "templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3885130364ea832dc51b0d6-45444008%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be439f82a4dbec61746f62a0df07c19a7eecd966' => 
    array (
      0 => 'templates/header.tpl',
      1 => 1319557601,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3885130364ea832dc51b0d6-45444008',
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

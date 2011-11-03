<?php /* Smarty version Smarty-3.0.7, created on 2011-10-26 19:31:43
         compiled from "templates/facturacion.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20825216254ea843ff9a6d37-64387815%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7e64ea6cf860351e0194a0ddadb3570cbc021d1d' => 
    array (
      0 => 'templates/facturacion.tpl',
      1 => 1319622571,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20825216254ea843ff9a6d37-64387815',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<?php $_template = new Smarty_Internal_Template("menu.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<h1>Facturación</h1>
<form action="<?php echo $_smarty_tpl->getVariable('SCRIPT_NAME')->value;?>
" >
	Desde:         <input class="date" name="desde" /> <br />
	Hasta:         <input class="date" name="hasta" /><br />
	Fecha factura: <input class="date" name="fecha" /><br />
	<input type="hidden" name="action" value="facturar" />
	<input type="submit" value="Facturar" />
</form>
<?php $_template = new Smarty_Internal_Template("footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

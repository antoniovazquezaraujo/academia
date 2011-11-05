<?php /* Smarty version Smarty-3.0.7, created on 2011-11-05 21:10:17
         compiled from "templates\facturacion.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3644eb598291915e2-02313699%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e6f4ac5f4d7ce8f68b3207a398c11bbdd8c9bcbb' => 
    array (
      0 => 'templates\\facturacion.tpl',
      1 => 1320523812,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3644eb598291915e2-02313699',
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
	<h2>Facturación</h2>
	</div>
	<div id="leftcolumn">
		<?php $_template = new Smarty_Internal_Template("menu.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	</div>
	<div id="content">
		<form action="<?php echo $_smarty_tpl->getVariable('SCRIPT_NAME')->value;?>
" >
			Desde:         <input class="date" name="desde" /> <br />
			Hasta:         <input class="date" name="hasta" /><br />
			Fecha factura: <input class="date" name="fecha" /><br />
			<input type="hidden" name="action" value="facturar" />
			<input type="submit" value="Facturar" />
		</form>
	</div>
	<div id="footer">
		<?php $_template = new Smarty_Internal_Template("footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	</div>
</div>

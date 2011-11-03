{* Smarty *}
{include file="header.tpl"}
{include file="menu.tpl"}
<h1>Facturación</h1>
<form action="{$SCRIPT_NAME}" >
	Desde:         <input class="date" name="desde" /> <br />
	Hasta:         <input class="date" name="hasta" /><br />
	Fecha factura: <input class="date" name="fecha" /><br />
	<input type="hidden" name="action" value="facturar" />
	<input type="submit" value="Facturar" />
</form>
{include file="footer.tpl"}

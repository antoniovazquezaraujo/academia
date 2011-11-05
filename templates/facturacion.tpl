<div id="wrapper">
	<div id="header">
		{include file="header.tpl"}
	</div>
	<div id="navigation">
	<h2>Facturación</h2>
	</div>
	<div id="leftcolumn">
		{include file="menu.tpl"}
	</div>
	<div id="content">
		<form action="{$SCRIPT_NAME}" >
			Desde:         <input class="date" name="desde" /> <br />
			Hasta:         <input class="date" name="hasta" /><br />
			Fecha factura: <input class="date" name="fecha" /><br />
			<input type="hidden" name="action" value="facturar" />
			<input type="submit" value="Facturar" />
		</form>
	</div>
	<div id="footer">
		{include file="footer.tpl"}
	</div>
</div>

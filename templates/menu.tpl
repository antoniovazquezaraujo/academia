<ul id="navigation"> 
<h3>
<table border="0" width="100%">
<tr>
{foreach from=$opciones key=title item=page} 
   <td> 
		<a href="{$SCRIPT_NAME}?view={$page}"> 
			{$title}
		</a> 
	</td> 
{/foreach} 
</tr>
</table>
</h3>

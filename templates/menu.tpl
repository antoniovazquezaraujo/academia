</tr>
</table>
</h3>
<div id="button">
<ul>
	{foreach from=$opciones key=title item=page} 
		<li>
			<a href="{$SCRIPT_NAME}?view={$page}"> 
				{$title}
			</a> 
		</li>
	{/foreach} 
</ul>
</div>
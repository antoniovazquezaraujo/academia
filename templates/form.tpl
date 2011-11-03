<form action="{$SCRIPT_NAME}?action=submit" method="post" enctype='multipart/form-data'>
	<table border="0">
		{foreach from=$errors item="error"}
		<tr>
			<td bgcolor="yellow" colspan="2">
				{$error}
			</td>
		</tr>
		{/foreach}
	</table>
	{foreach from=$data->colModel item="col"}
		{if $col->type neq "external"}
			<br />
		{/if}
		{if $col->type eq "text"}
			{$col->display}: <input name="{$col->value|escape}" value="{$formVars.{$col->value}|escape}" />
		{elseif $col->type eq "button"}
			<td><a href="{$SCRIPT_NAME}?action={$col->action}"  >
				<button>{$col->display}</button>
			</a>
		{elseif $col->type eq "password"}
			{$col->display}: <input type="password" name="{$col->value|escape}" value="{$formVars.{$col->value}|escape}" />
		{elseif $col->type eq "date"}
			{$col->display}: <input class="date" name="{$col->value|escape}" value="{$formVars.{$col->value}|escape}" />
		{elseif $col->type eq "image"}
			{$col->display}:
			<img src="images/{$formVars.{$col->value}|escape}" />
			<input class="file" type ="file" accept="image/gif,image/jpeg,image/png" name="{$col->value|escape}" value="{$formVars.{$col->value}|escape}" />
		{elseif $col->type eq "textarea"}
			{$col->display}:<textarea cols="{$col->width}" rows="{$col->height}" name="{$col->value|escape}">{$formVars.{$col->value}|escape}</textarea>
		{elseif $col->type eq "menu"}
			{$col->display}:
			<select name="{$col->value|escape}">
			   {html_options values=$col->options output=$col->options selected="{$formVars.{$col->value}|escape}"}
		   </select>
		{elseif $col->type eq "masterId"}
			<input type="hidden" name="{$col->value}" value="{$masterId}" />
		{elseif $col->type eq "lookup"}
			{$col->display}:
			<input
				type = "text"
				class = "lookup"
				size= "{$col->width}"
				name="{$col->value}"           
				id = "{$col->value}"
				value="{$formVars.{$col->value}|escape}" 
				database="{$col->database}"
				table="{$col->table}"
				fieldSearch="{$col->fieldSearch}"
				filterField="{$col->filterField|default:''}"
				filterValue="{${$col->filterValue}|default:''}"
				fieldRet="{$col->fieldRet}"
				/>
		{elseif $col->type eq "external"}
			<div
				style="display:inline;"
				class="externalField"
				database="{$col->database}"
				table="{$col->table}"
				value_id="{$col->value_id}" 
				fieldRet="{$col->fieldRet}"
				id="lookup_{$col->value_id}"
			>&nbsp;</div>
		{/if}
	{/foreach}
	<br />
	<input type="submit" value="Enviar" />
	<input type="reset" value="Reset" />
	<input type="hidden" name="id" value="{$formVars.id}" />
</form>

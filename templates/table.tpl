
<form name="tableForm" action=  "{$SCRIPT_NAME}?action=orderBy" method="post">
	<select name="orderField">
		{html_options values=array_keys($records[0]) output=array_keys($records[0]) selected ={$orderField}}
	</select>
	<input type="text" name="valueSearch" value="{$valueSearch}"/>
	<input type="radio"  name="order" value="ASC" {if $order eq 'ASC'} checked{/if}>
				<span>ASC</span></input>
	<input type="radio"  name="order" value="DESC" {if $order eq 'DESC'} checked{/if}>
				<span>DESC</span></input>
	<input type="submit" value="Ordenar" />
</form>

<table border="3" >
{if $detailView != ''}
	<th bgcolor="#d1d1d1">&nbsp;</th>
{/if}
	{foreach from=$data->colModel item="col"}
		<th bgcolor="#d1d1d1">{$col->display}</th>
	{/foreach}
{if $data->edit eq "true"}
	<th bgcolor="#d1d1d1">&nbsp;</th>
{/if}
{if $data->delete eq "true"}
	<th bgcolor="#d1d1d1">&nbsp;</th>
{/if}
	{foreach from=$records item="record"}
		<tr bgcolor="{cycle values="#dedede,#eeeeee" advance=true}">
		{if $detailView != ''}
			<td><a class="ovalbutton" 
				href="{$SCRIPT_NAME}?action=open&view={$detailView}&id={$record.id}&masterId={$record.id}"  >
				<span>&darr;</span>
				</a>
			</td>
		{/if}
			{foreach from=$data->colModel item="col"}
				<td>
					{if $col->type eq "image"}
						<img src="images/{$record.{$col->value}|escape}"></img>
					{else if $col->type eq "password"}
						<input type="password" readonly value="{$record.{$col->value}|escape}"</input>
					{else}
						<input type="text" readonly value="{$record.{$col->value}|escape}"</input>					
					{/if}
				</td>        
			{/foreach}
			{if $data->edit eq "true"}
				<td><a class="ovalbutton" href="{$SCRIPT_NAME}?action=edit&id={$record.id}"  >
					<span>.</span></a>
				</td>
			{/if}
			{if $data->delete eq "true"}
				<td><a class="ovalbutton" href="{$SCRIPT_NAME}?action=delete&id={$record.id}">
					<span>X</span></a>
				</td>
			{/if}
		</tr>
    {foreachelse}
      <tr>
        <td colspan="2">No hay datos</td>
      </tr>
  {/foreach}

</table>
{$numRecords} registros
<table border="0">
	<tr>
		<td>
			<a class="ovalbutton" href="{$SCRIPT_NAME}?action=goFirst">
				<span>&#124;&lt;</span></a>
			</a>
		</td>
		<td>
			<a class="ovalbutton" href="{$SCRIPT_NAME}?action=goPrev">
				<span>&lt;</span></a>
			</a>
		</td>
		<td>
			<a class="ovalbutton" href="{$SCRIPT_NAME}?action=goNext">
				<span>&gt;</span></a>
			</a>
		</td>
		<td>
			<a class="ovalbutton" href="{$SCRIPT_NAME}?action=goLast">
				<span>&gt;&#124;</span></a>
			</a>
		</td>
{if $data->add eq "true"}
		<td>
			<a class="ovalbutton" href="{$SCRIPT_NAME}?action=add">
				<span>+</span></a>
			</a>
		</td>
{/if}
	</tr>
</table>

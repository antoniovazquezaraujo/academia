<?php /* Smarty version Smarty-3.0.7, created on 2011-11-05 20:30:53
         compiled from "templates\table.tpl" */ ?>
<?php /*%%SmartyHeaderCode:161364eb58eed0ee960-53886481%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cfbc6d1db2762fb401ecc23d326c01004af0e232' => 
    array (
      0 => 'templates\\table.tpl',
      1 => 1320521445,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '161364eb58eed0ee960-53886481',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_html_options')) include 'smarty/plugins\function.html_options.php';
if (!is_callable('smarty_function_cycle')) include 'smarty/plugins\function.cycle.php';
if (!is_callable('smarty_modifier_escape')) include 'smarty/plugins\modifier.escape.php';
?>
<form name="tableForm" action=  "<?php echo $_smarty_tpl->getVariable('SCRIPT_NAME')->value;?>
?action=orderBy" method="post">
	<select name="orderField">
		<?php ob_start();?><?php echo $_smarty_tpl->getVariable('orderField')->value;?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_html_options(array('values'=>array_keys($_smarty_tpl->getVariable('records')->value[0]),'output'=>array_keys($_smarty_tpl->getVariable('records')->value[0]),'selected'=>$_tmp1),$_smarty_tpl);?>

	</select>
	<input type="text" name="valueSearch" value="<?php echo $_smarty_tpl->getVariable('valueSearch')->value;?>
"/>
	<input type="radio"  name="order" value="ASC" <?php if ($_smarty_tpl->getVariable('order')->value=='ASC'){?> checked<?php }?>>
				<span>ASC</span></input>
	<input type="radio"  name="order" value="DESC" <?php if ($_smarty_tpl->getVariable('order')->value=='DESC'){?> checked<?php }?>>
				<span>DESC</span></input>
	<input type="submit" value="Ordenar" />
</form>

<table border="3" >
<?php if ($_smarty_tpl->getVariable('detailView')->value!=''){?>
	<th bgcolor="#d1d1d1">&nbsp;</th>
<?php }?>
	<?php  $_smarty_tpl->tpl_vars["col"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value->colModel; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["col"]->key => $_smarty_tpl->tpl_vars["col"]->value){
?>
		<th bgcolor="#d1d1d1"><?php echo $_smarty_tpl->getVariable('col')->value->display;?>
</th>
	<?php }} ?>
<?php if ($_smarty_tpl->getVariable('data')->value->edit=="true"){?>
	<th bgcolor="#d1d1d1">&nbsp;</th>
<?php }?>
<?php if ($_smarty_tpl->getVariable('data')->value->delete=="true"){?>
	<th bgcolor="#d1d1d1">&nbsp;</th>
<?php }?>
	<?php  $_smarty_tpl->tpl_vars["record"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('records')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["record"]->key => $_smarty_tpl->tpl_vars["record"]->value){
?>
		<tr bgcolor="<?php echo smarty_function_cycle(array('values'=>"#dedede,#eeeeee",'advance'=>true),$_smarty_tpl);?>
">
		<?php if ($_smarty_tpl->getVariable('detailView')->value!=''){?>
			<td><a class="ovalbutton" 
				href="<?php echo $_smarty_tpl->getVariable('SCRIPT_NAME')->value;?>
?action=open&view=<?php echo $_smarty_tpl->getVariable('detailView')->value;?>
&id=<?php echo $_smarty_tpl->getVariable('record')->value['id'];?>
&masterId=<?php echo $_smarty_tpl->getVariable('record')->value['id'];?>
"  >
				<span>&darr;</span>
				</a>
			</td>
		<?php }?>
			<?php  $_smarty_tpl->tpl_vars["col"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value->colModel; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["col"]->key => $_smarty_tpl->tpl_vars["col"]->value){
?>
				<td>
					<?php if ($_smarty_tpl->getVariable('col')->value->type=="image"){?>
						<img src="images/<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('record')->value[$_smarty_tpl->getVariable('col')->value->value]);?>
"></img>
					<?php }elseif($_smarty_tpl->getVariable('col')->value->type=="password"){?>
						<input type="password" readonly value="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('record')->value[$_smarty_tpl->getVariable('col')->value->value]);?>
"</input>
					<?php }else{ ?>
						<input type="text" readonly value="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('record')->value[$_smarty_tpl->getVariable('col')->value->value]);?>
"</input>					
					<?php }?>
				</td>        
			<?php }} ?>
			<?php if ($_smarty_tpl->getVariable('data')->value->edit=="true"){?>
				<td><a class="ovalbutton" href="<?php echo $_smarty_tpl->getVariable('SCRIPT_NAME')->value;?>
?action=edit&id=<?php echo $_smarty_tpl->getVariable('record')->value['id'];?>
"  >
					<span>.</span></a>
				</td>
			<?php }?>
			<?php if ($_smarty_tpl->getVariable('data')->value->delete=="true"){?>
				<td><a class="ovalbutton" href="<?php echo $_smarty_tpl->getVariable('SCRIPT_NAME')->value;?>
?action=delete&id=<?php echo $_smarty_tpl->getVariable('record')->value['id'];?>
">
					<span>X</span></a>
				</td>
			<?php }?>
		</tr>
    <?php }} else { ?>
      <tr>
        <td colspan="2">No hay datos</td>
      </tr>
  <?php } ?>

</table>
<?php echo $_smarty_tpl->getVariable('numRecords')->value;?>
 registros
<table border="0">
	<tr>
		<td>
			<a class="ovalbutton" href="<?php echo $_smarty_tpl->getVariable('SCRIPT_NAME')->value;?>
?action=goFirst">
				<span>&#124;&lt;</span></a>
			</a>
		</td>
		<td>
			<a class="ovalbutton" href="<?php echo $_smarty_tpl->getVariable('SCRIPT_NAME')->value;?>
?action=goPrev">
				<span>&lt;</span></a>
			</a>
		</td>
		<td>
			<a class="ovalbutton" href="<?php echo $_smarty_tpl->getVariable('SCRIPT_NAME')->value;?>
?action=goNext">
				<span>&gt;</span></a>
			</a>
		</td>
		<td>
			<a class="ovalbutton" href="<?php echo $_smarty_tpl->getVariable('SCRIPT_NAME')->value;?>
?action=goLast">
				<span>&gt;&#124;</span></a>
			</a>
		</td>
<?php if ($_smarty_tpl->getVariable('data')->value->add=="true"){?>
		<td>
			<a class="ovalbutton" href="<?php echo $_smarty_tpl->getVariable('SCRIPT_NAME')->value;?>
?action=add">
				<span>+</span></a>
			</a>
		</td>
<?php }?>
	</tr>
</table>

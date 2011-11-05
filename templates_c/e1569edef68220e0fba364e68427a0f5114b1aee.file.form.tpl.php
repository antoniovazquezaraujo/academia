<?php /* Smarty version Smarty-3.0.7, created on 2011-11-05 13:46:46
         compiled from "templates\form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:97504eb53036b74db2-57752710%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e1569edef68220e0fba364e68427a0f5114b1aee' => 
    array (
      0 => 'templates\\form.tpl',
      1 => 1320489465,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '97504eb53036b74db2-57752710',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include 'smarty/plugins\modifier.escape.php';
if (!is_callable('smarty_function_html_options')) include 'smarty/plugins\function.html_options.php';
?><form action="<?php echo $_smarty_tpl->getVariable('SCRIPT_NAME')->value;?>
?action=submit" method="post" enctype='multipart/form-data'>
	<table border="0">
		<?php  $_smarty_tpl->tpl_vars["error"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('errors')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["error"]->key => $_smarty_tpl->tpl_vars["error"]->value){
?>
		<tr>
			<td bgcolor="yellow" colspan="2">
				<?php echo $_smarty_tpl->getVariable('error')->value;?>

			</td>
		</tr>
		<?php }} ?>
	</table>
	<?php  $_smarty_tpl->tpl_vars["col"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value->colModel; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["col"]->key => $_smarty_tpl->tpl_vars["col"]->value){
?>
		<?php if ($_smarty_tpl->getVariable('col')->value->type!="external"){?>
			<br />
		<?php }?>
		<?php if ($_smarty_tpl->getVariable('col')->value->type=="text"){?>
			<?php echo $_smarty_tpl->getVariable('col')->value->display;?>
: <input name="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('col')->value->value);?>
" value="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('formVars')->value[$_smarty_tpl->getVariable('col')->value->value]);?>
" />
		<?php }elseif($_smarty_tpl->getVariable('col')->value->type=="button"){?>
			<td><a href="<?php echo $_smarty_tpl->getVariable('SCRIPT_NAME')->value;?>
?action=<?php echo $_smarty_tpl->getVariable('col')->value->action;?>
"  >
				<button><?php echo $_smarty_tpl->getVariable('col')->value->display;?>
</button>
			</a>
		<?php }elseif($_smarty_tpl->getVariable('col')->value->type=="password"){?>
			<?php echo $_smarty_tpl->getVariable('col')->value->display;?>
: <input type="password" name="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('col')->value->value);?>
" value="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('formVars')->value[$_smarty_tpl->getVariable('col')->value->value]);?>
" />
		<?php }elseif($_smarty_tpl->getVariable('col')->value->type=="date"){?>
			<?php echo $_smarty_tpl->getVariable('col')->value->display;?>
: <input class="date" name="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('col')->value->value);?>
" value="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('formVars')->value[$_smarty_tpl->getVariable('col')->value->value]);?>
" />
		<?php }elseif($_smarty_tpl->getVariable('col')->value->type=="image"){?>
			<?php echo $_smarty_tpl->getVariable('col')->value->display;?>
:
			<img src="images/<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('formVars')->value[$_smarty_tpl->getVariable('col')->value->value]);?>
" />
			<input class="file" type ="file" accept="image/gif,image/jpeg,image/png" name="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('col')->value->value);?>
" value="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('formVars')->value[$_smarty_tpl->getVariable('col')->value->value]);?>
" />
		<?php }elseif($_smarty_tpl->getVariable('col')->value->type=="textarea"){?>
			<?php echo $_smarty_tpl->getVariable('col')->value->display;?>
:<textarea cols="<?php echo $_smarty_tpl->getVariable('col')->value->width;?>
" rows="<?php echo $_smarty_tpl->getVariable('col')->value->height;?>
" name="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('col')->value->value);?>
"><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('formVars')->value[$_smarty_tpl->getVariable('col')->value->value]);?>
</textarea>
		<?php }elseif($_smarty_tpl->getVariable('col')->value->type=="menu"){?>
			<?php echo $_smarty_tpl->getVariable('col')->value->display;?>
:
			<select name="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('col')->value->value);?>
">
			   <?php ob_start();?><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('formVars')->value[$_smarty_tpl->getVariable('col')->value->value]);?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->getVariable('col')->value->options,'output'=>$_smarty_tpl->getVariable('col')->value->options,'selected'=>$_tmp1),$_smarty_tpl);?>

		   </select>
		<?php }elseif($_smarty_tpl->getVariable('col')->value->type=="masterId"){?>
			<input type="hidden" name="<?php echo $_smarty_tpl->getVariable('col')->value->value;?>
" value="<?php echo $_smarty_tpl->getVariable('masterId')->value;?>
" />
		<?php }elseif($_smarty_tpl->getVariable('col')->value->type=="lookup"){?>
			<?php echo $_smarty_tpl->getVariable('col')->value->display;?>
:
			<input
				type = "text"
				class = "lookup"
				size= "<?php echo $_smarty_tpl->getVariable('col')->value->width;?>
"
				name="<?php echo $_smarty_tpl->getVariable('col')->value->value;?>
"           
				id = "<?php echo $_smarty_tpl->getVariable('col')->value->value;?>
"
				value="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('formVars')->value[$_smarty_tpl->getVariable('col')->value->value]);?>
" 
				database="<?php echo $_smarty_tpl->getVariable('col')->value->database;?>
"
				table="<?php echo $_smarty_tpl->getVariable('col')->value->table;?>
"
				fieldSearch="<?php echo $_smarty_tpl->getVariable('col')->value->fieldSearch;?>
"
				filterField="<?php echo (($tmp = @$_smarty_tpl->getVariable('col')->value->filterField)===null||$tmp==='' ? '' : $tmp);?>
"
				filterValue="<?php echo (($tmp = @$_smarty_tpl->getVariable(($_smarty_tpl->getVariable('col')->value->filterValue))->value)===null||$tmp==='' ? '' : $tmp);?>
"
				fieldRet="<?php echo $_smarty_tpl->getVariable('col')->value->fieldRet;?>
"
				/>
		<?php }elseif($_smarty_tpl->getVariable('col')->value->type=="external"){?>
			<div
				style="display:inline;"
				class="externalField"
				database="<?php echo $_smarty_tpl->getVariable('col')->value->database;?>
"
				table="<?php echo $_smarty_tpl->getVariable('col')->value->table;?>
"
				value_id="<?php echo $_smarty_tpl->getVariable('col')->value->value_id;?>
" 
				fieldRet="<?php echo $_smarty_tpl->getVariable('col')->value->fieldRet;?>
"
				id="lookup_<?php echo $_smarty_tpl->getVariable('col')->value->value_id;?>
"
			>&nbsp;</div>
		<?php }?>
	<?php }} ?>
	<br />
	<input type="submit" value="Enviar" />
	<input type="reset" value="Reset" />
	<input type="hidden" name="id" value="<?php echo $_smarty_tpl->getVariable('formVars')->value['id'];?>
" />
</form>

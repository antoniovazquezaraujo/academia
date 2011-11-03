<?php /* Smarty version Smarty-3.0.7, created on 2011-10-26 18:18:43
         compiled from "templates/basicList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:425282394ea832e343ef28-72968534%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd9ea38cb35542198aa1bcb1586a384f1ca7760c4' => 
    array (
      0 => 'templates/basicList.tpl',
      1 => 1319637835,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '425282394ea832e343ef28-72968534',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<?php $_template = new Smarty_Internal_Template("menu.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<a href="<?php echo $_smarty_tpl->getVariable('SCRIPT_NAME')->value;?>
?action=close&view=<?php echo $_smarty_tpl->getVariable('masterView')->value;?>
"  >
	<button>&uarr;</button>
</a>
<?php $_template = new Smarty_Internal_Template("table.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<?php $_template = new Smarty_Internal_Template("footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

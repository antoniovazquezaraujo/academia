{* Smarty *}
{include file="header.tpl"}
{include file="menu.tpl"}
<form action="{$SCRIPT_NAME}?action=login" method="post">
Nombre:
  <input 
	  type="text" 
	  name="nombre" 
  >
  <br />
 Password: 
  <input 
	  type="password" 
	  name="password" 
  >
  <br />
  <input type="submit" value="Submit">
</form>
{include file="footer.tpl"}

<?php
class Rechazo{
	var $template = 'rechazo.tpl';
	function getLevel(){
		return 0;
	}
	function dispatch($controller){
		$controller->display($this->template);        
	}
}
?>

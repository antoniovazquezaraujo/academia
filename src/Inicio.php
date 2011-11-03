<?php
class Inicio{
	var $template = 'inicio.tpl';
	function getLevel(){
		return 0;
	}
	function dispatch($controller){
		$controller->display($this->template);        
	}
}
?>

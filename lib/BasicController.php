<?php
class BasicController extends Smarty{
	var $action= null; 
	var $view= null; 
	function __construct() {
		parent::__construct();
		$this->template_dir = 'templates';
		$this->compile_dir  = 'templates_c';
		$this->config_dir   = 'configs';
		$this->cache_dir    = 'cache';
		session_start();
	}
	function dispatch(){
	}
}
?>

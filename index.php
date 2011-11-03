<?php
error_reporting(E_ALL);
ini_set('display_errors','On');
define('SMARTY_DIR', 'smarty/');
define('LIB_DIR',    'lib/');
define('SRC_DIR',    'src/');
require(SRC_DIR    . 'Config.php');
require(SMARTY_DIR . 'Smarty.class.php');
require(SRC_DIR    . 'Controller.php');
$controller= new Controller;
$controller->dispatch();

?>

<?php
/*
Busca en una tabla un valor dado y devuelve un array 
en formato json con los registros en los que el campo
a buscar contiene el valor dado. Para cada registro 
encontrado, devuelve el campo a buscar como "label" y
el campo a devolver como "ret".
*/
require_once("Funciones.php");
define('SRC_DIR',    '../src/');
require(SRC_DIR    . 'Config.php');

global $dbtype;
global $dbname;
global $dbhost;
global $dbuser;
global $dbpass;
$connection = mysql_pconnect($dbhost, $dbuser, $dbpass) 
	or trigger_error(mysql_error(),E_USER_ERROR); 

$database    = $_GET['database'];
$table       = $_GET['table'];
if(isset($_GET['filterField'])){
	$filterField = $_GET['filterField'];
	$filterValue = $_GET['filterValue'];
}else{
	$filterField = '';
	$filterValue = '';
}
$fieldSearch = explode(",",$_GET['fieldSearch']);
$valueSearch = '%';
$valueSearch.= $_GET['term'];
$valueSearch.='%';
$fieldRet    = $_GET['fieldRet'];

mysql_select_db($database, $connection);
$query_conexion = "SELECT * FROM ". $table . "  WHERE "; 
if($filterField != ''){
	$query_conexion .= $filterField . " = " . $filterValue;
	$query_conexion.= " AND ";
}
$query_conexion.= " (";
foreach($fieldSearch as $field){
	$query_conexion .= $field . " LIKE '" . $valueSearch ."' OR ";
}
$query_conexion=substr($query_conexion,0, -3);//quitamos el último OR 
$query_conexion.= ")";
$conexion = mysql_query($query_conexion, $connection) or die(mysql_error());
$row = mysql_fetch_assoc($conexion);

$result = array();

do {
	$label= '';
	foreach($fieldSearch as $field){
		if($field == "image"){
			$label.= '<img src="images/'.$row[$field].'"></img>, ';	
		}else{
			$label.= $row[$field] . ", ";	
		}
	}
	$label=substr($label,0, -2);//quitamos la última coma 
	array_push(
		$result, 
		array(
			"ret"   => $row[$fieldRet], 
			"label" => $label
		)
	);
} while ($row= mysql_fetch_assoc($conexion));
echo array_to_json($result);
mysql_free_result($conexion);
?>

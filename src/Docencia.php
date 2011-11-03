<?php
require_once(LIB_DIR .'MasterTable.php');
class Docencia extends MasterTable{
	function __construct() {
		$this->table        = 'docencia';
		$this->listTable    = 'docenciaConGrupo';
		$this->fields= array(
			'fecha'     ,
			'fecha_facturacion'  ,
			'concepto'  ,
			'precio'    ,
			'cantidad'  ,
			'grupo_id'    
		);
		$this->level = 10;
		parent::__construct();
	}
	function getTable(){
		return '{
			"add"      : "true",
			"edit"     : "true",
			"delete"   : "true",
			"colModel" : [
				{"type":"text", "display": "Id",      "value" : "id",    "width" : 150 },
				{"type":"date", "display": "Fecha",   "value" : "fecha",    "width" : 150 },
				{"type":"date", "display": "Fecha de facturación", "value" : "fecha_facturacion",    "width" : 150 },
				{"type":"text", "display": "Concepto","value" : "concepto", "width" : 150 },
				{"type":"text", "display": "Precio",  "value" : "precio",   "width" : 250 },
				{"type":"text", "display": "Cantidad","value" : "cantidad",   "width" : 250 },
				{"type":"text", "display": "Grupo",   "value" : "grupo_nombre", "width" : 250 }
			]
		}';
	}
	function getForm(){
		return '{
			"colModel" : [
				{"type":"date", "display": "Fecha",   "value" : "fecha",    "width" : 150 },
				{"type":"date", "display": "Fecha de facturación", "value" : "fecha_facturacion",    "width" : 150 },
				{"type":"text", "display": "Concepto","value" : "concepto", "width" : 150 },
				{"type":"text", "display": "Precio",  "value" : "precio",   "width" : 250 },
				{"type":"text", "display": "Cantidad","value" : "cantidad", "width" : 250 },
				{
					"type"       :"lookup"       , 
					"display"    :"Grupo"        ,   
					"value"      :"grupo_id"     ,
					"width"      : 5             , 
					"id"         :"grupo_id"     ,
					"database"   :"academia"     ,
					"table"      :"grupo"        ,
					"fieldSearch":"nombre"       ,
					"fieldRet"   :"id"
				},
				{
					"type"       :"external"         ,
					"display"    :"Nombre del grupo" ,             
					"database"   :"academia"         ,
					"table"      :"grupo"            ,
					"value_id"   :"grupo_id"         ,
					"fieldRet"   :"nombre"
				}
			]
		}';
	}

	function isValidForm($formvars) {
		$this->errors= null;
		return true;
	}
}
?>

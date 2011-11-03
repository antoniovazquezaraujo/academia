<?php
require_once(LIB_DIR .'MasterTable.php');
class Equipo extends MasterTable{
	function __construct() {
		$this->table        = 'equipo';
		$this->fields= array(
			'nombre'              ,
			'vehiculo_id'           
		);
		$this->level = 0;
		parent::__construct();
	}
	function getTable(){
		return '{
			"add"      : "true",
			"edit"     : "true",
			"delete"   : "true",
			"colModel" : [
				{"type":"text", "display": "Id",       "value" : "id",       "width" : 5  },
				{"type":"text", "display": "Nombre",   "value" : "nombre",   "width" : 15 },
				{"type":"text", "display": "Equipo",   "value" : "equipo_id","width" : 25 }
			]
		}';
	}
	function getForm(){
		return '{
			"colModel" : [
				{"type":"text", "display": "Nombre",   "value" : "nombre",   "width" : 150 },
				{
					"type"       :"lookup"      , 
					"display"    :"Equipo"      ,   
					"value"      :"equipo_id"   ,
					"width"      : 5            , 
					"id"         :"idDelEquipo" ,
					"database"   :"carrilanas"  ,
					"table"      :"equipo"      ,
					"fieldSearch":"nombre"      ,
					"fieldRet"   :"id"
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

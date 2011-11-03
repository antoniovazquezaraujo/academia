<?php
require_once(LIB_DIR .'DetailTable.php');
class Inscripcion extends DetailTable{
	function __construct() {
		$this->masterTable  = 'grupo';
		$this->masterView   = 'grupo';
		$this->externalIndex= 'grupo_id';
		$this->table        = 'inscripcion';
		$this->listTable    = 'inscripcionConAlumnoYGrupo';
		$this->fields= array(
			'alumno_id'  
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
				{"type":"text", "display": "Alumno", "value" : "alumno_nombre", "width" : 150 }
			]
		}';
	}
	function getForm(){
		return '{
			"colModel" : [
				{
					"type"       :"lookup"       , 
					"display"    :"Alumno"       ,   
					"value"      :"alumno_id"    ,
					"width"      : 5             , 
					"id"         :"alumno"       ,
					"database"   :"academia"     ,
					"table"      :"alumno"       ,
					"fieldSearch":"nombre"       ,
					"fieldRet"   :"id"
				},
				{
					"type"       :"external"          ,
					"display"    :"Nombre del alumno" ,             
					"database"   :"academia"          ,
					"table"      :"alumno"            ,
					"value_id"   :"alumno_id"         ,
					"fieldRet"   :"nombre"
				},
				{"type":"masterId", "display": "Grupo",  "value" : "grupo_id" , "width" : 150 }
			]
		}';
	}

	function isValidForm($formvars) {
		$this->errors= null;
		return true;
	}
}
?>

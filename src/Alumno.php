<?php
require_once(LIB_DIR .'MasterTable.php');
class Alumno extends MasterTable{
	function __construct() {
		$this->table        = 'alumno';
		$this->fields= array(
			'nombre'  ,
			'dni'     ,
			'telefono',
			'email'    
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
				{"type":"text", "display": "Nombre",   "value" : "nombre",   "width" : 150 },
				{"type":"text", "display": "Dni",      "value" : "dni",      "width" : 150 },
				{"type":"text", "display": "Teléfono", "value" : "telefono", "width" : 250 },
				{"type":"text", "display": "Email",    "value" : "email",    "width" : 250 }
			]
		}';
	}
	function getForm(){
		return '{
			"colModel" : [
				{"type":"text", "display": "Nombre",   "value" : "nombre",   "width" : 150 },
				{"type":"text", "display": "Dni",      "value" : "dni",      "width" : 150 },
				{"type":"text", "display": "Teléfono", "value" : "telefono", "width" : 250 },
				{"type":"text", "display": "Email",    "value" : "email",    "width" : 250 }
			]
		}';
	}

	function isValidForm($formvars) {
		$this->errors= null;
		return true;
	}
}
?>

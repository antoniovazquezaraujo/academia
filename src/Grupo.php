<?php
require_once(LIB_DIR .'MasterTable.php');
class Grupo extends MasterTable{
	function __construct() {
		$this->table        = 'grupo';
		$this->detailTable  = 'inscripcion';
		$this->detailView   = 'inscripcion';
		$this->fields= array(
			'nombre'      
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
				{"type":"text", "display": "Nombre", "value" : "nombre",      "width" : 150 }
			]
		}';
	}
	function getForm(){
		return '{
			"colModel" : [
				{"type":"text", "display": "Nombre", "value" : "nombre",      "width" : 150 }
			]
		}';
	}

	function isValidForm($formvars) {
		$this->errors= null;
		return true;
	}
}
?>

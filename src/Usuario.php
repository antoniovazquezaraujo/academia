<?php
require_once(LIB_DIR .'Table.php');
class Usuario extends Table{
	function __construct() {
		$this->table = 'usuario';
		$this->fields= array(
				'nombre', 
				'password',
				'nivel' 
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
				{"type":"text", "display":    "Nombre",   "value" : "nombre",   "width" : 50 },
				{"type":"password","display": "Password", "value" : "password",    "width" : 5  }, 
				{"type":"text", "display":    "Nivel",    "value" : "nivel", "width" : 50 } 
			]
		}';
	}
	function getForm(){
		return '{
			"colModel" : [
				{
					"type"       :"text"    ,
					"display"    :"Nombre"  ,             
					"value"      :"nombre"         
				},
				{
					"type"       :"password" ,
					"display"    :"Password" ,             
					"value"      :"password"         
				},
				{
					"type"       :"text"  ,
					"display"    :"Nivel" ,             
					"value"      :"nivel"         
				}
			]
		}';
	}
	function isValidForm($formvars) {
		$this->errors = null;
		if(strlen($formvars['nombre']) == 0) {
			$this->errors[] = 'El nombre de usuario está vacío';
		}
		if(strlen($formvars['password']) == 0) {
			$this->errors[] = 'La clave está vacía';
		}
		if(strlen($formvars['nivel']) == 0) {
			$this->errors[] = 'El nivel del usuario está vacío';
		}
		return empty($this->errors);
	}
}
?>

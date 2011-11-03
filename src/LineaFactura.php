<?php
require_once(LIB_DIR .'DetailTable.php');
class LineaFactura extends DetailTable{
	function __construct() {
		$this->masterTable  = 'factura';
		$this->masterView   = 'factura';
		$this->externalIndex= 'factura_id';
		$this->table        = 'lineaFactura';
		$this->listTable    = 'lineaFactura';
		$this->fields= array(
			'fecha'     ,  
			'concepto'  ,  
			'importe'   ,
			'cantidad'  
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
				{"type":"date", "display": "Fecha",    "value" : "fecha", "width" : 150 },
				{"type":"text", "display": "Concepto", "value" : "concepto", "width" : 150 },
				{"type":"text", "display": "Importe",  "value" : "importe", "width" : 150   },
				{"type":"text", "display": "Cantidad", "value" : "cantidad", "width" : 150 }
			]
		}';
	}
	function getForm(){
		return '{
			"colModel" : [
				{"type":"date", "display":    "Fecha",   "value" : "fecha",      "width" : 150 },
				{"type":"text", "display":    "Concepto","value" : "concepto",   "width" : 150 },
				{"type":"text", "display":    "Importe", "value" : "importe",    "width" : 150 },
				{"type":"text", "display":    "Cantidad","value" : "cantidad",   "width" : 150 },
				{"type":"masterId","display": "Factura", "value" : "factura_id", "width" : 150 }
			]
		}';
	}

	function isValidForm($formvars) {
		$this->errors= null;
		return true;
	}
}
?>

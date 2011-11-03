<?php
require_once(LIB_DIR .'MasterTable.php');
class Factura extends MasterTable{
	function __construct() {
		$this->table        = 'factura';
		$this->listTable    = 'facturaConAlumnoYTotal';
		$this->detailTable  = 'lineaFactura';
		$this->detailView   = 'lineaFactura';
		$this->fields= array(
			'fecha'      ,
			'alumno_id'  ,
			'fecha_pago'
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
				{"type":"text", "display": "Id",           "value":"id",           "width" : 150 },
				{"type":"text", "display": "Fecha",        "value":"fecha",        "width" : 150 },
				{"type":"text", "display": "Alumno",       "value":"alumno_nombre","width" : 150 },
				{"type":"text", "display": "Total",        "value":"factura_total","width" : 150 },
				{"type":"text", "display": "Fecha de pago","value":"fecha_pago",   "width" : 150 }
			]
		}';
	}
	function getForm(){
		return '{
			"colModel" : [
				{"type":"date", "display": "Fecha",        "value" : "fecha",      "width" : 150 },
				{
					"type"       :"lookup"       , 
					"display"    :"Alumno"       ,   
					"value"      :"alumno_id"    ,
					"width"      : 5             , 
					"id"         :"alumno_id"    ,
					"database"   :"academia"     ,
					"table"      :"alumno"       ,
					"fieldSearch":"nombre"       ,
					"fieldRet"   :"id"
				},
				{
					"type"       :"external"         ,
					"display"    :"Nombre del alumno",             
					"database"   :"academia"         ,
					"table"      :"alumno"           ,
					"value_id"   :"alumno_id"        ,
					"fieldRet"   :"nombre"
				},
				{"type":"date", "display": "Fecha de pago","value" : "fecha_pago", "width" : 150 },
				{"type":"button","display": "Imprimir","action" : "imprimir", "width" : 150 }
			]
		}';
	}
	function isValidForm($formvars) {
		$this->errors= null;
		return true;
	}
	function dispatch($controller){
		if(isset($_REQUEST['action'])){
			$this->action= $_REQUEST['action']; 
		}
		switch($this->action) {
		case 'imprimir':
			$this->id = $_SESSION['id'];
			$pdf = new FacturaImpresa();
			try {
				$rh = $this->pdo->prepare("select * from facturaConAlumnoYTotal where id = ?");
				$rh->execute(array($this->id));
				$factura= $rh->fetch(PDO::FETCH_BOTH);

				$pdf->loadData($factura['id'],$factura['fecha'],$factura['alumno_nombre'], $factura['alumno_dni']);

				$rh = $this->pdo->prepare("select * from lineaFactura where factura_id = ?");
				$rh->execute(array($this->id));
				$rows = $rh->fetchAll(PDO::FETCH_BOTH);
				foreach($rows as $linea){
					$pdf->addText(130, $linea['concepto']);
					if($linea['cantidad'] != 0){
						$pdf->addText(20, $linea['cantidad'], 'R');
						$pdf->addText(20, $linea['importe'] , 'R');
						$pdf->addText(20, $linea['importe']*$linea['cantidad'], 'R');
					}
					$pdf->addLine();
				}
				$pdf->setTotal($factura['factura_total']); 
				$pdf->Output(); 
			} catch (PDOException $e) { print "Error!: " . $e->getMessage();
				return false;
			} 	
			break;
		}
		parent::dispatch($controller);
	}
}
?>

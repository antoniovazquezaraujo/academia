<?php
require_once(LIB_DIR .'MasterTable.php');
class ImpresionFacturas extends MasterTable{
	function __construct() {
		$this->level = 10;
		parent::__construct();
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
	function getLevel(){
		return $this->level;
	}
}
?>

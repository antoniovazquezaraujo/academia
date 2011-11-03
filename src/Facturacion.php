<?php
require_once(LIB_DIR .'MasterTable.php');
class Facturacion extends MasterTable{
	function __construct() {
		$this->level = 10;
		parent::__construct();
	}
	function dispatch($controller){
		if(isset($_REQUEST['action'])){
			$this->action= $_REQUEST['action']; 
		}
		switch($this->action) {
		case 'facturar':
			$fecha= $_REQUEST['fecha'];
			$desde = $_REQUEST['desde'];
			$hasta= $_REQUEST['hasta'];
			try {
				$rh = $this->pdo->prepare("
						insert into factura (fecha, alumno_id, fecha_pago) select
						?,	
						alumno_id, 
						null
						from inscripcion 
						join docencia on 
							inscripcion.grupo_id = docencia.grupo_id 
							and  docencia.fecha >= ? and docencia.fecha <= ? 
							and  docencia.fecha_facturacion = '0000-00-00' 
						group by alumno_id");
				$rh->execute(array($fecha, $desde, $hasta));
				$rh = $this->pdo->prepare("
					insert into lineaFactura (factura_id, fecha, concepto, importe, cantidad) select 
					factura.id as factura_id, 
					docencia.fecha, 
					docencia.concepto, 
					docencia.precio, 
					docencia.cantidad  
					from inscripcion 
					join docencia on 
						inscripcion.grupo_id = docencia.grupo_id 
						and  docencia.fecha >= ? and docencia.fecha <= ? 
						and  docencia.fecha_facturacion = '0000-00-00' 
					join factura on 
						factura.alumno_id = inscripcion.alumno_id");
				$rh->execute(array($desde, $hasta));
				$rh = $this->pdo->prepare("
					update docencia set fecha_facturacion = now() 
					where docencia.fecha >= ? and docencia.fecha <= ?
					and  docencia.fecha_facturacion = '0000-00-00'");
				$rh->execute(array($desde, $hasta));

				//$row = $rh->fetch(PDO::FETCH_BOTH);
			} catch (PDOException $e) {
				print "Error!: " . $e->getMessage();
				return false;
			} 	
			break;
		default:
			break;
		}
		$this->tpl = $controller;
		$this->tpl->assign('data', "hola");
		$this->tpl->display('facturacion.tpl');
	}
	function getLevel(){
		return $this->level;
	}
}
?>

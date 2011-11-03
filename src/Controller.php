<?php
require(LIB_DIR . 'BasicController.php');
require(SRC_DIR . 'Usuario.php');
require(SRC_DIR . 'Logger.php');
require(SRC_DIR . 'Inicio.php');
require(SRC_DIR . 'Rechazo.php');

require(SRC_DIR . 'Alumno.php');
require(SRC_DIR . 'Docencia.php');
require(SRC_DIR . 'Factura.php');
require(SRC_DIR . 'FacturaImpresa.php');
require(SRC_DIR . 'LineaFactura.php');
require(SRC_DIR . 'Facturacion.php');
require(SRC_DIR . 'Grupo.php');
require(SRC_DIR . 'Inscripcion.php');

class Controller extends BasicController{
	function __construct() {
		parent::__construct();
		$this->assign('opciones', array(
			'Inicio'          => '',
			'Alumno'          => 'alumno',
			'Docencias'       => 'docencia',
			'Facturación'     => 'facturacion',
			'Facturas'        => 'factura',
			'Grupos'          => 'grupo',
			'Usuarios'        => 'usuario',
			'Login'           => 'login',
			'Logout'          => 'logout'
		));
	}
	function dispatch(){
		if(isset($_SESSION['view'])){
			$this->view = $_SESSION['view'];	
		}
		if(isset($_REQUEST['view'])){
			$this->view= $_REQUEST['view']; 
			$_SESSION['view'] = $this->view;
			//decide cambiar o no de vista, segun permisos
		}
		switch($this->view){
		case 'alumno':
			$object = new Alumno;
			break;
		case 'docencia':
			$object = new Docencia;
			break;
		case 'facturacion':
			$object = new Facturacion;
			break;
		case 'factura':
			$object = new Factura;
			break;
		case 'lineaFactura':
			$object = new LineaFactura;
			break;
		case 'grupo':
			$object = new Grupo;
			break;
		case 'inscripcion':
			$object = new Inscripcion; 
			break;
		///////////////////////////////////
		case 'usuario':
			$object = new Usuario; 
			break;
		case 'login':
			$object = new Logger; 
			if($object->login($this)){
				$object = new Inicio; 
			}
			break;
		case 'logout':
			$object = new Logger; 
			$object->logout();
			$object = new Inicio; 
			break;
		case 'inicio':
		default:
			$object = new Inicio; 
			break;
		}
		if(!isset($_SESSION['nivel_usuario'])){
			$_SESSION['nivel_usuario']=0;
			$_SESSION['nombre_usuario']='';
			$_SESSION['id_usuario']=0;
		}
		if($object->getLevel() > $_SESSION['nivel_usuario']){
			$object = new Rechazo; 
			$this->assign('nivel_usuario',  0); 
		}else{
			$this->assign('id_usuario',     $_SESSION['id_usuario']); 
			$this->assign('nombre_usuario', $_SESSION['nombre_usuario']); 
			$this->assign('nivel_usuario',  $_SESSION['nivel_usuario']); 
		}
		$object->dispatch($this);
	}
}
?>

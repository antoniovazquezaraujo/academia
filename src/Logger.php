<?php
require_once(LIB_DIR .'Table.php');
class Logger extends Table{
	var $userData=null;
	function __construct() {
		$this->table = 'usuario';
		$this->formTemplate = 'loginForm.tpl';
		$this->listTemplate = '';
		$this->fields= array(
				'nombre', 
				'password',
				'nivel' 
				);
		$this->level = 0;
		parent::__construct();
	}
	function dispatch($controller){
		$controller->display("login.tpl");        
	}
	function login($controller){
		if(isset($_POST['nombre']) && isset($_POST['password'])){
			$user = $this->getUser($_POST['nombre'],$_POST['password']);
			if(!empty($user)){
				$_SESSION['id_usuario']    =$user['id'];
				$_SESSION['nombre_usuario']=$user['nombre'];
				$_SESSION['nivel_usuario'] =$user['nivel'];
				return true;	
			}
		}
		return false;
	}
	function logout(){
		$_SESSION['id_usuario'] = 0;
		$_SESSION['nombre_usuario'] = '';
		$_SESSION['nivel_usuario'] = 0;
	}

	function isValidForm($formvars) {
		$this->errors = null;
		if(strlen($formvars['nombre']) == 0) {
			$this->errors[] = 'nombre_empty';
		}

		if(strlen($formvars['password']) == 0) {
			$this->errors[] = 'password_empty';
		}

		if(strlen($formvars['nivel']) == 0) {
			$this->errors[] = 'nivel_empty';
		}
		return empty($this->errors);
	}
	function getUser($nombre, $password){
		try {
			$sql ='select * from ' .$this->table." where nombre = ? and password = ?";
			$rh = $this->pdo->prepare($sql); 
			$rh->execute(array($nombre, $password));
			$row = $rh->fetch(PDO::FETCH_BOTH);
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage();
			return false;
		} 	
		return $row;   
	}
}
?>

<?php
class Table{
	var $pdo = null;
	var $tpl = null;
	var $errors = null;
	var $fromRec = 0;
	var $recsByPage = 5;
	var $formTemplate = '';
	var $listTemplate = '';
	var $templateData = array();
	var $table = '';
	var $listTable= '';
	var $id = -1;
	var $masterId = -1;
	var $action = '';
	var $fields = array();
	var $level= 0;
	var $orderField= 'id';
	var $order= 'ASC';
	var $valueSearch= '';
	var $detailView = '';
	var $masterView='';

	function __construct() {
		global $dbtype;
		global $dbname;
		global $dbhost;
		global $dbuser;
		global $dbpass;
		try {
			$this->pdo=new PDO("$dbtype:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
		} catch (PDOException $e) {
			print "Error de conexion!: " . $e->getMessage();
			die();
		}	
		if($this->listTable == ''){
			$this->listTable = $this->table;
		}
		if($this->formTemplate== ''){
			$this->formTemplate= 'basicForm.tpl'; 
		}
		if($this->listTemplate== ''){
			$this->listTemplate= 'basicList.tpl'; 
		}
		if(!isset($_SESSION)){
			session_start();
		}
	
		if(
				(!isset($_SESSION['table'])) 
				||
				(
				 ( isset($_SESSION['table'])) 
				 && 
				 ($this->table != $_SESSION['table'])
				)
		){
			$_SESSION['table'] = $this->table;
			$this->orderField ='id'; 
			$this->order      ='ASC';
			$this->valueSearch=''; 
			$this->fromRec = 0;
			$_SESSION['fromRec']     = $this->fromRec;
			$_SESSION['orderField']  = $this->orderField;
			$_SESSION['order']       = $this->order;
			$_SESSION['valueSearch'] = $this->valueSearch;
		}
	}

	function getTable(){
		return '{
			"add"      : "true",
			"edit"     : "true",
			"delete"   : "true",
			"colModel" : [
				{"display": "Id",       "value" : "id",       "width" : 40  }
			]
		}';
	}
	function getForm(){
		return '{
			"colModel" : [
				{"display": "Id",       "value" : "id",       "width" : 40  },
			]
		}';
	}
	function getLevel(){
		return $this->level;
	}
	function __destruct() {
		$this->pdo = null;
	}

	function dispatch($controller){
		$this->tpl = $controller;
		if(isset($_SESSION['id'])){
			$this->id = $_SESSION['id'];
		}
		if(isset($_REQUEST['id'])){
			$this->id = $_REQUEST['id'];
			$_SESSION['id'] = $this->id;
		}
		if(isset($_SESSION['masterId'])){
			$this->masterId = $_SESSION['masterId'];
		}
		if(isset($_REQUEST['masterId'])){
			$this->masterId = $_REQUEST['masterId'];
			$_SESSION['masterId'] = $this->masterId;
		}
		if(isset($_REQUEST['action'])){
			$this->action= $_REQUEST['action']; 
		}
		if(isset($_REQUEST['orderField'])){
			$this->orderField =$_REQUEST['orderField']; 
			$this->order      =$_REQUEST['order']; 
			$this->valueSearch=$_REQUEST['valueSearch']; 
			$_SESSION['orderField']  = $this->orderField;
			$_SESSION['order']       = $this->order;
			$_SESSION['valueSearch'] = $this->valueSearch;
		}
		if(isset($_SESSION['orderField'])){
			$this->orderField =$_SESSION['orderField']; 
			$this->order      =$_SESSION['order']; 
			$this->valueSearch=$_SESSION['valueSearch']; 
		}else{
			$this->orderField ='id'; 
			$this->order      ='ASC';
			$this->valueSearch=''; 
		}
		switch($this->action) {
		case 'orderBy':
			/*
			$this->orderField =$_REQUEST['orderField']; 
			$this->order      =$_REQUEST['order']; 
			$this->valueSearch=$_REQUEST['valueSearch']; 
			$_SESSION['orderField']  = $this->orderField;
			$_SESSION['order']       = $this->order;
			$_SESSION['valueSearch'] = $this->valueSearch;
			*/

			$this->displayList($this->getRecords());        
			break;
		case 'goFirst':
			$this->goFirst();
			$this->displayList($this->getRecords());        
			break;
		case 'goNext':
			$this->goNext();
			$this->displayList($this->getRecords());        
			break;
		case 'goPrev':
			$this->goPrev();
			$this->displayList($this->getRecords());        
			break;
		case 'goLast':
			$this->goLast();
			$this->displayList($this->getRecords());        
			break;
		case 'delete':
			$this->delete($this->id);
			$this->displayList($this->getRecords());        
			break;
		case 'edit':
			$_SESSION['db_action'] = 'update'; 
			$this->displayForm($this->getRecord());
			break;
		case 'add':
			$_SESSION['db_action'] = 'insert'; 
			$this->displayForm();
			break;
		case 'submit':
			if($this->isValidForm($_POST)) {
				if($_SESSION['db_action']== 'update'){
					$this->updateEntry($_POST);
				}else{
					$this->addEntry($_POST);
				}
				$this->displayList($this->getRecords());
			} else {
				$this->displayForm($_POST);
			}
			break;
		case 'view':
		default:
			$this->displayList($this->getRecords());        
			break;   
		}
	}
	function goFirst(){
		$this->fromRec = 0;
		$_SESSION['fromRec'] = $this->fromRec;
	}
	function goPrev(){
		$this->fromRec =  $_SESSION['fromRec'];
		$this->fromRec -= $this->recsByPage;
		if($this->fromRec < 0){
			$this->fromRec = 0;
		}
		$_SESSION['fromRec'] = $this->fromRec;
	}
	function goNext(){
		$this->fromRec =  $_SESSION['fromRec'];
		if($this->fromRec < $this->getNumRecords() - $this->recsByPage){
			$this->fromRec += $this->recsByPage;
		}
		$_SESSION['fromRec'] = $this->fromRec;
	}
	function goLast(){
		$this->fromRec = $this->getNumRecords() - $this->recsByPage;
		if($this->fromRec < 0){
			$this->fromRec = 0;
		}
		$_SESSION['fromRec'] = $this->fromRec;
	}
	function getNumRecords(){
		$n = 0;
		try {
			$t = 'select count(*) from ' . $this->table ;
			$sql = $this->pdo->query($t);
			$n = $sql->fetch(PDO::FETCH_BOTH);
		}catch(PDOException $e){
			print "Error!: " . $e->getMessage();
			return false;
		}	
		return $n[0];
	}
	function getNumRelatedRecords(){
		$n = 0;
		try {
			$t = 'select count(*) from ' . $this->table ;
			$t .= ' where '. $this->externalIndex . ' = ';
			$t .= $this->masterId;
			$sql = $this->pdo->query($t);
			$n = $sql->fetch(PDO::FETCH_BOTH);
		}catch(PDOException $e){
			print "Error!: " . $e->getMessage();
			return false;
		}	
		return $n[0];
	}
	function displayForm($formvars = array()) {
		if(empty($formvars)){
			$this->tpl->assign('formVars',null);
			$this->tpl->assign('masterId',$this->masterId);
			$this->tpl->assign('db_action','add');
		}else{
			// assign the form vars
			$this->tpl->assign('formVars',$formvars);
			$this->tpl->assign('masterId',$this->masterId);
			$this->tpl->assign('id',$this->id);
			$this->tpl->assign('db_action','update');
		}

		$this->tpl->assign('errors', $this->errors);
		if(isset($this->templateData[$this->formTemplate])){
		//	$this->tpl->assign('data', $this->templateData[$this->formTemplate]);
		}
		$this->tpl->assign('data', json_decode(($this->getForm())));
		$this->tpl->display($this->formTemplate);
	}
	function displayList($records = array()) {
		$this->tpl->assign('records', $records);
		$this->tpl->assign('masterId', $this->masterId);
		$this->tpl->assign('detailView', $this->detailView);
		$this->tpl->assign('masterView', $this->masterView);
		$this->tpl->assign('id',$this->id);
		$this->tpl->assign('orderField',$this->orderField);
		$this->tpl->assign('valueSearch',$this->valueSearch);
		$this->tpl->assign('order',$this->order);
		if(isset($this->templateData[$this->listTemplate])){
			//$this->tpl->assign('data', $this->templateData[$this->listTemplate]);
		}
		$this->tpl->assign('data', json_decode(($this->getTable())));
		$this->tpl->display($this->listTemplate);        
	}
	function delete(){
		try {
			$rh = $this->pdo->prepare("delete from ". $this->table . " where id = ?");
			$count = $rh->execute(array($this->id));
			if ($count == 0){
				//////////////////////////////////////////////
				//TODO: Mejorar esta gestión de errores!!!!!!!
				//////////////////////////////////////////////
				print "IMPOSIBLE BORRAR<p>"; 
			}
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage();
			return false;
		}	
		return true;
	}
	function updateEntry($formvars) {        
		try {

			$q = "update " . $this->table . " set ";
			foreach($this->fields as $field){
				$q.= $field . ' =  ?,';
			}
			$q=substr($q,0, -1);//quitamos la última coma
			$q .= ' where id = ?';
			$rh = $this->pdo->prepare($q);
			$v = array();
			foreach($this->fields as $field){
				if(!isset($formvars[$field])){
					$v[] = $_FILES[$field]['name'];
					$uploaddir = getcwd() ."/images/";
					$uploadfile = $uploaddir . basename($_FILES[$field]['name']);
					move_uploaded_file($_FILES[$field]['tmp_name'], $uploadfile); 
				}else{
					if(is_array($formvars[$field])){
						$v[] = implode(",", $formvars[$field]);
					}else{
						$v[] = $formvars[$field];
					}
				}
			}
			$v[] = $this->id;
			$rh->execute($v);
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage();
			return false;
		}	
		return true;
	}
	function addEntry($formvars) {        
		try {
			$q = "insert into " . $this->table . " (";
			foreach($this->fields as $field){
				$q.= $field . ',';
			}
			$q=substr($q,0, -1);//quitamos la última coma
			$q .= ') values (';
			foreach($this->fields as $field){
				$q.= '?,';
			}
			$q=substr($q,0, -1);//quitamos la última coma
			$q .= ')';
			$rh = $this->pdo->prepare($q);
			$v = array();
			foreach($this->fields as $field){
				if(!isset($formvars[$field])){
					$v[] = $_FILES[$field]['name'];
					$uploaddir = getcwd() ."/images/";
					$uploadfile = $uploaddir . basename($_FILES[$field]['name']);

					if (move_uploaded_file($_FILES[$field]['tmp_name'], $uploadfile)) {
					} else {
						echo "Error subiendo el fichero";
					}
				}else{
					if(is_array($formvars[$field])){
						$v[] = implode(",", $formvars[$field]);
					}else{
						$v[] = $formvars[$field];
					}
				}
			}
			$rh->execute($v);


		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage();
			return false;
		}	
		return true;
	}
	function getRecords($id = -1){
		if($id == -1){
			if(isset($_SESSION['fromRec'])){
				$this->fromRec =  $_SESSION['fromRec'];
			}
			try {
				$text= 'SELECT * FROM ' . $this->listTable;
				if($this->valueSearch != ''){
					$text .= " WHERE ". $this->orderField . " >= '" . $this->valueSearch . "'";
				}
				$text.= ' ORDER BY ' . $this->orderField . " " . $this->order;
				$text.= ' LIMIT ' . $this->fromRec . ',' .$this->recsByPage;
				$sql = $this->pdo->prepare($text);
				$sql->execute();
				$rows = $sql->fetchAll(PDO::FETCH_ASSOC);

			} catch (PDOException $e) {
				print "Error!: " . $e->getMessage();
				return false;
			} 	
			return $rows;   
		}else{
			try {
				$rh = $this->pdo->prepare("select * from " . $this->listTable . " where id = ?");
				$rh->execute(array($id));
				$row = $rh->fetch(PDO::FETCH_BOTH);
			} catch (PDOException $e) {
				print "Error!: " . $e->getMessage();
				return false;
			} 	
			return $row;   

		}

	}
	function getRecord(){
		try {
			$rh = $this->pdo->prepare("select * from " . $this->table . " where id = ?");
			$rh->execute(array($this->id));
			$row = $rh->fetch(PDO::FETCH_BOTH);
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage();
			return false;
		} 	
		return $row;   
	}
}
?>

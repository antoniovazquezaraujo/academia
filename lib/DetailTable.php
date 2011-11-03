<?php
require_once('Table.php');
class DetailTable extends Table{
	var $masterTable='';
	var $externalIndex = '';

	//sobreescrita!
	function getNumRecords(){
		return $this->getNumRelatedRecords();
	}


	function isValidForm($formvars) {
		return true;
	}
	//sobreescrita
	function addEntry($formvars) {        
		try {
			$q = "insert into " . $this->table . " (";
			foreach($this->fields as $field){
				$q.= $field . ',';
			}
			$q.= $this->externalIndex . ',';
			$q=substr($q,0, -1);//quitamos la última coma
			$q .= ') values (';
			foreach($this->fields as $field){
				$q.= '?,';
			}
			$q.= '?,';
			$q=substr($q,0, -1);//quitamos la última coma
			$q .= ')';
			$rh = $this->pdo->prepare($q);
			$v = array();
			foreach($this->fields as $field){
				//$v[] = $formvars[$field];
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
			$v[] = $this->masterId;
			$rh->execute($v);
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage();
			return false;
		}	
		return true;
		}
	//sobreescrita
	function getRecords($id = -1){
		if($id == -1){
			$this->fromRec =  $_SESSION['fromRec'];
			try {
				$text = 'select * from ' . $this->listTable 
					.' where '. $this->externalIndex . ' = ' 
					.$this->masterId 
					. ' LIMIT ' 
					. $this->fromRec 
					. ','
					.$this->recsByPage;
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
}
?>

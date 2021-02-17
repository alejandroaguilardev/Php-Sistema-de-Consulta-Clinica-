<?php
		
	class DataBase{
		private $host=DB_HOST;
		private $dbName=DB_NAME;
		private $dbUser=DB_USER;
		private $dbPassword=DB_PASSWORD;
		private $dbPort=DB_PORT;

		private $dbh;
		private $stmt;
		private $error;

		public function __construct(){
			$dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbName;
			$option = [
				PDO::ATTR_PERSISTENT => true,
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			];

			try {
				$this->dbh = new PDO($dsn, $this->dbUser, $this->dbPassword, $option);
				$this->dbh->exec('set names utf8');
			} catch (PDOException $e) {
				$this->error =$e->getMessage();
				echo $this->error;
			}
		}
		//preparamos la consulta
		public function query($sql){
			$this->stmt = $this->dbh->prepare($sql);
		}
		//Vinculamos la consulta
		public function bind($parameter, $value, $dataType=null){
			if(is_null($dataType)){
				switch (true) {
					case is_int($value):
						$dataType = PDO::PARAM_INT;
					break;
					case is_bool($value):
						$dataType = PDO::PARAM_BOOL;
					break;
					case is_null($value):
						$dataType = PDO::PARAM_NULL;
					break;
					default:
						$dataType = PDO::PARAM_STR;
					break;
				}
			}
			$this->stmt->bindValue($parameter, $value, $dataType);		
		}
		//Ejecutamos la consulta
		public function execute(){
			return $this->stmt->execute();
		}
		//Obtener  los Registros
		public function setRecords($fetch){
			$this->execute(); 
			if($fetch===1){
				return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
			}else{
				return $this->stmt->fetchAll(PDO::FETCH_OBJ);
			}
		}
		
		//Obtener Un  Registro
		public function setRecord($fetch){
			$this->execute();
			if($fetch===1){
				return $this->stmt->fetch(PDO::FETCH_ASSOC);
			}else{
				return $this->stmt->fetch(PDO::FETCH_OBJ);
			}
		}
		
		//Obtener Cantidad de filas
		public function rowCount(){
			return $this->stmt->rowCount();
		}
	}
<?php

class Database {
    private $host = DB_HOST;
  	private $user = DB_USER;
  	private $pass = DB_PASS;
  	private $db_name = DB_NAME;
    private $db_handler;
    private $db_statement;
    public $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		];
    public function __construct() {
		$dataSourceName = 'mysql:host='. $this->host. ';dbname=' .$this->db_name;
		$options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		];
			try {
				$this->db_handler = new PDO($dataSourceName,$this->user,$this->pass);
			} catch(PDOException $e) {
				die($e->getMessage());
			}
	}

	public function query($query) {
       $this->db_statement = $this->db_handler->prepare($query);
	}

	public function bind($param,$value,$type = null) {
       if(is_null($type)) {
           switch(true) {
           	   case is_int($value) :
           	      $type = PDO::PARAM_INT;
           	      break;
               case is_bool($value) :
                  $type = PDO::PARAM_BOOL;
                  break;
               case is_null($value) :
                  $type = PDO::PARAM_NULL;
                  break;
               default :
                  $type = PDO::PARAM_STR;
           }
       }
       $this->db_statement->bindValue($param,$value,$type); 
       //$this->stmt->mysql_bind($param,$value,$type);
	}
	public function sql_execute() {
	    $this->db_statement->execute();
	}
	public function many() {
		$this->sql_execute();
		return $this->db_statement->fetchAll(PDO::FETCH_ASSOC);
	}
	public function single() {
		$this->sql_execute();
		return $this->db_statement->fetch(PDO::FETCH_ASSOC);
	}
    public function row() {
    	return $this->db_statement->rowCount();
    }
}
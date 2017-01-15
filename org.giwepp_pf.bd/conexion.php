<?php

include "config.php";

class conex {

    protected $_db;
    public $host = DB_HOST;
    public $port = DB_PORT;
    public $database = DB_NAME;
    public $username = DB_USER;
    public $pasword = DB_PASS;


    public function _construct() {
        try {		
			$dsn = "mysql:host=$this->host;port=$this->port;dbname=$this->database";
            $this->_db = new PDO($dsn, DB_USER, DB_PASS);
        } catch (PDOException $e) {
            echo "Hubo un error: " . $e->getMessage();
            die();
        }
    }

}

?>
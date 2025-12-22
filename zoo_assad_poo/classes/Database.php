<?php
 class Database{
    private $host;
    private $dbname;
    private $username;
    private $password;
    private $pdo;
    public function __construct($host = "localhost", $dbname = "ASSAD2", $username = "root", $password = "")
    {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
    }
    
 }
  $db=new Database("mysql:host:localhost;dbname:ASSAD2","user","password");

?>
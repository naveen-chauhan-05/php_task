<?php
namespace model_database;
class Connection{
private $severName;
private $userName;
private $password;
private $dbName;
private $conn; 

function __construct($sever, $user, $pass, $dbName){

    $this->serverName = $sever;
    $this->userName = $user;
    $this->password = $pass;
    $this->dbname = $dbName;

$this->connectionFunction($this->serverName, $this->userName, $this->password, $this->dbname);
}

 private function connectionFunction($server, $user, $pass, $dbName){

    // echo "entered";
    $this->conn = mysqli_connect($server, $user, $pass, $dbName);
 

    if(!$this->conn){
        echo "hello not connect<br>";
    }
          
}
}




 

// var_dump($obj);


?>